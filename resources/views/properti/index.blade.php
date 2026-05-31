@extends('layouts.public')

@section('title', __('Daftar Properti Apartemen Sewa & Jual — Araia Property'))

@section('content')
<!-- Hero Banner Header -->
<section class="relative h-[40vh] flex items-center border-b border-[#C9A84C]/15 overflow-hidden">
    <!-- Background Image with bottom cropped -->
    <div class="absolute" style="top: 0; left: 0; right: 0; bottom: -16px; background-image: url('/images/lobby.png'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    
    <!-- Dark Overlays for Text Readability -->
    <div class="absolute inset-0 bg-black/65"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0A0A0A] via-black/45 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center space-y-4">
        <h1 class="font-luxury text-4xl sm:text-5xl font-bold text-[#F3F4F6] uppercase tracking-widest">
            {{ __('Our Properties') }}
        </h1>
        <div class="w-16 h-0.5 bg-[#C9A84C] mx-auto"></div>
        <p class="text-[#C9A84C] text-[9px] sm:text-xs font-bold tracking-[0.25em] uppercase max-w-xl mx-auto">
            {{ __('CURATED ARCHITECTURAL HERITAGE FOR THE DISCERNING FEW') }}
        </p>
    </div>
</section>

<!-- Main Search & Listing Section -->
<section class="py-20 bg-[#0A0A0A]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1">
                <div class="glass-card p-6 sticky top-28 border border-[#C9A84C]/15 space-y-6" style="background: rgba(18, 18, 18, 0.75); backdrop-filter: blur(12px);">
                    <div class="flex justify-between items-center pb-4 border-b border-neutral-800/80">
                        <h3 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Filter Pencarian') }}</h3>
                        <a href="{{ route('properti.index') }}" class="text-[10px] text-[#C9A84C] hover:underline uppercase tracking-wider font-semibold">{{ __('Reset') }}</a>
                    </div>
                    
                    <form action="{{ route('properti.index') }}" method="GET" class="space-y-5">
                        
                        <!-- Search Query -->
                        <div class="space-y-1.5">
                            <label for="search" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Pencarian') }}</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="{{ __('Cari nama, tower...') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 placeholder-neutral-600 focus:outline-none transition">
                        </div>
                        
                        <!-- Listing Type -->
                        <div class="space-y-1.5">
                            <label for="listing_type" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Tipe Transaksi') }}</label>
                            <select name="listing_type" id="listing_type" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition">
                                <option value="">{{ __('Semua Transaksi') }}</option>
                                <option value="rent" {{ request('listing_type') === 'rent' ? 'selected' : '' }}>{{ __('Sewa') }}</option>
                                <option value="sell" {{ request('listing_type') === 'sell' ? 'selected' : '' }}>{{ __('Beli (Dijual)') }}</option>
                            </select>
                        </div>
                        
                        <!-- Unit Type -->
                        <div class="space-y-1.5">
                            <label for="type" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Tipe Unit') }}</label>
                            <select name="type" id="type" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition">
                                <option value="">{{ __('Semua Tipe') }}</option>
                                <option value="studio" {{ request('type') === 'studio' ? 'selected' : '' }}>{{ __('Studio') }}</option>
                                <option value="1br" {{ request('type') === '1br' ? 'selected' : '' }}>{{ __('One Bedroom (1BR)') }}</option>
                                <option value="2br" {{ request('type') === '2br' ? 'selected' : '' }}>{{ __('Two Bedroom (2BR)') }}</option>
                                <option value="3br" {{ request('type') === '3br' ? 'selected' : '' }}>{{ __('Three Bedroom (3BR)') }}</option>
                            </select>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="space-y-2">
                            <label class="text-xs text-gray-400 font-semibold uppercase tracking-wider block">{{ __('Batas Harga (Rp)') }}</label>
                            <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="{{ __('Min') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 placeholder-neutral-600 focus:outline-none transition">
                            <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="{{ __('Max') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 placeholder-neutral-600 focus:outline-none transition">
                        </div>
                        
                        <button type="submit" class="w-full btn-gold text-xs py-2.5 font-bold tracking-wider uppercase">
                            {{ __('Terapkan Filter') }}
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Properties Grid -->
            <div class="lg:col-span-3 space-y-12">
                
                @if($units->isEmpty())
                    <div class="glass-card p-12 text-center border border-neutral-800/80 space-y-4" style="background: rgba(18, 18, 18, 0.45);">
                        <svg class="h-12 w-12 text-[#C9A84C] mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="font-luxury text-xl font-bold text-[#F3F4F6]">{{ __('Tidak Ada Unit Ditemukan') }}</h3>
                        <p class="text-xs text-gray-500 max-w-sm mx-auto">{{ __('Kami tidak dapat menemukan unit yang cocok dengan kriteria filter pencarian Anda. Silakan coba atur ulang filter.') }}</p>
                        <a href="{{ route('properti.index') }}" class="inline-block btn-gold text-xs font-semibold px-6 py-2 uppercase mt-2">
                            {{ __('Reset Filter') }}
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($units as $unit)
                            <div class="glass-card overflow-hidden hover-lift flex flex-col h-full border border-[#C9A84C]/15 bg-[#121212]/30 transition duration-300">
                                
                                <!-- Image -->
                                <div class="relative aspect-[16/10] overflow-hidden bg-neutral-900">
                                    <img src="{{ asset($unit->primary_image_path) }}" alt="{{ $unit->name }}" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                                    
                                    <!-- Badges -->
                                    <div class="absolute top-4 left-4 flex gap-2" style="z-index: 10;">
                                        @if($unit->listing_type === 'sell')
                                            <span class="text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded shadow-md" style="background: #C9A84C; color: #0A0A0A;">
                                                {{ __('BELI') }}
                                            </span>
                                        @else
                                            <span class="text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded shadow-md" style="background: #F3F4F6; color: #0A0A0A;">
                                                {{ __('SEWA') }}
                                            </span>
                                        @endif
                                        <span class="text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded shadow-md" style="background: #86EFAC; color: #064E3B;">
                                            {{ __('TERSEDIA') }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Content -->
                                <div class="p-5 flex-grow flex flex-col justify-between space-y-4">
                                    <div class="space-y-2">
                                        <h3 class="font-luxury text-lg font-bold text-[#F3F4F6] line-clamp-1 hover:text-[#C9A84C] transition">
                                            <a href="{{ route('properti.show', $unit->id) }}">{{ $unit->name }}</a>
                                        </h3>
                                        
                                        <!-- Location with Pin Icon -->
                                        <div class="flex items-center gap-1.5 text-xs text-gray-400 font-light">
                                            <svg class="h-3.5 w-3.5 text-[#C9A84C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                            <span>Lagoon Avenue, Bekasi</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Specs Grid (3 Column dividers) -->
                                    <div class="grid grid-cols-3 text-center border-y border-[#C9A84C]/15 py-3 my-2 bg-neutral-900/20">
                                        <!-- Spec 1: Type -->
                                        <div class="flex flex-col justify-center items-center relative">
                                            <span class="font-luxury text-sm font-bold text-gold-gradient tracking-wide">
                                                {{ strtoupper($unit->type) }}
                                            </span>
                                            <span class="text-[8px] sm:text-[9px] uppercase tracking-widest text-gray-500 mt-1">
                                                {{ __('Tipe') }}
                                            </span>
                                            <!-- Vertical line separator -->
                                            <div class="absolute right-0 top-1/4 bottom-1/4 w-px bg-[#C9A84C]/15"></div>
                                        </div>
                                        
                                        <!-- Spec 2: Tower -->
                                        <div class="flex flex-col justify-center items-center relative">
                                            <span class="font-luxury text-sm font-bold text-gold-gradient tracking-wide">
                                                {{ strtoupper($unit->tower) }}
                                            </span>
                                            <span class="text-[8px] sm:text-[9px] uppercase tracking-widest text-gray-500 mt-1">
                                                {{ __('Tower') }}
                                            </span>
                                            <!-- Vertical line separator -->
                                            <div class="absolute right-0 top-1/4 bottom-1/4 w-px bg-[#C9A84C]/15"></div>
                                        </div>
                                        
                                        <!-- Spec 3: Size -->
                                        <div class="flex flex-col justify-center items-center">
                                            <span class="font-luxury text-sm font-bold text-gold-gradient tracking-wide">
                                                {{ $unit->size_sqm }}
                                            </span>
                                            <span class="text-[8px] sm:text-[9px] uppercase tracking-widest text-gray-500 mt-1">
                                                {{ __('M²') }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Bottom Action Row: Price & Booking Button -->
                                    <div class="pt-2 flex justify-between items-center gap-3">
                                        <div class="text-left">
                                            <span class="font-luxury text-base font-bold text-gold-gradient whitespace-nowrap">
                                                {{ $unit->formatted_price }}
                                            </span>
                                        </div>
                                        <div>
                                            <a href="{{ route('properti.show', $unit->id) }}" class="btn-gold text-[9px] sm:text-[10px] tracking-[0.15em] uppercase font-bold" style="padding: 8px 16px; border-radius: 4px; box-shadow: none;">
                                                {{ __('BOOKING') }}
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Custom Pagination Links -->
                    @if ($units->hasPages())
                        <div class="flex justify-center items-center gap-2 pt-8">
                            {{-- Previous Page Link --}}
                            @if ($units->onFirstPage())
                                <span class="w-10 h-10 flex items-center justify-center border border-[#C9A84C]/15 text-gray-700 rounded-md text-xs cursor-not-allowed">&lsaquo;</span>
                            @else
                                <a href="{{ $units->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center border border-[#C9A84C]/25 text-[#C9A84C] hover:bg-[#C9A84C]/10 rounded-md transition duration-200 text-xs">&lsaquo;</a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($units->getUrlRange(1, $units->lastPage()) as $page => $url)
                                @if ($page == $units->currentPage())
                                    <span class="w-10 h-10 flex items-center justify-center bg-[#C9A84C] text-[#0A0A0A] font-bold rounded-md text-xs shadow-md shadow-[#C9A84C]/20">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center border border-[#C9A84C]/25 text-[#C9A84C] hover:bg-[#C9A84C]/10 rounded-md transition duration-200 text-xs">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($units->hasMorePages())
                                <a href="{{ $units->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center border border-[#C9A84C]/25 text-[#C9A84C] hover:bg-[#C9A84C]/10 rounded-md transition duration-200 text-xs">&rsaquo;</a>
                            @else
                                <span class="w-10 h-10 flex items-center justify-center border border-[#C9A84C]/15 text-gray-700 rounded-md text-xs cursor-not-allowed">&rsaquo;</span>
                            @endif
                        </div>
                    @endif
                @endif
                
            </div>
            
        </div>
    </div>
</section>

<!-- Off-Market CTA Section -->
<section class="py-20 bg-[#0A0A0A] border-t border-[#C9A84C]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6] tracking-wide">
            {{ __('Seeking an Off-Market Estate?') }}
        </h2>
        <p class="text-gray-400 text-xs sm:text-sm leading-relaxed max-w-2xl mx-auto font-light">
            {{ __('Our most exclusive listings are reserved for private consultations. Connect with our specialists today.') }}
        </p>
        <div class="pt-4">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890') }}?text=Halo%20Araia%20Property,%20saya%20tertarik%20dengan%20layanan%20off-market%20estate%20apartemen." target="_blank" class="btn-outline-gold text-xs tracking-widest uppercase font-semibold inline-block" style="padding: 14px 28px;">
                {{ __('REQUEST PRIVATE VIEWING') }}
            </a>
        </div>
    </div>
</section>
@endsection
