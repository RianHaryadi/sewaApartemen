<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings for the logged-in user.
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::with('unit')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.bookings', compact('bookings'));
    }

    /**
     * Store a booking request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'note' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $unit = Unit::findOrFail($request->unit_id);

        if ($unit->status !== 'available') {
            return redirect()->back()->with('error', 'Unit ini sedang tidak tersedia untuk di-booking.');
        }

        $activeBooking = Booking::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($activeBooking) {
            return redirect()->back()->with('error', 'Anda memiliki booking aktif yang sedang diproses. Batas maksimal adalah 1 booking aktif per user.');
        }

        Booking::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'note' => $request->note,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Permintaan booking Anda berhasil diajukan dan sedang menunggu konfirmasi admin.');
    }
}
