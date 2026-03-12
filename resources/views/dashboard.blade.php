@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-brand-600 to-brand-800 rounded-2xl p-6 text-white shadow-lg">
        <h2 class="text-xl font-bold mb-1">Welcome back, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-brand-200 text-sm">
            {{ auth()->user()->isAdmin() ? 'Here\'s an overview of your platform activity.' : 'Here\'s a summary of your product activity.' }}
        </p>
    </div>

    @if(auth()->user()->isAdmin())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500 mb-1">Total Users</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_users'] }}</p>
                <a href="{{ route('admin.users.index') }}" class="text-xs text-brand-600 hover:underline mt-2 inline-block">View all →</a>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500 mb-1">Blocked Users</p>
                <p class="text-3xl font-bold text-red-600">{{ $stats['blocked_users'] }}</p>
                <a href="{{ route('admin.users.index') }}" class="text-xs text-brand-600 hover:underline mt-2 inline-block">Manage →</a>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500 mb-1">Total Products</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_products'] }}</p>
                <a href="{{ route('admin.products.index') }}" class="text-xs text-brand-600 hover:underline mt-2 inline-block">View all →</a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500 mb-1">My Products</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_products'] }}</p>
                <a href="{{ route('products.index') }}" class="text-xs text-brand-600 hover:underline mt-2 inline-block">View all →</a>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex items-center justify-center">
                <a href="{{ route('products.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-3 bg-brand-600 text-white text-sm font-semibold rounded-xl hover:bg-brand-700 transition shadow-sm">
                    + Add New Product
                </a>
            </div>
        </div>
    @endif
</div>
@endsection