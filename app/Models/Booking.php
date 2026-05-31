<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'unit_id',
        'status',
        'note',
        'admin_note',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function (Booking $booking) {
            if ($booking->wasChanged('status') || $booking->wasRecentlyCreated) {
                if ($booking->status === 'approved') {
                    $unit = $booking->unit;
                    if ($unit) {
                        $unitStatus = $unit->listing_type === 'sell' ? 'sold' : 'booked';
                        $unit->update(['status' => $unitStatus]);
                    }

                    self::where('unit_id', $booking->unit_id)
                        ->where('id', '!=', $booking->id)
                        ->where('status', 'pending')
                        ->update([
                            'status' => 'rejected',
                            'admin_note' => 'Unit sudah disetujui untuk booking lain.'
                        ]);
                } elseif (!$booking->wasRecentlyCreated && $booking->getOriginal('status') === 'approved' && $booking->status !== 'approved') {
                    $unit = $booking->unit;
                    if ($unit) {
                        $unit->update(['status' => 'available']);
                    }
                }
            }
        });

        static::deleted(function (Booking $booking) {
            if ($booking->status === 'approved') {
                $unit = $booking->unit;
                if ($unit) {
                    $unit->update(['status' => 'available']);
                }
            }
        });
    }

    /**
     * Get the user who made the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the unit that is booked.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
