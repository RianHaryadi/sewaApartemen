<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'tower',
        'floor',
        'room_number',
        'description',
        'size_sqm',
        'price',
        'listing_type',
        'status',
        'is_featured',
    ];

    /**
     * Get all images for the unit.
     */
    public function images(): HasMany
    {
        return $this->hasMany(UnitImage::class)->orderBy('order');
    }

    /**
     * Get the primary image of the unit.
     */
    public function primaryImage(): HasOne
    {
        return $this->hasOne(UnitImage::class)->where('is_primary', true);
    }

    /**
     * Get the primary image path or a default placeholder.
     */
public function getPrimaryImagePathAttribute()
{
    $primary = $this->primaryImage;
    $path = $primary ? $primary->image_path : ($this->images()->first()?->image_path ?? 'images/default-unit.jpg');

    // Kalau sudah full URL (Unsplash dll), return langsung
    if (str_starts_with($path, 'http')) {
        return $path;
    }

    // Kalau path lokal, tambahkan storage/
    return asset('storage/' . $path);
}

    /**
     * Get the bookings for the unit.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the reservations for the unit.
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the formatted price in Indonesian style.
     */
    public function getFormattedPriceAttribute(): string
    {
        $price = $this->price;
        
        if ($price >= 1000000000) {
            $formatted = $price / 1000000000;
            $formattedString = ($formatted == (int)$formatted) 
                ? number_format($formatted, 0, ',', '.') 
                : rtrim(rtrim(number_format($formatted, 1, ',', '.'), '0'), ',');
            $priceStr = 'Rp ' . $formattedString . ' Miliar';
        } elseif ($price >= 1000000) {
            $formatted = $price / 1000000;
            $formattedString = ($formatted == (int)$formatted) 
                ? number_format($formatted, 0, ',', '.') 
                : rtrim(rtrim(number_format($formatted, 1, ',', '.'), '0'), ',');
            $priceStr = 'Rp ' . $formattedString . ' Juta';
        } else {
            $priceStr = 'Rp ' . number_format($price, 0, ',', '.');
        }

        if ($this->listing_type === 'rent') {
            $priceStr .= ' / bln';
        }

        return $priceStr;
    }
}
