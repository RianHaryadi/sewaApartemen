@extends('layouts.public')

@section('title')
    {{ $unit->name }} — Araia Property
@endsection

@section('content')
<section class="py-12 bg-[#0A0A0A] border-b border-[#C9A84C]/10" 
         x-data="{ 
            images: [
                @if($unit->images->isNotEmpty())
                    @foreach($unit->images as $img)
                        '{{ asset($img->image_path) }}',
                    @endforeach
                @else
                    '{{ asset($unit->primary_image_path) }}'
                @endif
            ],
            activeIndex: 0,
            showSurveyModal: false, 
            showBookingModal: false,
            touchStartX: 0,
            init() {
                const primary = '{{ asset($unit->primary_image_path) }}';
                const idx = this.images.indexOf(primary);
                if (idx !== -1) {
                    this.activeIndex = idx;
                }
            },
            nextImage() {
                if (this.images.length > 1) {
                    this.activeIndex = (this.activeIndex + 1) % this.images.length;
                }
            },
            prevImage() {
                if (this.images.length > 1) {
                    this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
                }
            }
         }"
         @keydown.window.right="if (!['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) nextImage()"
         @keydown.window.left="if (!['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) prevImage()">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
        <!-- Breadcrumbs Navigation -->
        <div class="mb-8 text-[10px] text-gray-500 uppercase tracking-[0.2em] font-semibold flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-[#C9A84C] transition">ESTATES</a>
            <span>&gt;</span>
            <a href="{{ route('properti.index') }}" class="hover:text-[#C9A84C] transition">RESIDENCES</a>
            <span>&gt;</span>
            <span class="text-[#C9A84C] font-bold">{{ strtoupper($unit->name) }}</span>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            <!-- Left & Middle Column (Images, Title, Specifications, Description) -->
            <div class="lg:col-span-8 space-y-8 animate-fade-in-left">
                
                <!-- Main Image Preview -->
                <div class="relative w-full aspect-[16/10] rounded-lg overflow-hidden border border-[#C9A84C]/15 bg-neutral-900 shadow-2xl group"
                     @touchstart="touchStartX = $event.changedTouches[0].screenX"
                     @touchend="if ($event.changedTouches[0].screenX < touchStartX - 50) nextImage(); if ($event.changedTouches[0].screenX > touchStartX + 50) prevImage();">
                    
                    <img :src="images[activeIndex]" alt="{{ $unit->name }}" class="w-full h-full object-cover transition duration-300">
                    
                    <div class="absolute top-4 left-4">
                        <span class="text-[9px] font-extrabold uppercase tracking-[0.15em] px-2.5 py-1 rounded bg-[#0A0A0A]/95 text-[#C9A84C] border border-[#C9A84C]/25 shadow-md">
                            {{ $unit->listing_type === 'rent' ? __('DISEWAKAN') : __('DIJUAL') }}
                        </span>
                    </div>

                    <!-- Slide Navigation Buttons -->
                    <template x-if="images.length > 1">
                        <div>
                            <!-- Previous Button -->
                            <button @click="prevImage()" type="button" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-black/60 hover:bg-[#C9A84C]/80 text-[#C9A84C] hover:text-black border border-[#C9A84C]/20 hover:border-transparent transition-all duration-300 opacity-0 group-hover:opacity-100 focus:opacity-100 shadow-lg">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>

                            <!-- Next Button -->
                            <button @click="nextImage()" type="button" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-black/60 hover:bg-[#C9A84C]/80 text-[#C9A84C] hover:text-black border border-[#C9A84C]/20 hover:border-transparent transition-all duration-300 opacity-0 group-hover:opacity-100 focus:opacity-100 shadow-lg">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 15.75 12 8.25 19.5" />
                                </svg>
                            </button>

                            <!-- Slide Counter Badge (Bottom Right) -->
                            <div class="absolute bottom-4 right-4 bg-black/75 backdrop-blur-sm border border-[#C9A84C]/20 px-2.5 py-1 rounded text-[10px] font-semibold text-gray-300 uppercase tracking-widest">
                                <span x-text="activeIndex + 1"></span> / <span x-text="images.length"></span>
                            </div>
                        </div>
                    </template>
                </div>
                
                <!-- Thumbnails Grid -->
                @if($unit->images->count() > 1)
                    <div class="grid grid-cols-6 gap-3">
                        @foreach($unit->images as $index => $img)
                            @if($index < 5)
                                <button @click="activeIndex = {{ $index }}" type="button" class="relative aspect-[4/3] rounded overflow-hidden border transition duration-200 hover:scale-[1.03]" :class="activeIndex === {{ $index }} ? 'border-[#C9A84C]' : 'border-neutral-800'">
                                    <img src="{{ asset($img->image_path) }}" alt="Thumbnail" class="w-full h-full object-cover">
                                </button>
                            @endif
                        @endforeach
                        
                        @if($unit->images->count() > 5)
                            @php
                                $remaining = $unit->images->count() - 5;
                                $sixthImg = $unit->images->skip(5)->first();
                            @endphp
                            <!-- 6th Thumbnail showing '+MORE' badge, highlights border if active index is 5 or more -->
                            <button @click="activeIndex = 5" type="button" class="relative aspect-[4/3] rounded overflow-hidden border transition duration-200 hover:scale-[1.03] group" :class="activeIndex >= 5 ? 'border-[#C9A84C]' : 'border-neutral-800'">
                                <img src="{{ asset($sixthImg->image_path) }}" alt="Thumbnail" class="w-full h-full object-cover" :class="activeIndex >= 5 ? '' : 'filter brightness-[0.3]'">
                                <div class="absolute inset-0 flex items-center justify-center bg-black/45" x-show="activeIndex < 5">
                                    <span class="text-[9px] uppercase font-extrabold tracking-widest text-[#C9A84C] group-hover:text-white transition">+{{ $remaining }} {{ __('MORE') }}</span>
                                </div>
                            </button>
                        @endif
                    </div>
                @endif
                
                <!-- Title & Location + Price Row -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 border-b border-neutral-800 pb-6 pt-4">
                    <div class="space-y-2">
                        <h1 class="font-luxury text-3xl sm:text-4xl font-bold tracking-wide text-[#F3F4F6] uppercase">
                            {{ $unit->name }}
                        </h1>
                        <div class="flex items-center gap-1.5 text-xs text-gray-500 font-semibold tracking-wide">
                            <svg class="h-4 w-4 text-[#C9A84C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ __('TOWER') }} {{ strtoupper($unit->tower) }}, {{ __('LANTAI') }} {{ $unit->floor }}
                        </div>
                    </div>
                    
                    <div class="text-left sm:text-right space-y-1">
                        <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.2em] uppercase">{{ __('PRICE GUIDE') }}</span>
                        <div class="font-luxury text-2xl sm:text-3xl font-bold text-[#C9A84C]">
                            Rp{{ number_format($unit->price, 0, ',', '.') }}{{ $unit->listing_type === 'rent' ? '/' . __('bln') : '' }}
                        </div>
                    </div>
                </div>
                
                <!-- Specs Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 py-6 border-b border-neutral-800">
                    <div class="space-y-1">
                        <span class="text-[9px] text-gray-500 font-extrabold uppercase tracking-[0.15em]">{{ __('UNIT TYPE') }}</span>
                        <div class="text-sm font-luxury text-gray-200 font-semibold uppercase">{{ __('Tipe') }} {{ $unit->type }}</div>
                    </div>
                    
                    <div class="space-y-1">
                        <span class="text-[9px] text-gray-500 font-extrabold uppercase tracking-[0.15em]">{{ __('TOWER / FLOOR') }}</span>
                        <div class="text-sm font-luxury text-gray-200 font-semibold uppercase">{{ $unit->tower }} / {{ __('Lantai') }} {{ $unit->floor }}</div>
                    </div>
                    
                    <div class="space-y-1">
                        <span class="text-[9px] text-gray-500 font-extrabold uppercase tracking-[0.15em]">{{ __('AREA (SQ M)') }}</span>
                        <div class="text-sm font-luxury text-gray-200 font-semibold uppercase">{{ $unit->size_sqm }} m²</div>
                    </div>
                    
                    <div class="space-y-1">
                        <span class="text-[9px] text-gray-500 font-extrabold uppercase tracking-[0.15em]">{{ __('ROOM NUMBER') }}</span>
                        <div class="text-sm font-luxury text-gray-200 font-semibold uppercase">#{{ $unit->room_number }}</div>
                    </div>
                </div>
                
                <!-- Architectural Vision & Facilities -->
                <div class="space-y-6 pt-2">
                    <h3 class="font-luxury text-lg font-bold tracking-widest text-[#F3F4F6] uppercase">{{ __('Architectural Vision') }}</h3>
                    <div class="text-gray-400 text-xs sm:text-sm font-light leading-relaxed space-y-4">
                        {!! nl2br(e($unit->description)) !!}
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                        <div class="flex items-center gap-3 bg-[#121212]/30 border border-neutral-800/60 p-4 rounded">
                            <span class="text-[#C9A84C] text-sm">🏊</span>
                            <span class="text-[9px] font-extrabold uppercase tracking-widest text-gray-300">{{ __('OUTDOOR SWIMMING POOL') }}</span>
                        </div>
                        
                        <div class="flex items-center gap-3 bg-[#121212]/30 border border-neutral-800/60 p-4 rounded">
                            <span class="text-[#C9A84C] text-sm">🏋️</span>
                            <span class="text-[9px] font-extrabold uppercase tracking-widest text-gray-300">{{ __('MODERN FITNESS GYM') }}</span>
                        </div>
                        
                        <div class="flex items-center gap-3 bg-[#121212]/30 border border-neutral-800/60 p-4 rounded">
                            <span class="text-[#C9A84C] text-sm">🛍️</span>
                            <span class="text-[9px] font-extrabold uppercase tracking-widest text-gray-300">{{ __('LAGOON AVENUE MALL ACCESS') }}</span>
                        </div>
                        
                        <div class="flex items-center gap-3 bg-[#121212]/30 border border-neutral-800/60 p-4 rounded">
                            <span class="text-[#C9A84C] text-sm">🛡️</span>
                            <span class="text-[9px] font-extrabold uppercase tracking-widest text-gray-300">{{ __('24/7 CONCIERGE & SECURITY') }}</span>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!-- Right Column Sidebar -->
            <div class="lg:col-span-4 space-y-8 animate-fade-in-right">
                
                <!-- Box 1: Inquire for Details -->
                <div class="border border-[#C9A84C]/15 bg-[#121212]/40 p-6 md:p-8 rounded-lg space-y-6">
                    <div class="space-y-1">
                        <span class="text-[#C9A84C] text-[9px] font-extrabold tracking-[0.2em] uppercase block">{{ __('EXCLUSIVE OPPORTUNITY') }}</span>
                        <h2 class="font-luxury text-xl font-medium tracking-wide text-[#F3F4F6]">{{ __('Inquire for Details') }}</h2>
                    </div>
                    
                    <div class="space-y-3 text-xs pt-4 border-t border-neutral-800">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 uppercase tracking-wider text-[10px]">{{ __('Availability') }}</span>
                            @if($unit->status === 'available')
                                <span class="text-[#C9A84C] font-bold tracking-wider uppercase flex items-center gap-1 text-[10px]">
                                    <span class="text-[8px]">▲</span> {{ __('IMMEDIATE') }}
                                </span>
                            @else
                                <span class="text-red-400 font-bold tracking-wider uppercase flex items-center gap-1 text-[10px]">
                                    <span class="text-[8px]">▼</span> {{ __('BOOKED / LEASED') }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 uppercase tracking-wider text-[10px]">{{ __('Reference') }}</span>
                            <span class="text-gray-300 font-semibold tracking-wider text-[10px]">#ARAIA-{{ strtoupper(substr($unit->tower, 0, 2)) }}-{{ $unit->room_number }}</span>
                        </div>
                    </div>
                    
                    <div class="space-y-3 pt-2">
                        <button @click="showSurveyModal = true" type="button" class="w-full py-3.5 bg-[#E5C158] hover:bg-[#D4AF37] text-black font-semibold text-[10px] uppercase tracking-[0.2em] rounded transition duration-200">
                            {{ __('SCHEDULE PRIVATE VIEWING') }}
                        </button>
                        
                        <button @click="showBookingModal = true" type="button" class="w-full py-3.5 border border-[#C9A84C]/50 hover:bg-[#C9A84C]/10 text-[#C9A84C] font-semibold text-[10px] uppercase tracking-[0.2em] rounded transition duration-200">
                            {{ __('BOOK / RENT UNIT') }}
                        </button>
                    </div>
                    
                </div>
                
                <!-- Box 2: Location Insights -->
                <div class="border border-[#C9A84C]/15 bg-[#121212]/40 p-6 md:p-8 rounded-lg space-y-4">
                    <span class="text-gray-400 text-[9px] font-extrabold tracking-[0.2em] uppercase block">{{ __('LOCATION INSIGHTS') }}</span>
                    
                    <div class="relative rounded overflow-hidden border border-neutral-800 w-full h-36">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.106187243032!2d106.9783331!3d-6.249736500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d0046c1072b%3A0xb92dbd9f5c0bbeaa!2sAraia%20Properti!5e0!3m2!1sen!2sid!4v1780075644393!5m2!1sen!2sid" class="w-full h-full grayscale opacity-80 contrast-[1.2] hover:grayscale-0 hover:opacity-100 transition duration-300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                    <p class="text-[10px] text-gray-400 font-light leading-relaxed">
                        {{ __('Located in the premier Pekayon Jaya district, offering unparalleled convenience and absolute privacy in the heart of Bekasi.') }}
                    </p>
                </div>
                
            </div>
            
        </div>
        
        <!-- Booking Modal -->
        <div x-show="showBookingModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-sm" x-cloak>
            <div class="w-full max-w-md bg-[#121212] border border-[#C9A84C]/25 rounded-lg p-6 md:p-8 space-y-6 shadow-2xl relative" @click.away="showBookingModal = false">
                
                <button @click="showBookingModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-[#C9A84C] text-lg font-bold transition">
                    &times;
                </button>
                
                <div class="relative pb-3">
                    <h3 class="font-luxury text-xl text-[#F3F4F6] font-medium tracking-wide">{{ __('Sewa / Booking Unit') }}</h3>
                    <div class="absolute bottom-0 left-0 w-10 h-0.5 bg-[#C9A84C]"></div>
                </div>
                
                @auth
                    @if($unit->status === 'available')
                        <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                            
                            <p class="text-xs text-gray-400 leading-relaxed font-light">
                                {!! __('Ajukan sewa langsung untuk unit :unit. Admin kami akan melakukan peninjauan kontrak sewa dan menghubungi Anda untuk pembayaran.', ['unit' => '<strong>' . e($unit->name) . '</strong>']) !!}
                            </p>
                            
                            <div class="space-y-1.5">
                                <label for="booking_note_modal" class="text-[9px] text-gray-400 uppercase tracking-widest font-extrabold block">{{ __('Catatan Tambahan (Opsional)') }}</label>
                                <textarea name="note" id="booking_note_modal" rows="3" placeholder="{{ __('Sebutkan tanggal perkiraan mulai sewa atau permintaan khusus...') }}" class="w-full bg-[#1A1A1A] border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded p-3 text-gray-300 placeholder-neutral-600 focus:outline-none transition"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full py-3 bg-[#E5C158] hover:bg-[#D4AF37] text-black font-semibold text-xs uppercase tracking-widest rounded transition duration-200">
                                {{ __('KIRIM PENGAJUAN SEWA') }}
                            </button>
                        </form>
                    @else
                        <div class="text-center py-6 space-y-3">
                            <p class="text-xs text-red-400 font-light">{{ __('Unit saat ini tidak tersedia untuk disewa.') }}</p>
                            <button @click="showBookingModal = false" type="button" class="px-5 py-2.5 bg-neutral-800 hover:bg-neutral-700 text-gray-300 text-xs font-semibold uppercase tracking-wider rounded transition">
                                {{ __('Tutup') }}
                            </button>
                        </div>
                    @endif
                @else
                    <div class="text-center py-6 space-y-4">
                        <p class="text-xs text-red-400 font-light">{{ __('Harap masuk (login) terlebih dahulu untuk mengajukan sewa unit.') }}</p>
                        <div class="flex gap-3 justify-center">
                            <a href="{{ route('login') }}" class="px-5 py-2.5 bg-[#E5C158] text-black text-xs font-semibold uppercase tracking-wider rounded hover:bg-[#D4AF37] transition">
                                {{ __('Login Sekarang') }}
                            </a>
                            <button @click="showBookingModal = false" type="button" class="px-5 py-2.5 bg-neutral-800 text-gray-300 text-xs font-semibold uppercase tracking-wider rounded hover:bg-neutral-700 transition">
                                {{ __('Batal') }}
                            </button>
                        </div>
                    </div>
                @endauth
                
            </div>
        </div>

        <!-- Survey Modal -->
        <div x-show="showSurveyModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-sm" x-cloak>
            <div class="w-full max-w-md bg-[#121212] border border-[#C9A84C]/25 rounded-lg p-6 md:p-8 space-y-6 shadow-2xl relative" @click.away="showSurveyModal = false">
                
                <button @click="showSurveyModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-[#C9A84C] text-lg font-bold transition">
                    &times;
                </button>
                
                <div class="relative pb-3">
                    <h3 class="font-luxury text-xl text-[#F3F4F6] font-medium tracking-wide">{{ __('Jadwalkan Kunjungan') }}</h3>
                    <div class="absolute bottom-0 left-0 w-10 h-0.5 bg-[#C9A84C]"></div>
                </div>
                
                @auth
                    <form action="{{ route('reservation.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                        
                        <p class="text-xs text-gray-400 leading-relaxed font-light">
                            {{ __('Jadwalkan kunjungan atau survei lokasi langsung ke unit. Jadwal Anda akan kami konfirmasi dan diteruskan ke WhatsApp Admin.') }}
                        </p>
                        
                        <div class="space-y-1.5">
                            <label for="preferred_date_modal" class="text-[9px] text-gray-400 uppercase tracking-widest font-extrabold block">{{ __('Tanggal Kunjungan') }}</label>
                            <input type="date" name="preferred_date" id="preferred_date_modal" required min="{{ date('Y-m-d') }}" class="w-full bg-[#1A1A1A] border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded p-3 text-gray-300 focus:outline-none transition">
                        </div>
                        
                        <div class="space-y-1.5">
                            <label for="preferred_time_modal" class="text-[9px] text-gray-400 uppercase tracking-widest font-extrabold block">{{ __('Jam Kunjungan') }}</label>
                            <select name="preferred_time" id="preferred_time_modal" required class="w-full bg-[#1A1A1A] border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded p-3 text-gray-300 focus:outline-none transition">
                                <option value="10:00">10:00 WIB ({{ __('Pagi') }})</option>
                                <option value="12:00">12:00 WIB ({{ __('Siang') }})</option>
                                <option value="14:00">14:00 WIB ({{ __('Siang') }})</option>
                                <option value="16:00">16:00 WIB ({{ __('Sore') }})</option>
                                <option value="18:00">18:00 WIB ({{ __('Malam') }})</option>
                            </select>
                        </div>
                        
                        <div class="space-y-1.5">
                            <label for="reservation_note_modal" class="text-[9px] text-gray-400 uppercase tracking-widest font-extrabold block">{{ __('Catatan Tambahan') }}</label>
                            <textarea name="note" id="reservation_note_modal" rows="2" placeholder="{{ __('Catatan survei...') }}" class="w-full bg-[#1A1A1A] border border-neutral-800 focus:border-[#C9A84C]/60 text-xs rounded p-3 text-gray-300 placeholder-neutral-600 focus:outline-none transition"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full py-3 bg-[#E5C158] hover:bg-[#D4AF37] text-black font-semibold text-xs uppercase tracking-widest rounded transition duration-200">
                            {{ __('JADWALKAN & HUBUNGI WA') }}
                        </button>
                    </form>
                @else
                    <div class="text-center py-6 space-y-4">
                        <p class="text-xs text-red-400 font-light">{{ __('Harap masuk (login) terlebih dahulu untuk membuat jadwal kunjungan.') }}</p>
                        <div class="flex gap-3 justify-center">
                            <a href="{{ route('login') }}" class="px-5 py-2.5 bg-[#E5C158] text-black text-xs font-semibold uppercase tracking-wider rounded hover:bg-[#D4AF37] transition">
                                {{ __('Login Sekarang') }}
                            </a>
                            <button @click="showSurveyModal = false" type="button" class="px-5 py-2.5 bg-neutral-800 text-gray-300 text-xs font-semibold uppercase tracking-wider rounded hover:bg-neutral-700 transition">
                                {{ __('Batal') }}
                            </button>
                        </div>
                    </div>
                @endauth
                
            </div>
        </div>

        <!-- Recommendations Block -->
        @if($recommendations->isNotEmpty())
            <div class="mt-24 pt-16 border-t border-neutral-900 space-y-8">
                <h3 class="font-luxury text-xl font-bold tracking-widest text-[#F3F4F6] flex items-center gap-2">
                    <span class="w-1 h-6 bg-[#C9A84C]"></span> {{ __('CURATED FOR YOU') }}
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recommendations as $rec)
                        <div class="glass-card overflow-hidden hover-lift border border-[#C9A84C]/10 flex flex-col h-full bg-[#121212]/20 rounded-md">
                            <div class="relative aspect-4/3 overflow-hidden bg-neutral-900">
                                <img src="{{ asset($rec->primary_image_path) }}" alt="{{ $rec->name }}" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                                <div class="absolute top-4 left-4 flex gap-2">
                                    <span class="text-[9px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded bg-[#0A0A0A]/95 text-[#C9A84C] border border-[#C9A84C]/25 shadow-md">
                                        {{ $rec->listing_type === 'rent' ? __('SEWA') : __('BELI') }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-5 flex-grow flex flex-col justify-between space-y-4">
                                <div class="space-y-1">
                                    <span class="text-[9px] text-[#C9A84C] uppercase tracking-widest font-extrabold">{{ $rec->tower }} &bull; {{ __('Lantai') }} {{ $rec->floor }}</span>
                                    <h4 class="font-luxury text-lg font-bold text-[#F3F4F6] line-clamp-1 hover:text-[#C9A84C] transition">
                                        <a href="{{ route('properti.show', $rec->id) }}">{{ $rec->name }}</a>
                                    </h4>
                                </div>
                                <div class="flex justify-between items-center text-xs pt-2 border-t border-neutral-800/40">
                                    <span class="text-gray-400 font-semibold">{{ $rec->size_sqm }} m²</span>
                                    <span class="font-bold text-[#C9A84C] font-luxury">{{ $rec->formatted_price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        
    </div>
</section>
@endsection
