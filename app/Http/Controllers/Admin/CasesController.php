<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prediction;
use App\Models\User;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function index(Request $request)
    {
        $query = Prediction::with('user');
        
        // Filters
        if ($request->risk && $request->risk !== 'all') {
            $query->where('risk_level', $request->risk);
        }
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('patient_name', 'like', "%{$request->search}%")
                  ->orWhereHas('user', function($uq) use ($request) {
                      $uq->where('name', 'like', "%{$request->search}%");
                  });
            });
        }
        
        $cases = $query->latest()->paginate(15);
        
        $stats = [
            'total' => Prediction::count(),
            'high_risk' => Prediction::where('risk_level', 'High')->count(),
            'medium_risk' => Prediction::where('risk_level', 'Moderate')->count(),
            'low_risk' => Prediction::where('risk_level', 'Low')->count(),
            'pending_review' => Prediction::where('status', 'pending')->count(),
        ];
        
        return view('admin.cases', compact('cases', 'stats'));
    }
    
    public function show($id)
    {
        $case = Prediction::with('user')->findOrFail($id);
        return view('admin.case-detail', compact('case'));
    }
    
    public function update(Request $request, $id)
    {
        $case = Prediction::findOrFail($id);
        $case->update($request->only(['status', 'notes']));
        return redirect()->back()->with('success', 'Case updated successfully');
    }
    
    public function destroy($id)
    {
        $case = Prediction::findOrFail($id);
        $case->delete();
        return redirect()->route('admin.cases')->with('success', 'Case deleted');
    }
}