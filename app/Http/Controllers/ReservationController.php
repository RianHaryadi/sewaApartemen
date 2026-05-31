<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Setting;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Store a reservation (survey/visit) request and redirect to WhatsApp.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required|string',
            'note' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $unit = Unit::findOrFail($request->unit_id);

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'status' => 'pending',
            'note' => $request->note,
        ]);

        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');

        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $name = $user->name;
        $unitName = $unit->name;
        $dateFormatted = date('d-m-Y', strtotime($request->preferred_date)) . ' jam ' . $request->preferred_time;

        $message = "Halo Admin Araia, saya {$name} ingin reservasi kunjungan unit {$unitName} pada {$dateFormatted}.";
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
}
