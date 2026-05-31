<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', __('Araia Property — Sewa & Jual Apartemen Bekasi'))</title>
        <meta name="description" content="@yield('meta_description', __('Araia Property (CV Pintu Langit Araia) menyediakan sewa dan jual unit apartemen Studio, 1BR, 2BR, 3BR premium di Mall Lagoon Avenue Bekasi.'))">

        <!-- Fonts & CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Alpine JS (for interactivity like mobile menu and modals) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="bg-[#0A0A0A] text-[#F3F4F6] font-sans min-h-screen flex flex-col antialiased selection:bg-[#C9A84C] selection:text-[#0A0A0A]">
        
        <!-- Header Navbar -->
        <header class="sticky top-0 z-50 bg-[#0A0A0A]/90 backdrop-blur-md border-b border-[#C9A84C]/15" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}" class="flex items-center gap-2">
                            <span class="font-luxury text-2xl font-bold tracking-widest text-gold-gradient uppercase">ARAIA PROPERTY</span>
                        </a>
                    </div>
                    
                    <!-- Desktop Menu -->
                    <nav class="hidden md:flex space-x-1 lg:space-x-2 text-xs font-semibold uppercase tracking-wider items-center">
                        <a href="{{ route('home') }}" class="px-3 py-2 text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 {{ Route::is('home') ? 'text-[#C9A84C]' : '' }}">{{ __('Home') }}</a>
                        <a href="{{ route('properti.index') }}" class="px-3 py-2 text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 {{ Route::is('properti.*') ? 'text-[#C9A84C]' : '' }}">{{ __('Properties') }}</a>
                        
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-1 px-3 py-2 text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 focus:outline-none uppercase font-semibold text-xs tracking-wider {{ Route::is('leasing') || Route::is('selling') ? 'text-[#C9A84C]' : '' }}">
                                <span>{{ __('Services') }}</span>
                                <svg class="h-3 w-3 fill-current text-[#C9A84C] transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak class="absolute left-0 mt-2 w-44 rounded-md shadow-2xl bg-[#0A0A0A] border border-[#C9A84C]/30 py-1 z-50"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95">
                                <a href="{{ route('leasing') }}" class="block px-4 py-2.5 text-xs text-[#F3F4F6] hover:bg-[#C9A84C]/10 hover:text-[#C9A84C] transition {{ Route::is('leasing') ? 'text-[#C9A84C] font-bold bg-[#C9A84C]/5' : '' }}">
                                    {{ __('Leasing') }}
                                </a>
                                <a href="{{ route('selling') }}" class="block px-4 py-2.5 text-xs text-[#F3F4F6] hover:bg-[#C9A84C]/10 hover:text-[#C9A84C] transition {{ Route::is('selling') ? 'text-[#C9A84C] font-bold bg-[#C9A84C]/5' : '' }}">
                                    {{ __('Selling') }}
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('gallery') }}" class="px-3 py-2 text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 {{ Route::is('gallery') ? 'text-[#C9A84C]' : '' }}">{{ __('Gallery') }}</a>
                        <a href="{{ route('about') }}" class="px-3 py-2 text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 {{ Route::is('about') ? 'text-[#C9A84C]' : '' }}">{{ __('About Us') }}</a>
                        <a href="{{ route('contact') }}" class="px-3 py-2 text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 {{ Route::is('contact') ? 'text-[#C9A84C]' : '' }}">{{ __('Contact Us') }}</a>
                    </nav>

                    <!-- Desktop Auth Actions & Language Switcher -->
                    <div class="hidden md:flex items-center space-x-3">
                        <!-- Language Switcher -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-1 text-xs font-semibold uppercase tracking-wider text-[#F3F4F6] hover:text-[#C9A84C] transition duration-200 focus:outline-none border border-[#C9A84C]/30 rounded px-2.5 py-1 bg-black/20">
                                <span>{{ strtoupper(app()->getLocale()) }}</span>
                                <svg class="h-3 w-3 fill-current text-[#C9A84C] transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-28 rounded-md shadow-2xl bg-[#0A0A0A] border border-[#C9A84C]/30 py-1 z-50"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95">
                                <a href="{{ route('locale.switch', 'id') }}" class="flex items-center gap-2 px-3 py-1.5 text-xs text-[#F3F4F6] hover:bg-[#C9A84C]/10 hover:text-[#C9A84C] transition {{ app()->getLocale() == 'id' ? 'text-[#C9A84C] font-bold bg-[#C9A84C]/5' : '' }}">
                                    <span class="text-sm">🇮🇩</span> ID
                                </a>
                                <a href="{{ route('locale.switch', 'en') }}" class="flex items-center gap-2 px-3 py-1.5 text-xs text-[#F3F4F6] hover:bg-[#C9A84C]/10 hover:text-[#C9A84C] transition {{ app()->getLocale() == 'en' ? 'text-[#C9A84C] font-bold bg-[#C9A84C]/5' : '' }}">
                                    <span class="text-sm">🇬🇧</span> EN
                                </a>
                            </div>
                        </div>

                        @auth
                            <a href="{{ route('dashboard') }}" class="btn-outline-gold text-xs px-4 py-2 border-[#C9A84C]/50 text-[#C9A84C] hover:bg-[#C9A84C]/10 transition">{{ __('Dashboard') }}</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-xs text-red-400 hover:text-red-300 font-semibold tracking-wider uppercase ml-2 transition">{{ __('Log Out') }}</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-xs text-[#F3F4F6] hover:text-[#C9A84C] transition font-semibold">{{ __('Login') }}</a>
                            <a href="{{ route('register') }}" class="btn-gold text-xs px-4 py-2">{{ __('Register') }}</a>
                        @endauth
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-gray-400 hover:text-white focus:outline-none" aria-label="Toggle Menu">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-t border-[#C9A84C]/15 bg-[#0A0A0A]" @click.away="mobileMenuOpen = false">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-sm font-semibold uppercase tracking-wider">
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-[#F3F4F6] {{ Route::is('home') ? 'text-[#C9A84C]' : '' }}">{{ __('Home') }}</a>
                    <a href="{{ route('properti.index') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-[#F3F4F6] {{ Route::is('properti.*') ? 'text-[#C9A84C]' : '' }}">{{ __('Properties') }}</a>
                    
                    <div x-data="{ open: {{ Route::is('leasing') || Route::is('selling') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex w-full justify-between items-center px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-[#F3F4F6] {{ Route::is('leasing') || Route::is('selling') ? 'text-[#C9A84C]' : '' }}">
                            <span>{{ __('Services') }}</span>
                            <svg class="h-4 w-4 fill-current text-[#C9A84C] transition-transform duration-200" :class="{'rotate-180': open}" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div x-show="open" x-cloak class="pl-4 space-y-1 mt-1">
                            <a href="{{ route('leasing') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-sm text-gray-400 {{ Route::is('leasing') ? 'text-[#C9A84C] font-bold bg-[#C9A84C]/5' : '' }}">{{ __('Leasing') }}</a>
                            <a href="{{ route('selling') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-sm text-gray-400 {{ Route::is('selling') ? 'text-[#C9A84C] font-bold bg-[#C9A84C]/5' : '' }}">{{ __('Selling') }}</a>
                        </div>
                    </div>

                    <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-[#F3F4F6] {{ Route::is('gallery') ? 'text-[#C9A84C]' : '' }}">{{ __('Gallery') }}</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-[#F3F4F6] {{ Route::is('about') ? 'text-[#C9A84C]' : '' }}">{{ __('About Us') }}</a>
                    <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C] text-[#F3F4F6] {{ Route::is('contact') ? 'text-[#C9A84C]' : '' }}">{{ __('Contact Us') }}</a>
                    <hr class="border-[#C9A84C]/15 my-2">
                    <!-- Mobile Language Switcher -->
                    <div class="flex items-center space-x-2 px-3 py-2">
                        <span class="text-xs text-gray-500 uppercase tracking-widest mr-2">Language:</span>
                        <a href="{{ route('locale.switch', 'id') }}" class="px-3 py-1 text-xs border {{ app()->getLocale() == 'id' ? 'border-[#C9A84C] text-[#C9A84C] bg-[#C9A84C]/10 font-bold' : 'border-[#C9A84C]/20 text-[#F3F4F6]' }} rounded">🇮🇩 ID</a>
                        <a href="{{ route('locale.switch', 'en') }}" class="px-3 py-1 text-xs border {{ app()->getLocale() == 'en' ? 'border-[#C9A84C] text-[#C9A84C] bg-[#C9A84C]/10 font-bold' : 'border-[#C9A84C]/20 text-[#F3F4F6]' }} rounded">🇬🇧 EN</a>
                    </div>
                    <hr class="border-[#C9A84C]/15 my-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md bg-[#C9A84C]/10 text-[#C9A84C] hover:bg-[#C9A84C]/20">{{ __('Dashboard') }}</a>
                        <form method="POST" action="{{ route('logout') }}" class="block w-full">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-red-400 hover:bg-[#121212]">{{ __('Log Out') }}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md hover:bg-[#121212] hover:text-[#C9A84C]">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md bg-[#C9A84C] text-[#0A0A0A] font-bold text-center">{{ __('Register') }}</a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Notification Banner -->
        @if(session('success') || session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4" x-data="{ show: true }" x-show="show" x-cloak>
                @if(session('success'))
                    <div class="bg-green-900/60 border border-green-500/30 text-green-200 px-4 py-3 rounded relative flex justify-between items-center">
                        <span>{{ session('success') }}</span>
                        <button @click="show = false" class="text-green-200 hover:text-white">&times;</button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-900/60 border border-red-500/30 text-red-200 px-4 py-3 rounded relative flex justify-between items-center">
                        <span>{{ session('error') }}</span>
                        <button @click="show = false" class="text-red-200 hover:text-white">&times;</button>
                    </div>
                @endif
            </div>
        @endif

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#121212] border-t border-[#C9A84C]/15 pt-16 pb-8 text-gray-400 text-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    
                    <!-- Company Profile -->
                    <div class="space-y-4">
                        <span class="font-luxury text-xl font-bold tracking-widest text-gold-gradient">ARAIA PROPERTY</span>
                        <p class="text-xs leading-relaxed text-gray-500">
                            CV Pintu Langit Araia | Araia Property adalah agen sewa dan jual unit apartemen premium dan nyaman yang berlokasi di Mall Lagoon Avenue Bekasi.
                        </p>
                        <p class="text-xs text-gray-500">
                            <strong>NIB:</strong> 3110220019938
                        </p>
                    </div>
                           <!-- Quick Links -->
                    <div class="space-y-4">
                        <h4 class="text-[#F3F4F6] font-semibold text-xs tracking-wider uppercase">{{ __('Menu Utama') }}</h4>
                        <ul class="space-y-2 text-xs">
                            <li><a href="{{ route('properti.index') }}" class="hover:text-[#C9A84C] transition">{{ __('Daftar Properti') }}</a></li>
                            <li><a href="{{ route('leasing') }}" class="hover:text-[#C9A84C] transition">{{ __('Pengajuan Leasing') }}</a></li>
                            <li><a href="{{ route('selling') }}" class="hover:text-[#C9A84C] transition">{{ __('Titip Jual Unit') }}</a></li>
                            <li><a href="{{ route('gallery') }}" class="hover:text-[#C9A84C] transition">{{ __('Galeri Foto') }}</a></li>
                        </ul>
                    </div>
                    
                    <!-- Corporate info -->
                    <div class="space-y-4">
                        <h4 class="text-[#F3F4F6] font-semibold text-xs tracking-wider uppercase">{{ __('Legalitas') }}</h4>
                        <ul class="space-y-2 text-xs">
                            <li><a href="{{ route('legalitas') }}" class="hover:text-[#C9A84C] transition">{{ __('Dokumen Legalitas') }}</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-[#C9A84C] transition">{{ __('Profil Perusahaan') }}</a></li>
                            <li>NIB: 3110220019938</li>
                            <li>CV Pintu Langit Araia</li>
                        </ul>
                    </div>
                    
                    <!-- Contact / Map Link -->
                    <div class="space-y-4">
                        <h4 class="text-[#F3F4F6] font-semibold text-xs tracking-wider uppercase">{{ __('Hubungi Kami') }}</h4>
                        <p class="text-xs leading-relaxed text-gray-500">
                            Mall Lagoon Avenue, Ground Floor unit G#59,<br>
                            Pekayon Jaya, Bekasi Selatan, Jawa Barat.
                        </p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6281234567890')) }}" target="_blank" class="inline-flex items-center gap-2 text-xs text-[#C9A84C] hover:underline">
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.45 4.817 1.451 5.393 0 9.778-4.383 9.781-9.774 0-2.612-1.018-5.068-2.868-6.918C16.48 2.062 14.021 1.04 11.411 1.04 6.019 1.04 1.636 5.425 1.633 10.817c-.001 1.673.438 3.307 1.272 4.773l-.979 3.578 3.731-.979z"/></svg>
                            {{ __('WhatsApp Admin') }}
                        </a>
                    </div>

                </div>
                
                <hr class="border-[#C9A84C]/15 my-8">
                
                <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-gray-600 gap-4">
                    <p>&copy; {{ date('Y') }} Araia Property. All Rights Reserved. CV Pintu Langit Araia.</p>
                    <p>Designed with Luxury Palette (Gold, Black & Silver)</p>
                </div>
            </div>
        </footer>
        
    </body>
</html>
