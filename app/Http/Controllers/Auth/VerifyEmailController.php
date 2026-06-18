<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    /**
     * Show email verification notice
     */
    public function notice()
    {
        return view('auth.verify-email');
    }
    
    /**
     * Verify email with OTP code
     */
    public function verify(Request $request)
    {
        // Support both: 'otp' as array (old) or as string (new)
        $otp = $request->input('otp');
        if (is_array($otp)) {
            $otp = implode('', $otp);
        }
        
        // For demo purposes, accept 123456 as the verification code
        if ($otp === '123456') {
            $user = Auth::user();
            $user->email_verified_at = now();
            $user->save();
            
            return redirect()->route('profile.complete')->with('success', 'Email verified successfully!');
        }
        
        return back()->withErrors(['otp' => 'Invalid verification code. Please try again.']);
    }
    
    /**
     * Resend verification email (Demo mode – returns JSON for AJAX)
     */
    public function send(Request $request)
    {
        // For AJAX requests (from the new verification page)
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Demo mode: Use code 123456']);
        }
        
        // Fallback for non‑AJAX (if any)
        return back()->with('status', 'verification-link-sent');
    }
}