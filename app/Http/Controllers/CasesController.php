<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
{
    public function index()
    {
        // Mock data for cases
        $cases = [
            ['id' => 1, 'name' => 'Sarah Abdullah', 'caseNo' => 'LC-2024-001', 'risk' => 'Low', 'riskValue' => 22, 'lastCheck' => '2 days ago'],
            ['id' => 2, 'name' => 'Mohamed Khalid', 'caseNo' => 'LC-2024-002', 'risk' => 'Medium', 'riskValue' => 58, 'lastCheck' => '4 days ago'],
            ['id' => 3, 'name' => 'Fatima Ali', 'caseNo' => 'LC-2024-003', 'risk' => 'High', 'riskValue' => 82, 'lastCheck' => '9 days ago'],
            ['id' => 4, 'name' => 'Omar Hassan', 'caseNo' => 'LC-2024-004', 'risk' => 'Low', 'riskValue' => 18, 'lastCheck' => '1 week ago'],
        ];
        
        return view('all-cases', compact('cases'));
    }
    
    public function show($id)
    {
        // Mock data for single case
        $case = [
            'id' => 1,
            'name' => 'Ahmed Mohamed',
            'caseNo' => 'LC-2024-001',
            'gender' => 'Male',
            'age' => 45,
            'registered' => 'March 15, 2026',
            'risk' => 'Medium',
            'riskValue' => 56,
            'condition' => 'Hepatitis B',
            'progress' => 65,
            'analyses' => 3,
            'lastLabDate' => 'April 1, 2026',
            'labResults' => [
                ['name' => 'ALT', 'value' => '78 U/L', 'normal' => '7-56 U/L', 'status' => 'High'],
                ['name' => 'AST', 'value' => '62 U/L', 'normal' => '10-40 U/L', 'status' => 'High'],
                ['name' => 'Total Bilirubin', 'value' => '0.9 mg/dL', 'normal' => '0.1-1.2 mg/dL', 'status' => 'Normal'],
                ['name' => 'Albumin', 'value' => '4.1 g/dL', 'normal' => '3.5-5.5 g/dL', 'status' => 'Normal'],
                ['name' => 'ALP', 'value' => '95 U/L', 'normal' => '44-147 U/L', 'status' => 'Normal'],
            ],
            'history' => [
                ['title' => 'Analysis #3 — Latest', 'date' => 'April 1, 2026', 'risk' => 'Medium', 'riskValue' => 56, 'note' => 'ALT improved from 92 to 78. Treatment showing positive progress.'],
                ['title' => 'Analysis #2', 'date' => 'March 15, 2026', 'risk' => 'Medium', 'riskValue' => 64, 'note' => 'Initial treatment started. ALT at 92, AST at 71. Monitoring began.'],
                ['title' => 'Analysis #1 — Initial', 'date' => 'February 28, 2026', 'risk' => 'High', 'riskValue' => 72, 'note' => 'First diagnosis. Elevated ALT (105), AST (85). Referred for specialist consultation.'],
            ]
        ];
        
        return view('case-details', compact('case'));
    }
    
    public function export($id)
    {
        // Export case report as PDF/JSON
        return response()->json(['success' => true, 'message' => 'Report exported']);
    }
    
    public function addNote(Request $request, $id)
    {
        // Add doctor note to case
        return redirect()->back()->with('success', 'Note added successfully');
    }
    
    public function runPrediction($id)
    {
        // Run AI prediction for case
        return redirect()->back()->with('success', 'Prediction completed');
    }
}