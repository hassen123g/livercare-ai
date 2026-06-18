<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Load settings from config or database
        $settings = [
            'app_name' => config('app.name'),
            'app_url' => config('app.url'),
            'mail_from_address' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
        ];
        return view('admin.settings', compact('settings'));
    }
    
    public function update(Request $request)
    {
        // In real app, save to .env or database
        // For demo, just flash message
        return redirect()->back()->with('success', 'Settings saved successfully');
    }
}