@extends('layouts.public')

@section('title', __('Ajukan Sewa (Leasing) Apartemen Anda — Araia Property'))

@section('content')
<section class="py-16 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header -->
        <div class="text-center space-y-4">
            <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-widest">{{ __('LEASING PROGRAM') }}</span>
            <h1 class="font-luxury text-3xl sm:text-4xl font-bold text-[#F3F4F6]">{{ __('Ajukan Leasing Unit Anda') }}</h1>
            <p class="text-gray-400 text-sm max-w-lg mx-auto">{{ __('Miliki unit apartemen di Bekasi tapi jarang dihuni? Titipkan pengelolaan penyewaannya kepada kami agar unit tetap produktif.') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
            
            <!-- Instructions/Benefits -->
            <div class="md:col-span-1 space-y-6 text-xs text-gray-400">
                <div class="space-y-2">
                    <h4 class="text-gray-200 font-bold uppercase tracking-wider">{{ __('Kenapa Memilih Kami?') }}</h4>
                    <p class="leading-relaxed">{{ __('Kami menangani pemasaran secara penuh, proses check-in/out tamu, pembersihan berkala, serta pemeliharaan fasilitas dalam unit.') }}</p>
                </div>
                <div class="space-y-2">
                    <h4 class="text-gray-200 font-bold uppercase tracking-wider">{{ __('Langkah Pengajuan') }}</h4>
                    <ol class="list-decimal pl-4 space-y-1">
                        <li>{{ __('Isi form di samping dengan lengkap.') }}</li>
                        <li>{{ __('Sistem mengalihkan Anda ke WhatsApp Admin.') }}</li>
                        <li>{{ __('Jadwal inspeksi unit ditentukan.') }}</li>
                        <li>{{ __('Kontrak kerja sama ditandatangani.') }}</li>
                    </ol>
                </div>
            </div>
            
            <!-- Form Card -->
            <div class="md:col-span-2 glass-card p-8 border border-[#C9A84C]/15">
                <form action="{{ route('leasing.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div class="space-y-1.5">
                        <label for="name" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Nama Lengkap') }}</label>
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
                        <label for="unit_type" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Tipe Unit Yang Dimiliki') }}</label>
                        <select name="unit_type" id="unit_type" required class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition">
                            <option value="Studio Room">{{ __('Studio Room') }}</option>
                            <option value="One Bedroom (1BR)">{{ __('One Bedroom (1BR)') }}</option>
                            <option value="Two Bedroom (2BR)">{{ __('Two Bedroom (2BR)') }}</option>
                            <option value="Three Bedroom (3BR)">{{ __('Three Bedroom (3BR)') }}</option>
                        </select>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label for="message" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ __('Catatan Tambahan / Lokasi Unit') }}</label>
                        <textarea name="message" id="message" rows="4" placeholder="{{ __('Sebutkan tower, nomor lantai, kondisi unit (full furnish/kosongan)...') }}" class="w-full bg-[#121212] border border-[#C9A84C]/20 focus:border-[#C9A84C]/60 text-sm rounded px-3 py-2 text-gray-200 focus:outline-none transition"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full btn-gold text-xs py-3 font-semibold uppercase tracking-wider">
                        {{ __('Ajukan & Kirim ke WhatsApp') }}
                    </button>
                </form>
            </div>
            
        </div>
        
    </div>
</section>
@endsection
