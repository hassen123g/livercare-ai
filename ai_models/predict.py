"""
LiverCare AI — Prediction Microservice
Runs on http://localhost:5000

Endpoints:
  POST /predict          — Lab values → RandomForest liver disease risk
  POST /scan             — Ultrasound image → MobileNetV2 scan classification
  GET  /health           — Health check for both models
"""

from flask import Flask, request, jsonify
import joblib
import numpy as np
import warnings
import os
import io
import base64

warnings.filterwarnings("ignore")

app = Flask(__name__)

BASE_DIR = os.path.dirname(os.path.abspath(__file__))

# ── Load RandomForest model + scaler ────────────────────────────────────────
rf_model  = joblib.load(os.path.join(BASE_DIR, "liver_model.pkl"))
rf_scaler = joblib.load(os.path.join(BASE_DIR, "scaler.pkl"))

# ── Load Keras MobileNetV2 scan model ────────────────────────────────────────
keras_model = None
try:
    os.environ["TF_CPP_MIN_LOG_LEVEL"] = "3"
    import keras
    keras_model = keras.saving.load_model(os.path.join(BASE_DIR, "liver_model.keras"))
    print("✅ Keras scan model loaded (MobileNetV2)")
except Exception as e:
    print(f"⚠️  Keras model not loaded: {e}")

# ── Scan class labels ────────────────────────────────────────────────────────
# MobileNetV2, output units=3, softmax
# Based on the medical context: Normal / Hepatitis / Cirrhosis (or similar)
SCAN_CLASSES = {
    0: {"label": "Normal",    "ar": "طبيعي",             "color": "green",  "recommend_scan": False},
    1: {"label": "Hepatitis", "ar": "التهاب كبدي",        "color": "yellow", "recommend_scan": True},
    2: {"label": "Cirrhosis", "ar": "تليّف الكبد",        "color": "red",    "recommend_scan": True},
}

RF_FEATURES = [
    "Age", "Gender", "Total_Bilirubin", "Direct_Bilirubin",
    "Alkaline_Phosphotase", "Alamine_Aminotransferase",
    "Aspartate_Aminotransferase", "Total_Protiens", "Albumin",
    "Albumin_and_Globulin_Ratio",
]


# ── Helpers ──────────────────────────────────────────────────────────────────

def rf_risk_label(prob: float) -> str:
    if prob >= 0.65: return "high"
    if prob >= 0.40: return "medium"
    return "low"


def should_recommend_scan(rf_result: dict) -> dict:
    """
    Based on the doctor's clinical rules:
      - High risk               → strongly recommend scan
      - Medium risk             → recommend scan (not clear enough)
      - Abnormal specific labs  → recommend scan
    Returns recommendation dict with Arabic message.
    """
    risk   = rf_result.get("risk_level", "low")
    risk_pct = rf_result.get("risk_percentage", 0)

    if risk == "high":
        return {
            "recommend": True,
            "urgency": "urgent",
            "reason_en": "High risk detected. Liver scan required to confirm severity.",
            "reason_ar": "تم اكتشاف خطورة عالية. يُنصح بعمل أشعة على الكبد للتأكد من الحالة.",
            "doctor_phrase_ar": "التحاليل بتوضح وجود مؤشرات غير طبيعية في وظائف الكبد، وللاطمئنان بشكل أدق يُنصح بعمل أشعة على الكبد لتحديد الحالة بشكل أوضح."
        }
    elif risk == "medium":
        return {
            "recommend": True,
            "urgency": "advised",
            "reason_en": "Borderline indicators detected. Scan advised for clearer diagnosis.",
            "reason_ar": "توجد مؤشرات غير واضحة — يُنصح بالأشعة للتوضيح.",
            "doctor_phrase_ar": "التحاليل لوحدها مش كفاية لتحديد الحالة بدقة، ينصح بعمل أشعة لتوضيح الصورة."
        }
    else:
        return {
            "recommend": False,
            "urgency": "none",
            "reason_en": "Low risk. No immediate scan required based on lab values.",
            "reason_ar": "المؤشرات منخفضة — لا يوجد ما يستدعي الأشعة حالياً.",
            "doctor_phrase_ar": None
        }


# ── Routes ───────────────────────────────────────────────────────────────────

@app.route("/health", methods=["GET"])
def health():
    return jsonify({
        "status":       "ok",
        "rf_model":     type(rf_model).__name__,
        "keras_model":  type(keras_model).__name__ if keras_model else None,
        "keras_ready":  keras_model is not None,
    })


@app.route("/predict", methods=["POST"])
def predict():
    """
    POST /predict  — Lab values → RandomForest risk + scan recommendation
    """
    data = request.get_json(force=True)
    if not data:
        return jsonify({"error": "No JSON body"}), 400

    try:
        gender_val = 1 if str(data.get("gender", "male")).lower() == "male" else 0
        input_values = [
            float(data["age"]),
            float(gender_val),
            float(data["total_bilirubin"]),
            float(data["direct_bilirubin"]),
            float(data["alkaline_phosphotase"]),
            float(data["alt"]),
            float(data["ast"]),
            float(data["total_proteins"]),
            float(data["albumin"]),
            float(data["albumin_globulin_ratio"]),
        ]
    except (KeyError, ValueError) as e:
        return jsonify({"error": f"Missing/invalid field: {e}"}), 422

    X        = np.array([input_values])
    X_scaled = rf_scaler.transform(X)
    pred     = int(rf_model.predict(X_scaled)[0])
    proba    = rf_model.predict_proba(X_scaled)[0]
    risk_pct = round(float(proba[1]) * 100, 1)
    level    = rf_risk_label(proba[1])

    result = {
        "prediction":      pred,
        "risk_percentage": risk_pct,
        "risk_level":      level,
        "probabilities":   {"healthy": round(float(proba[0]), 4), "disease": round(float(proba[1]), 4)},
        "features_used":   dict(zip(RF_FEATURES, input_values)),
    }

    result["scan_recommendation"] = should_recommend_scan(result)
    return jsonify(result)


@app.route("/scan", methods=["POST"])
def scan():
    """
    POST /scan  — Uploaded image → MobileNetV2 liver scan classification

    Accepts:
      - multipart/form-data  with field 'image'
      - JSON  { "image_base64": "<base64 string>" }

    Returns:
      {
        "predicted_class": 2,
        "label": "Cirrhosis",
        "label_ar": "تليّف الكبد",
        "confidence": 0.87,
        "confidence_pct": 87.0,
        "color": "red",
        "all_probabilities": { "Normal": 0.05, "Hepatitis": 0.08, "Cirrhosis": 0.87 },
        "recommend_followup": true,
        "advice_ar": "..."
      }
    """
    if keras_model is None:
        return jsonify({"error": "Keras scan model not available on this server."}), 503

    try:
        from PIL import Image
        import keras

        # ── Get image bytes ───────────────────────────────────────────────
        if request.content_type and "multipart" in request.content_type:
            if "image" not in request.files:
                return jsonify({"error": "No 'image' file in form data"}), 400
            img_bytes = request.files["image"].read()
        else:
            body = request.get_json(force=True)
            if not body or "image_base64" not in body:
                return jsonify({"error": "Provide 'image_base64' in JSON or multipart 'image'"}), 400
            img_bytes = base64.b64decode(body["image_base64"])

        # ── Preprocess → 224×224 RGB ──────────────────────────────────────
        img = Image.open(io.BytesIO(img_bytes)).convert("RGB").resize((224, 224))
        arr = np.array(img, dtype=np.float32) / 255.0          # [0,1] normalise
        arr = np.expand_dims(arr, axis=0)                       # (1, 224, 224, 3)

        # ── Inference ────────────────────────────────────────────────────
        preds      = keras_model.predict(arr, verbose=0)[0]     # shape (3,)
        class_idx  = int(np.argmax(preds))
        confidence = float(preds[class_idx])
        info       = SCAN_CLASSES[class_idx]

        all_probs = {SCAN_CLASSES[i]["label"]: round(float(preds[i]), 4) for i in range(len(SCAN_CLASSES))}

        # ── Advice based on class ─────────────────────────────────────────
        advice_map = {
            0: "النتيجة تشير إلى أن الكبد يبدو طبيعياً في الأشعة. استمر في المتابعة الدورية.",
            1: "الأشعة تشير إلى احتمال وجود التهاب كبدي. يُنصح بمراجعة الطبيب لتأكيد التشخيص وبدء العلاج.",
            2: "الأشعة تشير إلى احتمال وجود تليّف في الكبد. يُنصح بمتابعة عاجلة مع طبيب متخصص.",
        }

        return jsonify({
            "predicted_class":    class_idx,
            "label":              info["label"],
            "label_ar":           info["ar"],
            "confidence":         round(confidence, 4),
            "confidence_pct":     round(confidence * 100, 1),
            "color":              info["color"],
            "all_probabilities":  all_probs,
            "recommend_followup": info["recommend_scan"],
            "advice_ar":          advice_map[class_idx],
        })

    except Exception as e:
        return jsonify({"error": str(e)}), 500


if __name__ == "__main__":
    port = int(os.environ.get("PORT", 5000))
    print(f"\n🧠  LiverCare AI Microservice  →  http://localhost:{port}")
    print(f"    ✅ RandomForest  : {type(rf_model).__name__} (10 lab features)")
    print(f"    {'✅' if keras_model else '⚠️ '} MobileNetV2     : {'Ready (224×224 scan images)' if keras_model else 'Not loaded (install keras+tensorflow)'}")
    print(f"\n    POST /predict   — lab values → risk score + scan recommendation")
    print(f"    POST /scan      — ultrasound image → classification")
    print(f"    GET  /health    — status check\n")
    app.run(host="0.0.0.0", port=port, debug=False)
