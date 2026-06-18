<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = [
            ['name' => 'Dr. Sarah Johnson', 'role' => 'Lead Hepatologist', 'image' => 'sarah.jpg'],
            ['name' => 'Dr. Michael Chen', 'role' => 'AI Research Director', 'image' => 'michael.jpg'],
            ['name' => 'Prof. Emily Rodriguez', 'role' => 'Clinical Advisor', 'image' => 'emily.jpg'],
        ];
        
        $milestones = [
            ['year' => '2023', 'title' => 'Project Launch', 'description' => 'Initial research and development begins'],
            ['year' => '2024', 'title' => 'Beta Release', 'description' => 'First AI model prototype completed'],
            ['year' => '2025', 'title' => 'Clinical Trials', 'description' => 'Partnership with major hospitals'],
            ['year' => '2026', 'title' => 'Global Launch', 'description' => 'Worldwide platform availability'],
        ];
        
        return view('about.index', compact('teamMembers', 'milestones'));
    }
}