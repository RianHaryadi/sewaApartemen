@extends('layouts.public')

@section('title', __('Legalitas Perusahaan — Araia Property'))

@section('content')
<section class="py-24 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="max-w-4xl mx-auto px-6 lg:px-8 space-y-20">
        
        <!-- Header Section -->
        <div class="space-y-6 text-left animate-fade-in-up">
            <h1 class="font-luxury text-4xl sm:text-5xl font-bold text-gold-gradient leading-tight tracking-wide">
                Legalitas & Corporate Transparency
            </h1>
            <p class="text-gray-400 text-sm sm:text-base max-w-3xl leading-relaxed font-light">
                ARAIA PROPERTY operates under strict architectural standards and national legal compliance to ensure every investment is secure and verified.
            </p>
        </div>
        
        <!-- Corporate Info Vertical List with left border -->
        <div class="space-y-10 pl-8 relative animate-fade-in-left">
            <!-- Entity Name -->
            <div class="space-y-2">
                <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.25em] uppercase block">
                    Entity Name
                </span>
                <span class="font-luxury text-2xl sm:text-3xl text-[#F3F4F6] block leading-snug">
                    {{ $settings['company_name'] }}
                </span>
            </div>
            
            <!-- Registration Number -->
            <div class="space-y-2">
                <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.25em] uppercase block">
                    Registration Number (NIB)
                </span>
                <span class="font-luxury text-3xl sm:text-4xl text-[#F3F4F6] block tracking-wide leading-none">
                    {{ $settings['company_nib'] }}
                </span>
                <span class="text-gray-500 text-[10px] sm:text-xs block font-light tracking-wide mt-1.5">
                    Registered at the Ministry of Law and Human Rights
                </span>
            </div>
            
            <!-- Registered Address -->
            <div class="space-y-2">
                <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.25em] uppercase block">
                    Registered Address
                </span>
                <span class="font-luxury text-base sm:text-lg text-gray-300 block max-w-2xl leading-relaxed">
                    {{ $settings['company_address'] }}
                </span>
            </div>
        </div>

        <!-- Documentation Divider -->
        <div class="flex items-center gap-6 pt-6 animate-fade-in-up">
            <span class="font-luxury text-2xl font-bold text-[#F3F4F6] tracking-wide whitespace-nowrap">Certified Documentation</span>
            <div class="flex-grow h-px bg-gradient-to-r from-[#C9A84C]/25 to-transparent"></div>
        </div>

        <!-- Document Grid 2x2 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-16">
            
            <!-- Document 1: Akta -->
            <div class="space-y-5 animate-scale-in delay-100">
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-neutral-800 bg-neutral-900 shadow-xl transition-all duration-300 hover:border-[#C9A84C]/30">
                    <img src="{{ asset('images/doc_akta.png') }}" alt="Akta Pendirian Perusahaan" class="w-full h-full object-cover grayscale opacity-95 transition duration-700 hover:scale-103 hover:grayscale-0">
                </div>
                <div class="space-y-1.5 pl-1">
                    <h4 class="text-[#C9A84C] text-xs font-bold uppercase tracking-widest">Akta Pendirian Perusahaan</h4>
                    <p class="text-gray-500 text-[10px] sm:text-xs font-light">Authenticated by Notary Public</p>
                    <a href="{{ asset('images/doc_akta.png') }}" target="_blank" class="inline-flex items-center gap-1.5 text-[#C9A84C] hover:text-[#B8973B] transition text-[10px] tracking-[0.2em] font-bold uppercase pt-3">
                        View Full Document ➔
                    </a>
                </div>
            </div>

            <!-- Document 2: NPWP -->
            <div class="space-y-5 animate-scale-in delay-200">
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-neutral-800 bg-neutral-900 shadow-xl transition-all duration-300 hover:border-[#C9A84C]/30">
                    <img src="{{ asset('images/doc_npwp.png') }}" alt="NPWP & Tax Compliance" class="w-full h-full object-cover grayscale opacity-95 transition duration-700 hover:scale-103 hover:grayscale-0">
                </div>
                <div class="space-y-1.5 pl-1">
                    <h4 class="text-[#C9A84C] text-xs font-bold uppercase tracking-widest">NPWP & Tax Compliance</h4>
                    <p class="text-gray-500 text-[10px] sm:text-xs font-light">Authorized Directorate General of Taxes</p>
                    <a href="{{ asset('images/doc_npwp.png') }}" target="_blank" class="inline-flex items-center gap-1.5 text-[#C9A84C] hover:text-[#B8973B] transition text-[10px] tracking-[0.2em] font-bold uppercase pt-3">
                        View Full Document ➔
                    </a>
                </div>
            </div>

            <!-- Document 3: SIUP -->
            <div class="space-y-5 animate-scale-in delay-300">
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-neutral-800 bg-neutral-900 shadow-xl transition-all duration-300 hover:border-[#C9A84C]/30">
                    <img src="{{ asset('images/doc_siup.png') }}" alt="SIUP Real Estate" class="w-full h-full object-cover grayscale opacity-95 transition duration-700 hover:scale-103 hover:grayscale-0">
                </div>
                <div class="space-y-1.5 pl-1">
                    <h4 class="text-[#C9A84C] text-xs font-bold uppercase tracking-widest">SIUP Real Estate</h4>
                    <p class="text-gray-500 text-[10px] sm:text-xs font-light">National Property Licensing</p>
                    <a href="{{ asset('images/doc_siup.png') }}" target="_blank" class="inline-flex items-center gap-1.5 text-[#C9A84C] hover:text-[#B8973B] transition text-[10px] tracking-[0.2em] font-bold uppercase pt-3">
                        View Full Document ➔
                    </a>
                </div>
            </div>

            <!-- Document 4: NIB -->
            <div class="space-y-5 animate-scale-in delay-400">
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-neutral-800 bg-neutral-900 shadow-xl transition-all duration-300 hover:border-[#C9A84C]/30">
                    <img src="{{ asset('images/doc_nib.png') }}" alt="NIB Registration" class="w-full h-full object-cover grayscale opacity-95 transition duration-700 hover:scale-103 hover:grayscale-0">
                </div>
                <div class="space-y-1.5 pl-1">
                    <h4 class="text-[#C9A84C] text-xs font-bold uppercase tracking-widest">NIB Registration</h4>
                    <p class="text-gray-500 text-[10px] sm:text-xs font-light">OSS System Authenticated</p>
                    <a href="{{ asset('images/doc_nib.png') }}" target="_blank" class="inline-flex items-center gap-1.5 text-[#C9A84C] hover:text-[#B8973B] transition text-[10px] tracking-[0.2em] font-bold uppercase pt-3">
                        View Full Document ➔
                    </a>
                </div>
            </div>

        </div>

        <!-- Legal Disclaimer Box -->
        <div class="border border-neutral-800/85 p-6 rounded-lg text-center max-w-3xl mx-auto mt-20 animate-fade-in-up" style="border-radius: 6px; background: rgba(15, 15, 15, 0.45);">
            <p class="text-[10px] sm:text-xs text-gray-500 font-light leading-relaxed">
                All documents provided above are for verification purposes only. Duplication or unauthorized use of these certificates is strictly prohibited by law. For direct verification, please contact our legal department at <a href="mailto:legal@araiaproperty.com" class="text-[#C9A84C] hover:underline font-semibold">legal@araiaproperty.com</a>.
            </p>
        </div>
        
    </div>
</section>
@endsection
