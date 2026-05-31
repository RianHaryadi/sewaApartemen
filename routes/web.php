<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/legalitas', [HomeController::class, 'legalitas'])->name('legalitas');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/properti', [PropertyController::class, 'index'])->name('properti.index');
Route::get('/properti/{id}', [PropertyController::class, 'show'])->name('properti.show');

Route::get('/leasing', function() {
    $settings = [
        'company_name' => Setting::get('company_name', 'CV Pintu Langit Araia'),
        'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
    ];
    return view('leasing', compact('settings'));
})->name('leasing');
Route::post('/leasing', [ContactController::class, 'submitLeasing'])->name('leasing.submit');

Route::get('/selling', function() {
    $settings = [
        'company_name' => Setting::get('company_name', 'CV Pintu Langit Araia'),
        'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
    ];
    return view('selling', compact('settings'));
})->name('selling');
Route::post('/selling', [ContactController::class, 'submitSelling'])->name('selling.submit');

Route::get('/contact', function() {
    $settings = [
        'company_name' => Setting::get('company_name', 'CV Pintu Langit Araia'),
        'company_address' => Setting::get('company_address', 'Mall Lagoon Avenue, Bekasi'),
        'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
    ];
    return view('contact', compact('settings'));
})->name('contact');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');

Route::get('/dashboard', function () {
    $user = auth()->user();
    $bookings = \App\Models\Booking::with('unit')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    $reservations = \App\Models\Reservation::with('unit')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    return view('dashboard', compact('bookings', 'reservations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservation.store');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('locale.switch');

require __DIR__.'/auth.php';
