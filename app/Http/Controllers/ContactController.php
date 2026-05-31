<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\ContactLead;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Submit contact form.
     */
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        $subjectText = $request->subject ?? 'General Inquiry';
        $fullMessage = "Subject: " . $subjectText . "\n\n" . $request->message;

        ContactLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $fullMessage,
            'type' => 'contact',
        ]);

        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $msg = "Halo Admin Araia, saya {$request->name} ingin bertanya mengenai {$subjectText}:\n\n{$request->message}";
        $url = "https://wa.me/{$whatsappNumber}?text=" . urlencode($msg);

        return redirect()->away($url);
    }

    /**
     * Submit leasing request.
     */
    public function submitLeasing(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'unit_type' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        ContactLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => "Tipe Unit: {$request->unit_type}. Catatan: {$request->message}",
            'type' => 'leasing',
        ]);

        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $msg = "Halo Admin Araia, saya {$request->name} ingin mengajukan leasing unit {$request->unit_type}.";
        $url = "https://wa.me/{$whatsappNumber}?text=" . urlencode($msg);

        return redirect()->away($url);
    }

    /**
     * Submit selling request.
     */
    public function submitSelling(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        ContactLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'type' => 'selling',
        ]);

        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $msg = "Halo Admin Araia, saya {$request->name} ingin mengetahui informasi unit yang dijual.";
        $url = "https://wa.me/{$whatsappNumber}?text=" . urlencode($msg);

        return redirect()->away($url);
    }
}
