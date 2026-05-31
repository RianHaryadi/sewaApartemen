@extends('layouts.public')

@section('title', __('Titip Jual (Selling) Unit Apartemen Anda — Araia Property'))

@section('content')
<section class="py-16 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header -->
        <div class="text-center space-y-4">
            <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-widest">{{ __('SELLING PROGRAM') }}</span>
            <h1 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6]">{{ __('Titip Jual Unit Apartemen') }}</h1>
            <p class="text-gray-400 text-sm max-w-lg mx-auto">{{ __('Pasarkan unit apartemen Anda secara eksklusif bersama Araia Property. Kami bantu temukan pembeli potensial dengan cepat dan aman.') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
            
            <!-- Instructions/Benefits -->
            <div class="md:col-span-1 space-y-6 text-xs text-gray-400">
                <div class="space-y-2">
                    <h4 class="text-gray-200 font-bold uppercase tracking-wider">{{ __('Keunggulan Pemasaran') }}</h4>
                    <p class="leading-relaxed">{{ __('Unit Anda dipromosikan secara aktif di platform online kami, jaringan sosial media, serta ditawarkan kepada ribuan klien prospek kami secara langsung.') }}</p>
                </div>
                <div class="space-y-2">
                    <h4 class="text-gray-200 font-bold uppercase tracking-wider">{{ __('Persyaratan') }}</h4>
                    <ul class="list-disc pl-4 space-y-1">
                        <li>{{ __('Sertifikat kepemilikan jelas (PPJB/STRATA TITLE).') }}</li>
                        <li>{{ __('Kondisi unit bersih atau terawat.') }}</li>
                        <li>{{ __('Bersedia melakukan janji temu dengan calon pembeli dibantu oleh agen kami.') }}</li>
                    </ul>
                </div>
            </div>
            
            <!-- Form Card -->
            <div class="md:col-span-2 glass-card p-8 border border-[#C9A84C]/15">
                <form action="{{ route('selling.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div class="space-y-1.5">
                        <label for="name" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Nama Pemilik') }}</label>
                        <input type="text" name="name" id="name" required placeholder="{{ __('Masukkan nama lengkap...') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition">
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="email" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Email (Opsional)') }}</label>
                            <input type="email" name="email" id="email" placeholder="nama@email.com" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition">
                        </div>
                        <div class="space-y-1.5">
                            <label for="phone" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Nomor WhatsApp') }}</label>
                            <input type="tel" name="phone" id="phone" required placeholder="{{ __('Contoh: 0812345678') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition">
                        </div>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label for="message" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Detail Unit & Harga Harapan') }}</label>
                        <textarea name="message" id="message" rows="5" required placeholder="{{ __('Sebutkan tower, nomor lantai, ukuran m², tipe unit, kondisi interior, dan kisaran harga jual yang diinginkan...') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full btn-gold text-xs py-3 font-semibold uppercase tracking-wider">
                        {{ __('Ajukan Titip Jual & Hubungi WA') }}
                    </button>
                </form>
            </div>
            
        </div>
        
    </div>
</section>
@endsection
