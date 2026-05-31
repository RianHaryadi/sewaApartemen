@extends('layouts.public')

@section('title', __('Hubungi Kami — Araia Property'))

@section('content')
<section class="py-20 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            <!-- Left Column: Info & Map -->
            <div class="lg:col-span-5 space-y-8 animate-fade-in-left">
                <!-- Header -->
                <div class="space-y-4">
                    <span class="text-[#C9A84C] text-[10px] font-extrabold tracking-[0.25em] uppercase">
                        CONTACT INQUIRY
                    </span>
                    <h1 class="font-luxury text-4xl sm:text-5xl font-bold text-[#F3F4F6] leading-[1.15]">
                        Connect with<br>Heritage.
                    </h1>
                    <p class="text-gray-400 text-xs sm:text-sm font-light leading-relaxed max-w-sm">
                        Our advisors are available globally to assist with private viewings and off-market architectural acquisitions.
                    </p>
                </div>
                
                <!-- Contact info points -->
                <div class="space-y-6 pt-4 border-t border-neutral-800">
                    
                    <!-- Global HQ -->
                    <div class="space-y-1.5">
                        <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.2em] uppercase flex items-center gap-2">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            GLOBAL HQ
                        </span>
                        <p class="text-xs text-gray-400 font-light leading-relaxed pl-5">
                            {{ $settings['company_address'] }}
                        </p>
                    </div>

                    <!-- WhatsApp Business -->
                    <div class="space-y-1.5">
                        <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.2em] uppercase flex items-center gap-2">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            WHATSAPP BUSINESS
                        </span>
                        <p class="text-xs text-gray-400 font-light leading-relaxed pl-5">
                            {{ $settings['whatsapp_number'] }}
                        </p>
                    </div>

                    <!-- Email Inquiry -->
                    <div class="space-y-1.5">
                        <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.2em] uppercase flex items-center gap-2">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            EMAIL INQUIRY
                        </span>
                        <p class="text-xs text-gray-400 font-light leading-relaxed pl-5">
                            concierge@araiaproperty.com
                        </p>
                    </div>

                </div>

                <!-- Map Section -->
                <div class="relative rounded-lg overflow-hidden border border-[#C9A84C]/15 group w-full h-64">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.106187243032!2d106.9783331!3d-6.249736500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d0046c1072b%3A0xb92dbd9f5c0bbeaa!2sAraia%20Properti!5e0!3m2!1sen!2sid!4v1780075644393!5m2!1sen!2sid" class="w-full h-full grayscale opacity-80 contrast-[1.2] hover:grayscale-0 hover:opacity-100 transition duration-300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <!-- Right Column: Private Inquiry Form -->
            <div class="lg:col-span-7 bg-[#121212]/40 border border-[#C9A84C]/15 rounded-lg p-8 md:p-10 space-y-6 animate-fade-in-right">
                
                <div class="relative pb-4">
                    <h2 class="font-luxury text-2xl text-[#F3F4F6] font-medium tracking-wide">{{ __('Private Inquiry') }}</h2>
                    <div class="absolute bottom-0 left-0 w-12 h-0.5 bg-[#C9A84C]"></div>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em]">{{ __('Full Name') }}</label>
                            <input type="text" name="name" id="name" required placeholder="Johnathan Doe" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                        </div>
                        
                        <div class="space-y-2">
                            <label for="subject" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em]">{{ __('Subject') }}</label>
                            <div class="relative">
                                <select name="subject" id="subject" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-300 focus:outline-none transition appearance-none pr-10">
                                    <option value="Investment Opportunity" selected>{{ __('Investment Opportunity') }}</option>
                                    <option value="Property Viewing">{{ __('Property Viewing') }}</option>
                                    <option value="Leasing Program">{{ __('Leasing Program') }}</option>
                                    <option value="General Inquiry">{{ __('General Inquiry') }}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="email" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em]">{{ __('Email Address') }}</label>
                            <input type="email" name="email" id="email" required placeholder="email@heritage.com" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                        </div>
                        
                        <div class="space-y-2">
                            <label for="phone" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em]">{{ __('Phone Number / WhatsApp') }}</label>
                            <input type="tel" name="phone" id="phone" required placeholder="e.g., 081234567890" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="text-[9px] text-gray-400 font-extrabold uppercase tracking-[0.15em]">{{ __('Message') }}</label>
                        <textarea name="message" id="message" rows="5" required placeholder="{{ __('Describe your architectural interest...') }}" class="w-full bg-[#1A1A1A]/80 border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded px-4 py-3.5 text-gray-200 focus:outline-none transition"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-[#E5C158] hover:bg-[#D4AF37] text-black font-semibold text-[10px] uppercase tracking-[0.25em] rounded transition duration-300 flex items-center justify-center gap-2">
                        {{ __('KIRIM & CHAT VIA WHATSAPP') }}
                        <span class="text-xs">▷</span>
                    </button>

                    <p class="text-center text-[10px] text-gray-500 font-light mt-4">
                        {{ __('Your privacy is paramount. View our') }} <a href="{{ route('legalitas') }}" class="underline hover:text-gray-400">{{ __('Privacy Policy') }}</a> {{ __('regarding data handling.') }}
                    </p>
                </form>

            </div>

        </div>
    </div>
</section>
@endsection
