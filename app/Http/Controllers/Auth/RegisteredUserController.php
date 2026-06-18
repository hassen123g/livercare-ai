<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Combine first_name and last_name into a single name field
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $fullName = trim($firstName . ' ' . $lastName);
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => ['nullable', 'string', 'max:100'],
            'dob' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'in:male,female'],
            'terms' => ['required', 'accepted'],
        ]);

        $user = User::create([
            'name' => $fullName,           // Combined name for display
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',           // Default role
            'country' => $request->country,
            'date_of_birth' => $request->dob,
            'gender' => $request->gender,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect to email verification notice
        return redirect()->route('verification.notice');
    }
}