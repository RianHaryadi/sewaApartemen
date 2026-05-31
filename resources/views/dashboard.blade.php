@extends('layouts.public')

@section('title', __('Dashboard User — Araia Property'))

@section('content')
<section class="py-12 bg-[#0A0A0A] border-b border-[#C9A84C]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome banner -->
        <div class="mb-12 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="space-y-2">
                <span class="text-xs font-bold text-[#C9A84C] uppercase tracking-widest">{{ __('USER AREA') }}</span>
                <h1 class="font-luxury text-3xl font-bold text-[#F3F4F6]">{{ __('Selamat Datang, :name', ['name' => auth()->user()->name]) }}</h1>
                <p class="text-gray-505 text-gray-500 text-sm">{{ __('Kelola pengajuan booking dan reservasi jadwal survei apartemen Anda.') }}</p>
            </div>
            
            <a href="{{ route('profile.edit') }}" class="btn-outline-gold text-xs px-4 py-2 uppercase font-semibold">
                {{ __('Edit Profil') }}
            </a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Side: Profile overview -->
            <div class="lg:col-span-1 space-y-6">
                <div class="glass-card p-6 border border-[#C9A84C]/15 space-y-6">
                    <h3 class="font-luxury text-lg font-bold text-[#F3F4F6] pb-4 border-b border-neutral-800">{{ __('Detail Akun') }}</h3>
                    
                    <div class="space-y-4 text-xs">
                        <div class="space-y-1">
                            <span class="text-gray-500 block uppercase tracking-wider">{{ __('Nama Lengkap') }}</span>
                            <strong class="text-gray-200 text-sm font-semibold">{{ auth()->user()->name }}</strong>
                        </div>
                        <div class="space-y-1">
                            <span class="text-gray-500 block uppercase tracking-wider">{{ __('Alamat Email') }}</span>
                            <strong class="text-gray-200 text-sm font-semibold">{{ auth()->user()->email }}</strong>
                        </div>
                        <div class="space-y-1">
                            <span class="text-gray-500 block uppercase tracking-wider">{{ __('Nomor WhatsApp') }}</span>
                            <strong class="text-[#C9A84C] text-sm font-bold">{{ auth()->user()->phone ?? '-' }}</strong>
                        </div>
                        <div class="space-y-1">
                            <span class="text-gray-500 block uppercase tracking-wider">{{ __('Status Hak Akses') }}</span>
                            <strong class="text-gray-200 text-sm font-semibold uppercase tracking-wider">{{ auth()->user()->role }}</strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Booking and Reservation lists -->
            <div class="lg:col-span-2 space-y-8" x-data="{ activeTab: 'booking' }">
                
                <!-- Tab switching header -->
                <div class="flex border-b border-neutral-800">
                    <button @click="activeTab = 'booking'" type="button" class="pb-3 text-xs uppercase font-bold tracking-wider transition border-b-2 mr-6" :class="activeTab === 'booking' ? 'border-[#C9A84C] text-[#C9A84C]' : 'border-transparent text-gray-500 hover:text-gray-300'">
                        {{ __('Booking Sewa') }} ({{ $bookings->count() }})
                    </button>
                    <button @click="activeTab = 'reservasi'" type="button" class="pb-3 text-xs uppercase font-bold tracking-wider transition border-b-2" :class="activeTab === 'reservasi' ? 'border-[#C9A84C] text-[#C9A84C]' : 'border-transparent text-gray-500 hover:text-gray-300'">
                        {{ __('Reservasi Survei') }} ({{ $reservations->count() }})
                    </button>
                </div>
                
                <!-- Bookings section -->
                <div x-show="activeTab === 'booking'" class="space-y-6">
                    @if($bookings->isEmpty())
                        <div class="glass-card p-12 text-center border border-neutral-800 space-y-4">
                            <svg class="h-10 w-10 text-gray-600 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            <h4 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Belum Ada Pengajuan Booking') }}</h4>
                            <p class="text-xs text-gray-500 max-w-xs mx-auto">{{ __('Anda belum pernah mengajukan sewa untuk unit apartemen kami.') }}</p>
                            <a href="{{ route('properti.index') }}" class="inline-block btn-gold text-xs font-semibold px-6 py-2 uppercase mt-2">
                                {{ __('Jelajahi Unit') }}
                            </a>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($bookings as $booking)
                                <div class="glass-card p-6 border border-neutral-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                                    <div class="space-y-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-bold text-[#C9A84C]">{{ __('Tower') }} {{ $booking->unit->tower }} &bull; {{ __('Unit') }} {{ $booking->unit->room_number }}</span>
                                            <span class="text-[9px] uppercase tracking-wider font-semibold px-2 py-0.5 rounded
                                                @if($booking->status === 'pending') bg-yellow-900/40 text-yellow-300 border border-yellow-500/20
                                                @elseif($booking->status === 'approved') bg-green-900/40 text-green-300 border border-green-500/20
                                                @else bg-red-900/40 text-red-300 border border-red-500/20
                                                @endif">
                                                {{ $booking->status }}
                                            </span>
                                        </div>
                                        <h3 class="font-luxury text-base font-bold text-[#F3F4F6]">{{ $booking->unit->name }}</h3>
                                        
                                        @if($booking->note)
                                            <p class="text-xs text-gray-400"><strong>{{ __('Catatan Anda:') }}</strong> "{{ $booking->note }}"</p>
                                        @endif
                                        
                                        @if($booking->admin_note)
                                            <p class="text-xs text-[#C9A84C] bg-[#C9A84C]/5 p-2 rounded border border-[#C9A84C]/10 mt-2">
                                                <strong>{{ __('Catatan Admin:') }}</strong> "{{ $booking->admin_note }}"
                                            </p>
                                        @endif
                                    </div>
                                    
                                    <div class="text-left sm:text-right space-y-1">
                                        <span class="block text-[10px] text-gray-500 uppercase tracking-wider">{{ __('Harga Sewa') }}</span>
                                        <strong class="text-sm text-gray-200">Rp {{ number_format($booking->unit->price, 0, ',', '.') }}/{{ __('bln') }}</strong>
                                        <span class="block text-[9px] text-gray-500">{{ __('Diajukan pada') }} {{ $booking->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <!-- Reservations section -->
                <div x-show="activeTab === 'reservasi'" class="space-y-6">
                    @if($reservations->isEmpty())
                        <div class="glass-card p-12 text-center border border-neutral-800 space-y-4">
                            <svg class="h-10 w-10 text-gray-600 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <h4 class="font-luxury text-lg font-bold text-[#F3F4F6]">{{ __('Belum Ada Reservasi Kunjungan') }}</h4>
                            <p class="text-xs text-gray-500 max-w-xs mx-auto">{{ __('Anda belum pernah menjadwalkan survei ke unit apartemen kami.') }}</p>
                            <a href="{{ route('properti.index') }}" class="inline-block btn-gold text-xs font-semibold px-6 py-2 uppercase mt-2">
                                {{ __('Cari Unit untuk Survei') }}
                            </a>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($reservations as $reservation)
                                <div class="glass-card p-6 border border-neutral-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                                    <div class="space-y-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-bold text-[#C9A84C]">{{ __('Kunjungan unit') }} {{ $reservation->unit->room_number }}</span>
                                            <span class="text-[9px] uppercase tracking-wider font-semibold px-2 py-0.5 rounded
                                                @if($reservation->status === 'pending') bg-yellow-900/40 text-yellow-300 border border-yellow-500/20
                                                @elseif($reservation->status === 'confirmed') bg-green-900/40 text-green-300 border border-green-500/20
                                                @else bg-red-900/40 text-red-300 border border-red-500/20
                                                @endif">
                                                {{ $reservation->status }}
                                            </span>
                                        </div>
                                        <h3 class="font-luxury text-base font-bold text-[#F3F4F6]">{{ $reservation->unit->name }}</h3>
                                        <div class="text-xs text-gray-400 flex items-center gap-3">
                                            <span><strong>{{ __('Tanggal:') }}</strong> {{ $reservation->preferred_date->format('d-m-Y') }}</span>
                                            <span>&bull;</span>
                                            <span><strong>{{ __('Jam:') }}</strong> {{ $reservation->preferred_time }} WIB</span>
                                        </div>
                                        
                                        @if($reservation->note)
                                            <p class="text-xs text-gray-400"><strong>{{ __('Catatan Anda:') }}</strong> "{{ $reservation->note }}"</p>
                                        @endif
                                        
                                        @if($reservation->admin_note)
                                            <p class="text-xs text-[#C9A84C] bg-[#C9A84C]/5 p-2 rounded border border-[#C9A84C]/10 mt-2">
                                                <strong>{{ __('Catatan Admin:') }}</strong> "{{ $reservation->admin_note }}"
                                            </p>
                                        @endif
                                    </div>
                                    
                                    <div class="text-left sm:text-right space-y-2">
                                        <!-- WhatsApp link to re-contact admin about this reservation -->
                                        @php
                                            $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '6281234567890');
                                            $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
                                            $msg = "Halo Admin Araia, saya ingin bertanya tentang reservasi kunjungan saya untuk unit " . $reservation->unit->name . " pada " . $reservation->preferred_date->format('d-m-Y') . " jam " . $reservation->preferred_time . " WIB.";
                                            $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($msg);
                                        @endphp
                                        <a href="{{ $whatsappUrl }}" target="_blank" class="inline-flex items-center gap-1.5 text-[10px] font-bold text-[#C9A84C] border border-[#C9A84C]/30 hover:bg-[#C9A84C]/10 py-1 px-3 rounded uppercase transition">
                                            {{ __('Hubungi WA') }}
                                        </a>
                                        <span class="block text-[9px] text-gray-500">{{ __('Dibuat pada') }} {{ $reservation->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                
            </div>
            
        </div>
    </div>
</section>
@endsection
