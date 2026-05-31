@extends('layouts.public')

@section('title', 'Login Account — Araia Property')

@section('content')
<section class="min-h-[75vh] flex items-center justify-center py-16 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="w-full max-w-md mx-auto px-6">
        
        <!-- Login Card -->
        <div class="border border-[#C9A84C]/15 bg-[#121212]/40 backdrop-blur-md p-8 md:p-10 rounded-lg space-y-6 animate-scale-in">
            <div class="text-center space-y-2">
                <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.25em] uppercase block">WELCOME BACK</span>
                <h2 class="font-luxury text-3xl font-bold tracking-wide text-[#F3F4F6]">Login</h2>
                <div class="w-12 h-0.5 bg-[#C9A84C] mx-auto mt-3"></div>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div class="space-y-1.5">
                    <label for="email" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-[9px] text-[#C9A84C] hover:underline font-semibold uppercase tracking-wider" href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    <input type="password" name="password" id="password" required autocomplete="current-password" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-3.5 h-3.5 rounded border-neutral-800 bg-[#1A1A1A] text-[#C9A84C] focus:ring-0 focus:ring-offset-0 focus:outline-none cursor-pointer">
                    <label for="remember_me" class="ms-2 text-[10px] text-gray-400 font-light tracking-wide cursor-pointer uppercase">Remember me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 bg-[#E5C158] hover:bg-[#D4AF37] text-black font-semibold text-[10px] uppercase tracking-[0.2em] rounded transition duration-200 shadow-md">
                    LOG IN
                </button>

                <p class="text-center text-[10px] text-gray-500 font-light mt-4">
                    New to Araia? <a href="{{ route('register') }}" class="text-[#C9A84C] font-semibold hover:underline">Create an Account</a>
                </p>
            </form>
        </div>
        
    </div>
</section>
@endsection
