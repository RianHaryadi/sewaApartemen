<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'whatsapp_number' => '6281214227283',
            'company_name' => 'CV Pintu Langit Araia',
            'company_address' => 'Mall Lagoon Avenue, Ground Floor unit G#59, Pekayon Jaya, Bekasi Selatan, Jawa Barat',
            'company_nib' => '3110220019938',
            'hero_title' => 'Apartemen Premium & Cozy di Bekasi',
            'hero_subtitle' => 'Araia Property menyediakan pilihan sewa & beli unit apartemen terbaik dengan akses langsung ke Mall Lagoon Avenue.',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
