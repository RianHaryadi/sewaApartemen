@extends('layouts.public')

@section('title', 'Register Account — Araia Property')

@section('content')
<section class="min-h-[75vh] flex items-center justify-center py-16 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="w-full max-w-md mx-auto px-6">
        
        <!-- Register Card -->
        <div class="border border-[#C9A84C]/15 bg-[#121212]/40 backdrop-blur-md p-8 md:p-10 rounded-lg space-y-6 animate-scale-in">
            <div class="text-center space-y-2">
                <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.25em] uppercase block">JOIN ARAIA ESTATES</span>
                <h2 class="font-luxury text-3xl font-bold tracking-wide text-[#F3F4F6]">Register</h2>
                <div class="w-12 h-0.5 bg-[#C9A84C] mx-auto mt-3"></div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div class="space-y-1.5">
                    <label for="name" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Email Address -->
                <div class="space-y-1.5">
                    <label for="email" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="username" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Phone Number -->
                <div class="space-y-1.5">
                    <label for="phone" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">WhatsApp Number (Active)</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required placeholder="e.g., 081234567890" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('phone')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="new-password" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1.5">
                    <label for="password_confirmation" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em] block">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs text-red-400" />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 bg-[#E5C158] hover:bg-[#D4AF37] text-black font-semibold text-[10px] uppercase tracking-[0.2em] rounded transition duration-200 shadow-md">
                    REGISTER
                </button>

                <p class="text-center text-[10px] text-gray-500 font-light mt-4">
                    Already registered? <a href="{{ route('login') }}" class="text-[#C9A84C] font-semibold hover:underline">Log in Account</a>
                </p>
            </form>
        </div>
        
    </div>
</section>
@endsection
