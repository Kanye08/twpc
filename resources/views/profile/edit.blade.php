@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<div class="max-w-2xl space-y-5">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-base font-semibold text-slate-800 mb-5">Profile Information</h2>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
            @csrf @method('PATCH')
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                @error('name') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                @error('email') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="px-5 py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-lg hover:bg-brand-700 transition shadow-sm">
                    Save Changes
                </button>
                @if(session('status') === 'profile-updated')
                    <span class="text-sm text-emerald-600 font-medium">✓ Saved!</span>
                @endif
            </div>
        </form>
    </div>

    @if(!auth()->user()->isAdmin())
    <div class="bg-white rounded-xl border border-red-200 shadow-sm p-6">
        <h2 class="text-base font-semibold text-red-600 mb-2">Delete Account</h2>
        <p class="text-sm text-slate-500 mb-4">Once deleted, all your data will be permanently removed.</p>
        <form action="{{ route('profile.destroy') }}" method="POST"
              onsubmit="return confirm('Are you sure? This cannot be undone.')">
            @csrf @method('DELETE')
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password</label>
                <input type="password" name="password" id="password"
                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 transition max-w-xs">
                @error('password', 'userDeletion') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="px-5 py-2.5 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition">
                Delete Account
            </button>
        </form>
    </div>
    @endif
</div>
@endsection