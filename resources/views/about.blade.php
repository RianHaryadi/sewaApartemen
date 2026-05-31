@extends('layouts.public')

@section('title', __('Tentang Kami — Araia Property'))

@section('content')
<!-- Hero Banner Header -->
<section class="relative h-[55vh] flex items-center border-b border-[#C9A84C]/15 overflow-hidden">
    <!-- Background Image with bottom cropped -->
    <div class="absolute" style="top: 0; left: 0; right: 0; bottom: -16px; background-image: url('/images/about_hero.png'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    
    <!-- Dark Overlays for Text Readability -->
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0A0A0A] via-black/45 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full text-left space-y-3 animate-fade-in-up">
        <span class="text-[#C9A84C] text-[10px] font-extrabold tracking-[0.25em] uppercase">
            {{ __('OUR HERITAGE') }}
        </span>
        <h1 class="font-luxury text-4xl sm:text-5xl lg:text-6xl font-bold text-[#F3F4F6] leading-[1.2] max-w-2xl">
            {{ __('Architects of Exceptional Living') }}
        </h1>
    </div>
</section>

<!-- About Main Content Section -->
<section class="py-20 bg-[#0A0A0A]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-20">
        
        <!-- Precision Legacy Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <div class="space-y-4 animate-fade-in-left">
                <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-gold-gradient leading-tight max-w-sm">
                    {{ __('A Legacy Built on Precision.') }}
                </h2>
                <div class="w-16 h-0.5 bg-[#C9A84C]"></div>
            </div>
            
            <div class="text-gray-400 text-sm leading-relaxed space-y-6 font-light animate-fade-in-right">
                <p>
                    {{ __('Founded in 2014, Araia Property has redefined the landscape of luxury real estate through a singular focus on architectural integrity and discretion. We do not merely construct spaces; we curate environments where heritage meets the avant-garde.') }}
                </p>
                <p>
                    {{ __('Our portfolio spans globally-minded developments, from the refined estates of Bekasi to the bespoke towers of the capital. Every project we represent undergoes a rigorous selection process to ensure it meets our standards of "Defined Architecture Heritage".') }}
                </p>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Stat 1 -->
            <div class="border border-[#C9A84C]/15 bg-[#121212]/30 p-6 rounded-md shadow-lg animate-scale-in delay-75">
                <div class="font-luxury text-2xl sm:text-3xl font-bold text-gold-gradient">Rp4.2M+</div>
                <div class="text-[9px] uppercase tracking-[0.2em] text-gray-500 mt-2 font-semibold">{{ __('Asset Value') }}</div>
            </div>
            
            <!-- Stat 2 -->
            <div class="border border-[#C9A84C]/15 bg-[#121212]/30 p-6 rounded-md shadow-lg animate-scale-in delay-150">
                <div class="font-luxury text-2xl sm:text-3xl font-bold text-gold-gradient">26</div>
                <div class="text-[9px] uppercase tracking-[0.2em] text-gray-500 mt-2 font-semibold">{{ __('Global Offices') }}</div>
            </div>
            
            <!-- Stat 3 -->
            <div class="border border-[#C9A84C]/15 bg-[#121212]/30 p-6 rounded-md shadow-lg animate-scale-in delay-200">
                <div class="font-luxury text-2xl sm:text-3xl font-bold text-gold-gradient">150+</div>
                <div class="text-[9px] uppercase tracking-[0.2em] text-gray-500 mt-2 font-semibold">{{ __('Heritage Awards') }}</div>
            </div>
            
            <!-- Stat 4 -->
            <div class="border border-[#C9A84C]/15 bg-[#121212]/30 p-6 rounded-md shadow-lg animate-scale-in delay-300">
                <div class="font-luxury text-2xl sm:text-3xl font-bold text-gold-gradient">0.1%</div>
                <div class="text-[9px] uppercase tracking-[0.2em] text-gray-500 mt-2 font-semibold">{{ __('Portfolio Selection') }}</div>
            </div>
        </div>

        <!-- Vision Mission with Gold Borders -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 pt-6">
            <!-- Vision -->
            <div class="pl-6 border-l-2 border-[#C9A84C] space-y-3 animate-fade-in-left">
                <h3 class="text-[#C9A84C] text-[10px] font-extrabold tracking-[0.2em] uppercase">{{ __('OUR VISION') }}</h3>
                <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
                    {{ __('To redefine the portfolio of real estate by introducing modern living, where every decoration is refined for the standard of its residents. We aspire to build a future where luxury is defined by architectural and aesthetic value over simple space.') }}
                </p>
            </div>
            
            <!-- Mission -->
            <div class="pl-6 border-l-2 border-[#C9A84C] space-y-3 animate-fade-in-right">
                <h3 class="text-[#C9A84C] text-[10px] font-extrabold tracking-[0.2em] uppercase">{{ __('OUR MISSION') }}</h3>
                <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
                    {{ __('To bridge the gap between discerning individuals and state-of-the-art properties. We resolve to maintain a seamless, private, and highly personalized real estate experience that respects the historical significance of our assets and the time of our clients.') }}
                </p>
            </div>
        </div>

        <!-- Boardroom Guided by Expertise Banner -->
        <div class="relative h-[45vh] flex items-center justify-center border-y border-[#C9A84C]/15 overflow-hidden rounded-xl shadow-2xl">
            <!-- Boardroom Background image -->
            <div class="absolute inset-0" style="background-image: url('/images/about_boardroom.png'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/75"></div>
            
            <!-- Content -->
            <div class="relative z-10 text-center space-y-3 px-4 animate-fade-in-up">
                <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6] tracking-wide">
                    {{ __('Guided by Expertise.') }}
                </h2>
                <span class="text-[#C9A84C] text-[9px] sm:text-[10px] font-extrabold tracking-[0.25em] uppercase">
                    {{ __('CONSULT WITH OUR GLOBAL ADVISORS') }}
                </span>
            </div>
        </div>

        <!-- Global Presence & Map Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left Side Details -->
            <div class="space-y-6 animate-fade-in-left">
                <div class="space-y-3">
                    <h3 class="font-luxury text-2xl sm:text-3xl font-bold text-gold-gradient">{{ __('Global Presence') }}</h3>
                    <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light max-w-md">
                        {{ __('Our boutique firm operates out of the architectural district, connecting you to our global network of advisors and heritage properties.') }}
                    </p>
                </div>
                
                <div class="space-y-6 pt-4 border-t border-neutral-900">
                    <!-- Address -->
                    <div class="flex items-start gap-4 text-xs text-gray-400">
                        <svg class="h-5 w-5 text-[#C9A84C] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <div>
                            <strong class="text-gray-200 block font-semibold mb-1 uppercase tracking-wider text-[10px]">{{ __('Bekasi Marketing Office') }}</strong>
                            <span class="leading-relaxed">{{ $settings['company_address'] }}</span>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-start gap-4 text-xs text-gray-400">
                        <svg class="h-5 w-5 text-[#C9A84C] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.824-1.47-5.112-3.758-6.58-6.58l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <div>
                            <strong class="text-gray-200 block font-semibold mb-1 uppercase tracking-wider text-[10px]">{{ __('WhatsApp Admin') }}</strong>
                            <span>+{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side Map image -->
            <div class="rounded-lg overflow-hidden border border-[#C9A84C]/15 bg-neutral-900 shadow-2xl aspect-[16/10] animate-fade-in-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.106187243032!2d106.9783331!3d-6.249736500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d0046c1072b%3A0xb92dbd9f5c0bbeaa!2sAraia%20Properti!5e0!3m2!1sen!2sid!4v1780075644393!5m2!1sen!2sid" class="w-full h-full grayscale opacity-80 contrast-[1.2] hover:grayscale-0 hover:opacity-100 transition duration-300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
</section>
@endsection
