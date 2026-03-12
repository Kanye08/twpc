<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">
            {{ session('status') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-slate-800 mb-1">Welcome back</h2>
    <p class="text-slate-500 text-sm mb-6">Sign in to your account</p>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition
                          {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
            @error('email') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition
                          {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
            @error('password') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-brand-600 border-slate-300 rounded">
            <label for="remember_me" class="ml-2 text-sm text-slate-600">Remember me</label>
        </div>

        <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-semibold py-2.5 rounded-lg text-sm transition shadow-sm">
            Sign In
        </button>
    </form>

    <p class="text-center text-sm text-slate-500 mt-6">
        Don't have an account? <a href="{{ route('register') }}" class="text-brand-600 hover:text-brand-700 font-medium">Create one</a>
    </p>
</x-guest-layout>