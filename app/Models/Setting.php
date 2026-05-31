<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Get a setting value by key.
     */
    public static function get(string $key, $default = null): ?string
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            return $setting->value;
        }

        if ($key === 'whatsapp_number') {
            return env('WHATSAPP_NUMBER', $default ?? '6281234567890');
        }

        return $default;
    }

    /**
     * Set a setting value.
     */
    public static function set(string $key, ?string $value): self
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
