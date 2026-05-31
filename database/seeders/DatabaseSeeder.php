<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Gallery;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RolesAndPermissionsSeeder::class);

        $this->call(SettingSeeder::class);

        $this->call(UnitSeeder::class);

        $admin = User::firstOrCreate(
            ['email' => 'admin@araia.id'],
            [
                'name' => 'Admin Araia',
                'phone' => '6281214227283',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ]
        );
        $admin->syncRoles(['admin']);

        $user = User::firstOrCreate(
            ['email' => 'user@araia.id'],
            [
                'name' => 'John Doe User',
                'phone' => '628111222333',
                'role' => 'user',
                'password' => bcrypt('password'),
            ]
        );
        $user->syncRoles(['user']);

        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Gallery::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $galleries = [

            [
                'title' => 'Studio Room Interior Premium',
                'image_path' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Master Bedroom dengan Pemandangan Kota',
                'image_path' => 'https://images.unsplash.com/photo-1540518614846-7eded433c457?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Ruang Tamu Mewah Ruby Tower',
                'image_path' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Dapur Kering Modern Minimalis',
                'image_path' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Kamar Mandi Elegan dengan Bathtub',
                'image_path' => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Desain Kamar Studio Compact & Cozy',
                'image_path' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Living Room dengan Nuansa Hangat',
                'image_path' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Kamar Tidur Utama Modern',
                'image_path' => 'https://images.unsplash.com/photo-1584622781564-1d987f7333c1?w=1200&auto=format&fit=crop&q=80',
                'category' => 'unit',
                'order' => 8,
                'is_active' => true,
            ],

            [
                'title' => 'Pusat Kebugaran & Gym Premium',
                'image_path' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'title' => 'Kolam Renang Infinity Outdoor',
                'image_path' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'title' => 'Layanan Spa & Pijat Relaksasi',
                'image_path' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'title' => 'Rooftop Lounge & Cafe Area',
                'image_path' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 12,
                'is_active' => true,
            ],
            [
                'title' => 'Ruang Rapat & Area Kerja Bersama',
                'image_path' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 13,
                'is_active' => true,
            ],
            [
                'title' => 'Area Bermain Anak / Playground',
                'image_path' => 'https://images.unsplash.com/photo-1596464716127-f2a82984de30?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 14,
                'is_active' => true,
            ],
            [
                'title' => 'Taman Asri & Sky Garden',
                'image_path' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 15,
                'is_active' => true,
            ],
            [
                'title' => 'Ruang Sauna Hangat & Relaksasi',
                'image_path' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 16,
                'is_active' => true,
            ],
            [
                'title' => 'Bioskop Mini & Ruang Teater Privat',
                'image_path' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 17,
                'is_active' => true,
            ],
            [
                'title' => 'Lapangan Tenis Kaca Outdoor',
                'image_path' => 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 18,
                'is_active' => true,
            ],
            [
                'title' => 'Perpustakaan & Ruang Baca Tenang',
                'image_path' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 19,
                'is_active' => true,
            ],
            [
                'title' => 'Ruang Bermain Anak Indoor / Kids Club',
                'image_path' => 'https://images.unsplash.com/photo-1603006905003-be475563bc59?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 20,
                'is_active' => true,
            ],
            [
                'title' => 'Lintasan Lari / Jogging Track Asri',
                'image_path' => 'https://images.unsplash.com/photo-1502224562085-639556652f33?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 21,
                'is_active' => true,
            ],
            [
                'title' => 'Lobi Penerima Tamu / Reception Desk',
                'image_path' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=1200&auto=format&fit=crop&q=80',
                'category' => 'facility',
                'order' => 22,
                'is_active' => true,
            ],

            [
                'title' => 'Fasad Modern Gedung Apartemen',
                'image_path' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 23,
                'is_active' => true,
            ],
            [
                'title' => 'Pemandangan Malam Gedung yang Megah',
                'image_path' => 'https://images.unsplash.com/photo-1582407947304-fd86f028f716?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 24,
                'is_active' => true,
            ],
            [
                'title' => 'Lobi Utama dengan Desain Elegan',
                'image_path' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 25,
                'is_active' => true,
            ],
            [
                'title' => 'Pemandangan Senja dari Atap Gedung',
                'image_path' => 'https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 26,
                'is_active' => true,
            ],
            [
                'title' => 'Area Parkir Basement yang Luas & Aman',
                'image_path' => 'https://images.unsplash.com/photo-1506521781263-d8422e82f27a?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 27,
                'is_active' => true,
            ],
            [
                'title' => 'Pemandangan Luas Kota Bekasi dari Balkon',
                'image_path' => 'https://images.unsplash.com/photo-1560185007-c5ca9d2c014d?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 28,
                'is_active' => true,
            ],
            [
                'title' => 'Atrium Tengah Gedung Pencakar Langit',
                'image_path' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 29,
                'is_active' => true,
            ],
            [
                'title' => 'Pos Pengamanan & Gerbang Utama 24 Jam',
                'image_path' => 'https://images.unsplash.com/photo-1558036117-15d82a90b9b1?w=1200&auto=format&fit=crop&q=80',
                'category' => 'exterior',
                'order' => 30,
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $g) {
            Gallery::create($g);
        }
    }
}
