<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of users with statistics.
     */
    public function index(Request $request)
    {
        // Load all users with their prediction count
        $users = User::withCount('predictions')->get();

        // Format users exactly as the front‑end JavaScript expects
        $formattedUsers = $users->map(function ($user) {
            return [
                'id'         => $user->id,
                'name'       => $user->full_name,
                'email'      => $user->email,
                'role'       => $user->role ?? 'student',
                'institution'=> $user->institution ?? '—',
                'cases'      => $user->predictions_count,
                'status'     => $user->status ?? 'active',
                'lastActive' => $user->last_active_at
                                 ? $user->last_active_at->diffForHumans()
                                 : 'Never',
            ];
        })->toArray();

        // Statistics for cards
        $totalUsers   = User::count();
        $activeUsers  = User::where('status', 'active')->count();
        $pendingUsers = User::where('status', 'pending')->count();
        $inactiveUsers = User::where('status', 'inactive')->count();

        $physicians  = User::where('role', 'physician')->count();
        $researchers = User::where('role', 'researcher')->count();
        $admins      = User::where('role', 'admin')->count();
        $students    = User::where('role', 'student')->count();

        // New users this month & growth
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)
                                 ->whereYear('created_at', now()->year)
                                 ->count();
        $lastMonthNew = User::whereMonth('created_at', now()->subMonth()->month)
                            ->whereYear('created_at', now()->subMonth()->year)
                            ->count();
        $monthlyGrowth = $lastMonthNew > 0
            ? round((($newUsersThisMonth - $lastMonthNew) / $lastMonthNew) * 100, 1)
            : 100;

        // Activity stats (based on last_active_at)
        $dailyActive   = User::where('last_active_at', '>=', now()->subDay())->count();
        $weeklyActive  = User::where('last_active_at', '>=', now()->subWeek())->count();
        $monthlyActive = User::where('last_active_at', '>=', now()->subMonth())->count();

        // Days since first user registered
        $firstUser  = User::orderBy('created_at')->first();
        $listedDays = $firstUser ? now()->diffInDays($firstUser->created_at) : 0;

        // Pass everything to the view
        return view('admin.users', [
            'users'              => $formattedUsers,
            'totalUsers'         => $totalUsers,
            'activeUsers'        => $activeUsers,
            'pendingUsers'       => $pendingUsers,
            'inactiveUsers'      => $inactiveUsers,
            'physicians'         => $physicians,
            'researchers'        => $researchers,
            'admins'             => $admins,
            'students'           => $students,
            'newUsersThisMonth'  => $newUsersThisMonth,
            'monthlyGrowth'      => $monthlyGrowth,
            'dailyActive'        => $dailyActive,
            'weeklyActive'       => $weeklyActive,
            'monthlyActive'      => $monthlyActive,
            'listedDays'         => $listedDays,
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.user-form');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|min:8|confirmed',
            'role'         => 'required|in:admin,doctor,physician,researcher,student',
            'institution'  => 'nullable|string|max:255',
        ]);

        User::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'name'        => $request->first_name . ' ' . $request->last_name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => $request->role,
            'institution' => $request->institution,
            'status'      => 'active',      // default status
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-form', compact('user'));
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $id,
            'role'         => 'required|in:admin,doctor,physician,researcher,student',
            'status'       => 'required|in:active,inactive,pending',
            'institution'  => 'nullable|string|max:255',
        ]);

        $user->update([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'name'        => $request->first_name . ' ' . $request->last_name,
            'email'       => $request->email,
            'role'        => $request->role,
            'status'      => $request->status,
            'institution' => $request->institution,
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted.');
    }
}