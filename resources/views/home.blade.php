@extends('layouts.public')

@section('title', __('Araia Property — Premium & Cozy Apartment Bekasi'))

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[80vh] flex items-center border-b border-[#C9A84C]/15 overflow-hidden">
    <!-- Background Image with bottom cropped to hide any white borders/lines -->
    <div class="absolute" style="top: 0; left: 0; right: 0; bottom: -16px; background-image: url('/images/lobby.png'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>

    <!-- Dark Overlays for Text Readability -->
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/85 to-transparent"></div>

    <!-- Hero Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full" style="padding-top: 140px; padding-bottom: 80px;">
        <div class="max-w-3xl animate-fade-in-up">
            <span class="inline-block text-[#C9A84C] text-xs font-bold tracking-[0.25em] uppercase" style="margin-bottom: 32px;">
                {{ __('COZY LIVING REDEFINED') }}
            </span>
            <h1 class="font-luxury text-4xl sm:text-5xl lg:text-6xl font-bold text-[#F3F4F6] leading-[1.2]" style="margin-bottom: 24px;">
                {{ __('Temukan Hunian Terbaik Anda Bersama Araia Property') }}
            </h1>
            
            <!-- Short Gold Line -->
            <div class="w-16 h-0.5 bg-[#C9A84C]" style="margin-bottom: 32px;"></div>

            <p class="text-gray-400 text-sm sm:text-base leading-relaxed max-w-xl font-light" style="margin-bottom: 48px;">
                {{ __('Experience the pinnacle of architectural excellence. Our curated portfolio offers residences that transcend ordinary living into a legacy of luxury.') }}
            </p>
            <div class="flex flex-wrap gap-6">
                <a href="{{ route('properti.index') }}" class="btn-gold text-xs tracking-widest uppercase font-semibold" style="padding: 16px 32px;">
                    {{ __('LIHAT UNIT') }}
                </a>
                <a href="{{ route('contact') }}" class="btn-outline-gold text-xs tracking-widest uppercase font-semibold" style="padding: 16px 32px;">
                    {{ __('HUBUNGI KAMI') }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Row Section (Floating Glassmorphic Panel overlapping Hero) -->
<div class="relative z-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8" style="margin-top: -64px; margin-bottom: 32px;">
    <div class="glass-card p-6 md:p-10 border border-[#C9A84C]/25 shadow-[0_15px_40px_rgba(201,168,76,0.1)]" style="background: rgba(10, 10, 10, 0.85); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border-radius: 12px;">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 md:gap-y-0 text-center">
            <!-- Item 1 -->
            <div class="px-4 flex flex-col justify-center items-center relative">
                <span class="font-luxury text-3xl sm:text-4xl lg:text-5xl font-bold text-gold-gradient tracking-wider">150+</span>
                <span class="text-[9px] sm:text-xs uppercase tracking-[0.2em] text-gray-400 mt-3 font-semibold text-center leading-relaxed">
                    {{ __('Pilihan Unit Premium') }}
                </span>
                <!-- Vertical Divider for Desktop -->
                <div class="hidden md:block absolute right-0 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A84C]/25 to-transparent"></div>
            </div>
            
            <!-- Item 2 -->
            <div class="px-4 flex flex-col justify-center items-center relative">
                <span class="font-luxury text-3xl sm:text-4xl lg:text-5xl font-bold text-gold-gradient tracking-wider">24</span>
                <span class="text-[9px] sm:text-xs uppercase tracking-[0.2em] text-gray-400 mt-3 font-semibold text-center leading-relaxed">
                    {{ __('Layanan Siap 24 Jam') }}
                </span>
                <!-- Vertical Divider for Desktop -->
                <div class="hidden md:block absolute right-0 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A84C]/25 to-transparent"></div>
            </div>
            
            <!-- Item 3 -->
            <div class="px-4 flex flex-col justify-center items-center relative">
                <span class="font-luxury text-3xl sm:text-4xl lg:text-5xl font-bold text-gold-gradient tracking-wider">12</span>
                <span class="text-[9px] sm:text-xs uppercase tracking-[0.2em] text-gray-400 mt-3 font-semibold text-center leading-relaxed">
                    {{ __('Penghargaan Properti') }}
                </span>
                <!-- Vertical Divider for Desktop -->
                <div class="hidden md:block absolute right-0 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A84C]/25 to-transparent"></div>
            </div>
            
            <!-- Item 4 -->
            <div class="px-4 flex flex-col justify-center items-center">
                <span class="font-luxury text-3xl sm:text-4xl lg:text-5xl font-bold text-gold-gradient tracking-wider">2014</span>
                <span class="text-[9px] sm:text-xs uppercase tracking-[0.2em] text-gray-400 mt-3 font-semibold text-center leading-relaxed">
                    {{ __('Pengalaman Sejak 2014') }}
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Facilities Section -->
<section class="py-24 bg-[#0A0A0A]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-left max-w-2xl mb-16 space-y-3">
            <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-[0.2em]">{{ __('EXCELLENCE') }}</span>
            <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6]">{{ __('Fasilitas Eksklusif') }}</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Cozy Apartment -->
            <div class="glass-card p-8 hover-lift space-y-5 border border-[#C9A84C]/10 hover:border-[#C9A84C]/35 transition duration-300">
                <div class="text-[#C9A84C]">
                    <!-- Key Icon -->
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                </div>
                <h3 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Cosy Apartment') }}</h3>
                <p class="text-xs text-gray-400 leading-relaxed font-light">{{ __('Meticulously designed interior to give you comfort and style memory.') }}</p>
            </div>
            
            <!-- Mall & Retail -->
            <div class="glass-card p-8 hover-lift space-y-5 border border-[#C9A84C]/10 hover:border-[#C9A84C]/35 transition duration-300">
                <div class="text-[#C9A84C]">
                    <!-- Shopping Bag Icon -->
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
                <h3 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Mall & Retail') }}</h3>
                <p class="text-xs text-gray-400 leading-relaxed font-light">{{ __('Seamless access to premium shopping, entertainment and culinary packages.') }}</p>
            </div>
            
            <!-- Gym & Fitness -->
            <div class="glass-card p-8 hover-lift space-y-5 border border-[#C9A84C]/10 hover:border-[#C9A84C]/35 transition duration-300">
                <div class="text-[#C9A84C]">
                    <!-- Gym Icon -->
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                </div>
                <h3 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Gym & Fitness') }}</h3>
                <p class="text-xs text-gray-400 leading-relaxed font-light">{{ __('State-of-the-art wellness center with professional sports equipment.') }}</p>
            </div>
            
            <!-- City View -->
            <div class="glass-card p-8 hover-lift space-y-5 border border-[#C9A84C]/10 hover:border-[#C9A84C]/35 transition duration-300">
                <div class="text-[#C9A84C]">
                    <!-- View Icon -->
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <h3 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('City View') }}</h3>
                <p class="text-xs text-gray-400 leading-relaxed font-light">{{ __('Panoramic views of the city skyline from your private terrace.') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Araia Rooms Section -->
<section class="py-24 bg-[#0A0A0A] border-t border-[#C9A84C]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-16 gap-6">
            <div class="space-y-3">
                <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-[0.2em]">{{ __('THE COLLECTION') }}</span>
                <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6]">{{ __('Araia Rooms') }}</h2>
            </div>
            <a href="{{ route('properti.index') }}" class="text-xs text-[#C9A84C] hover:text-[#B8973B] transition duration-200 uppercase tracking-[0.2em] font-semibold flex items-center gap-2">
                {{ __('VIEW ALL UNITS') }}
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            @foreach($featuredUnits as $unit)
                <div class="glass-card overflow-hidden hover-lift flex flex-col h-full border border-[#C9A84C]/10 hover:border-[#C9A84C]/35 transition duration-300">
                    <!-- Image -->
                    <div class="relative aspect-[16/10] overflow-hidden bg-neutral-900">
                        <img src="{{ asset($unit->primary_image_path) }}" alt="{{ $unit->name }}" class="w-full h-full object-cover transition duration-700 hover:scale-105">
                        <div class="absolute top-4 left-4 flex gap-2" style="z-index: 10;">
                            @if($unit->listing_type === 'rent')
                                <span class="text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded shadow-md" style="background: #F3F4F6; color: #0A0A0A;">
                                    {{ __('SEWA') }}
                                </span>
                            @else
                                <span class="text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded shadow-md" style="background: #C9A84C; color: #0A0A0A;">
                                    {{ __('BELI') }}
                                </span>
                            @endif
                            <span class="text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded shadow-md" style="background: #86EFAC; color: #064E3B;">
                                {{ __('TERSEDIA') }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex-grow flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="flex justify-between items-start gap-4">
                                <h3 class="font-luxury text-xl font-bold text-[#F3F4F6]">
                                    <a href="{{ route('properti.show', $unit->id) }}" class="hover:text-[#C9A84C] transition">{{ $unit->name }}</a>
                                </h3>
                                <span class="text-sm font-bold text-[#C9A84C] whitespace-nowrap">{{ $unit->formatted_price }}</span>
                            </div>
                            <p class="text-xs text-gray-500 font-light uppercase tracking-widest">
                                {{ $unit->size_sqm }} SQM | {{ strtoupper($unit->type) }} | Tower {{ $unit->tower }} &bull; Lantai {{ $unit->floor }} &bull; Unit {{ $unit->room_number }}
                            </p>
                            <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed font-light">
                                {{ $unit->description }}
                            </p>
                        </div>
                        
                        <div class="pt-2">
                            <a href="{{ route('properti.show', $unit->id) }}" class="block text-center btn-outline-gold text-xs py-3 w-full uppercase tracking-widest font-semibold hover:bg-[#C9A84C] hover:text-[#0A0A0A] hover:border-[#C9A84C] transition duration-300">
                                {{ __('SURVEY UNIT') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<!-- Gallery Preview Section (dari Dashboard admin Galleries) -->
<section class="py-24 bg-[#0A0A0A] border-t border-[#C9A84C]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-[0.2em]">{{ __('VISUAL EXPERIENCE') }}</span>
            <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6]">{{ __('Sekilas Galeri') }}</h2>
            <p class="text-gray-505 text-gray-500 text-xs font-light">{{ __('Intip keindahan ruang dan fasilitas premium di Araia Property.') }}</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galleries as $g)
                <div class="relative group aspect-square rounded-lg overflow-hidden border border-[#C9A84C]/10 shadow-lg">
                    <img src="{{ asset($g->image_path) }}" alt="{{ $g->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-4">
                        <span class="text-[9px] text-[#C9A84C] font-semibold uppercase tracking-wider">{{ $g->category }}</span>
                        <h4 class="text-xs font-bold text-[#F3F4F6]">{{ $g->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" class="btn-outline-gold text-xs tracking-widest uppercase font-semibold">
                {{ __('Lihat Semua Galeri') }}
            </a>
        </div>
        
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-24 bg-[#0A0A0A] border-t border-[#C9A84C]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="border border-[#C9A84C]/20 bg-gradient-to-r from-[#121212] to-[#0A0A0A] rounded-xl py-16 px-8 md:px-16 text-center space-y-6 max-w-5xl mx-auto relative overflow-hidden">
            <!-- Decorative corner highlights -->
            <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#C9A84C]/30"></div>
            <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#C9A84C]/30"></div>
            
            <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6] leading-tight">
                {{ __('Miliki Properti Impian Anda') }}
            </h2>
            <p class="text-gray-400 text-xs sm:text-sm leading-relaxed max-w-2xl mx-auto font-light">
                {{ __('Konsultasikan kebutuhan hunian Anda dengan penasihat properti kami yang berpengalaman. Kami siap membantu Anda menemukan hunian eksklusif yang tepat.') }}
            </p>
            <div class="pt-4">
                <a href="{{ route('contact') }}" class="btn-gold text-xs tracking-widest uppercase font-semibold inline-block">
                    {{ __('BOOK AN APPOINTMENT') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
