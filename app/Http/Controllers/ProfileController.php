<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        // Merge first_name and last_name into name field
        if ($request->has('first_name') || $request->has('last_name')) {
            $firstName = $request->first_name ?? explode(' ', $user->name)[0] ?? '';
            $lastName = $request->last_name ?? explode(' ', $user->name)[1] ?? '';
            $request->merge(['name' => trim($firstName . ' ' . $lastName)]);
        }
        
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    /**
     * Update user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return Redirect::route('profile.edit')->with('success', 'Password updated successfully!');
    }

    /**
     * Show complete profile form (Step 3 after email verification)
     */
    public function complete(): View
    {
        return view('auth.complete-profile');
    }

    /**
     * Store complete profile information (Step 3)
     */
    public function storeComplete(Request $request): RedirectResponse
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'city' => 'nullable|string|max:255',
            'phone_code' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'bio' => 'nullable|string|max:1000',
        ]);
        
        $user->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Profile completed successfully! Welcome to LiverCare AI!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    /**
     * Show user profile page
     */
    public function show(): View
    {
        $user = Auth::user();
        $predictions = $user->predictions()->latest()->take(5)->get();
        return view('profile', compact('user', 'predictions'));
    }
}