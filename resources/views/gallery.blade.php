@extends('layouts.public')

@section('title', __('Galeri Foto Apartemen & Fasilitas — Araia Property'))

@section('content')
<section class="py-16 bg-[#0A0A0A] border-b border-[#C9A84C]/10" x-data="{ lightboxOpen: false, lightboxImage: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-4">
            <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-widest">{{ __('VISUAL INSPIRATION') }}</span>
            <h1 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6]">{{ __('Galeri Foto') }}</h1>
            <p class="text-gray-500 text-sm">{{ __('Lihat langsung keindahan setiap sudut unit hunian, lobi, dan fasilitas kebugaran premium di Araia Property.') }}</p>
        </div>
        
        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-12">
            <a href="{{ route('gallery') }}" class="px-5 py-2 text-xs font-bold uppercase tracking-wider rounded transition {{ !$category ? 'bg-[#C9A84C] text-[#0A0A0A]' : 'bg-[#121212] border border-neutral-800 text-gray-400 hover:text-white' }}">
                {{ __('Semua Foto') }}
            </a>
            <a href="{{ route('gallery', ['category' => 'unit']) }}" class="px-5 py-2 text-xs font-bold uppercase tracking-wider rounded transition {{ $category === 'unit' ? 'bg-[#C9A84C] text-[#0A0A0A]' : 'bg-[#121212] border border-neutral-800 text-gray-400 hover:text-white' }}">
                {{ __('Unit Apartemen') }}
            </a>
            <a href="{{ route('gallery', ['category' => 'facility']) }}" class="px-5 py-2 text-xs font-bold uppercase tracking-wider rounded transition {{ $category === 'facility' ? 'bg-[#C9A84C] text-[#0A0A0A]' : 'bg-[#121212] border border-neutral-800 text-gray-400 hover:text-white' }}">
                {{ __('Fasilitas Gedung') }}
            </a>
            <a href="{{ route('gallery', ['category' => 'exterior']) }}" class="px-5 py-2 text-xs font-bold uppercase tracking-wider rounded transition {{ $category === 'exterior' ? 'bg-[#C9A84C] text-[#0A0A0A]' : 'bg-[#121212] border border-neutral-800 text-gray-400 hover:text-white' }}">
                {{ __('Lainnya / Eksterior') }}
            </a>
        </div>
        
        <!-- Gallery Grid -->
        @if($galleries->isEmpty())
            <div class="glass-card p-12 text-center border border-neutral-800 max-w-md mx-auto space-y-4">
                <svg class="h-10 w-10 text-[#C9A84C] mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h3 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Tidak Ada Foto') }}</h3>
                <p class="text-xs text-gray-500">{{ __('Tidak ada gambar yang aktif di kategori ini saat ini.') }}</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($galleries as $g)
                    <div @click="lightboxOpen = true; lightboxImage = '{{ asset($g->image_path) }}'" class="group glass-card overflow-hidden border border-[#C9A84C]/10 cursor-pointer hover-lift relative aspect-square bg-neutral-900">
                        
                        <!-- Image -->
                        <img src="{{ asset($g->image_path) }}" alt="{{ $g->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        
                        <!-- Hover info overlay -->
                        <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-6 space-y-2">
                            <span class="text-[9px] text-[#C9A84C] font-semibold uppercase tracking-widest">{{ strtoupper($g->category) }}</span>
                            <h3 class="font-luxury text-base font-bold text-[#F3F4F6]">{{ $g->title }}</h3>
                            <span class="text-[10px] text-gray-400 font-semibold inline-flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                </svg>
                                {{ __('Klik untuk Memperbesar') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
    </div>

    <!-- Lightbox Modal (Alpine.js) -->
    <div x-show="lightboxOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4" x-cloak>
        
        <!-- Close trigger background -->
        <div class="absolute inset-0 cursor-zoom-out" @click="lightboxOpen = false"></div>
        
        <!-- Modal Content wrapper -->
        <div class="relative max-w-4xl max-h-[90vh] w-full flex justify-center items-center relative z-10" @click.away="lightboxOpen = false">
            <img :src="lightboxImage" alt="Lightbox Preview" class="max-w-full max-h-[85vh] rounded-lg border border-[#C9A84C]/35 shadow-2xl object-contain">
            
            <!-- Close Button -->
            <button @click="lightboxOpen = false" type="button" class="absolute -top-10 right-0 text-[#F3F4F6] hover:text-[#C9A84C] text-xl font-bold bg-[#0A0A0A] p-2 rounded-full border border-neutral-800">&times;</button>
        </div>
    </div>
</section>
@endsection
