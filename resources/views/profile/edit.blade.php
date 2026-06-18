@extends('layouts.app')

@section('title', 'Edit Profile - LiverCare AI')

@section('content')
<div class="pt-32 pb-24 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-2 text-sm text-slate-400 mb-8">
            <a href="{{ route('profile') }}" class="hover:text-accent-teal transition-colors">Profile</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-white font-medium">Edit Profile</span>
        </div>

        <h1 class="text-3xl font-display font-bold text-white mb-8">Edit Profile</h1>

        <div class="glass-card p-8 rounded-2xl mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">photo_camera</span></div>
                <h2 class="text-lg font-display font-bold text-white">Profile Photo</h2>
            </div>
            <div class="flex items-center gap-6">
                <div class="w-24 h-24 bg-deep-navy border-2 border-accent-teal/30 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-accent-teal text-4xl">person</span>
                </div>
                <div>
                    <button class="px-4 py-2 bg-accent-teal/20 text-accent-teal text-sm font-medium rounded-lg hover:bg-accent-teal/30 transition-colors mb-2 block">Upload Photo</button>
                    <p class="text-xs text-slate-500">JPG, PNG. Max 5MB.</p>
                </div>
            </div>
        </div>

        <div class="glass-card p-8 rounded-2xl mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">person</span></div>
                <h2 class="text-lg font-display font-bold text-white">Personal Information</h2>
            </div>

            @if(session('success'))
                <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-lg">
                    <p class="text-emerald-400 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-500/10 border border-red-500/20 rounded-lg">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PATCH')

                <div><label class="block text-sm text-slate-400 mb-2">First Name</label><input type="text" name="first_name" value="{{ old('first_name', explode(' ', Auth::user()->name)[0] ?? '') }}" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>
                <div><label class="block text-sm text-slate-400 mb-2">Last Name</label><input type="text" name="last_name" value="{{ old('last_name', explode(' ', Auth::user()->name)[1] ?? '') }}" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>
                <div><label class="block text-sm text-slate-400 mb-2">Email Address</label><input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>
                <div><label class="block text-sm text-slate-400 mb-2">Phone Number</label><input type="tel" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal" placeholder="+20 123 456 7890"></div>
                <div><label class="block text-sm text-slate-400 mb-2">Date of Birth</label><input type="date" name="dob" value="{{ old('dob', Auth::user()->date_of_birth ?? '') }}" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>
                <div><label class="block text-sm text-slate-400 mb-2">Gender</label><select name="gender" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"><option value="male" {{ (old('gender', Auth::user()->gender) == 'male') ? 'selected' : '' }}>Male</option><option value="female" {{ (old('gender', Auth::user()->gender) == 'female') ? 'selected' : '' }}>Female</option></select></div>

                <button type="submit" class="px-6 py-3 bg-accent-teal text-deep-navy font-bold rounded-xl hover:bg-accent-teal/90 transition flex items-center gap-2"><span class="material-symbols-outlined text-sm">save</span> Save Changes</button>
            </form>
        </div>

        <div class="glass-card p-8 rounded-2xl">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-blue">lock</span></div>
                <h2 class="text-lg font-display font-bold text-white">Change Password</h2>
            </div>

            <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div><label class="block text-sm text-slate-400 mb-2">Current Password</label><input type="password" name="current_password" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>
                <div><label class="block text-sm text-slate-400 mb-2">New Password</label><input type="password" name="password" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>
                <div><label class="block text-sm text-slate-400 mb-2">Confirm New Password</label><input type="password" name="password_confirmation" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal"></div>

                <button type="submit" class="px-6 py-3 bg-accent-blue/20 text-accent-blue font-bold rounded-xl hover:bg-accent-blue/30 transition flex items-center gap-2"><span class="material-symbols-outlined text-sm">sync</span> Update Password</button>
            </form>
        </div>
    </div>
</div>
@endsection