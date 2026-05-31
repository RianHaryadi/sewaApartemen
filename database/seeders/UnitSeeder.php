<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\UnitImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        UnitImage::truncate();
        Unit::truncate();
        Schema::enableForeignKeyConstraints();

        $unitsData = [
            [
                'name' => 'Signature Penthouse Suite RT 2501',
                'type' => '3br',
                'tower' => 'Ruby Tower',
                'floor' => '25',
                'room_number' => 'RT 2501',
                'description' => 'Apartemen Penthouse 3 Kamar Tidur termewah dengan pemandangan 360 derajat kota Bekasi. Dilengkapi furnitur mewah bertema marmer hitam, ruang tamu super luas, dapur kering modern dengan peralatan premium, AC sentral, dan balkon pribadi yang besar. Unit ini memiliki akses eksklusif langsung ke lift VIP dan fasilitas kebugaran premium di lantai atas.',
                'size_sqm' => 120,
                'price' => 15000000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => true,
            ],
            [
                'name' => 'Studio Room Cozy ENS 1002',
                'type' => 'studio',
                'tower' => 'Emerald North',
                'floor' => 'Suite 10',
                'room_number' => 'ENS 1002',
                'description' => 'Nikmati kenyamanan studio apartment dengan desain compact, fully furnished, cozy atmosphere, dan akses langsung ke Mall Lagoon Avenue Bekasi.',
                'size_sqm' => 28,
                'price' => 3500000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => true,
            ],
            [
                'name' => 'Luxury One Bedroom EN 1205',
                'type' => '1br',
                'tower' => 'Emerald North',
                'floor' => '12',
                'room_number' => 'EN 1205',
                'description' => 'Apartemen 1 Bedroom mewah dengan ruang tamu terpisah, tempat tidur nyaman, perlengkapan dapur lengkap, cocok untuk eksekutif muda.',
                'size_sqm' => 42,
                'price' => 5000000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => true,
            ],
            [
                'name' => 'Exclusive Two Bedroom Suite ENS 1010',
                'type' => '2br',
                'tower' => 'Emerald North',
                'floor' => 'Suite 10',
                'room_number' => 'ENS 1010',
                'description' => 'Unit 2 Bedroom eksklusif dengan luas 65m², pemandangan kota Bekasi yang indah, fully furnished, interior bertema emas dan hitam yang mewah.',
                'size_sqm' => 65,
                'price' => 7000000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => true,
            ],
            [
                'name' => 'Premium Three Bedroom ES 1508',
                'type' => '3br',
                'tower' => 'Emerald South',
                'floor' => '15',
                'room_number' => 'ES 1508',
                'description' => 'Unit 3 Bedroom premium dengan ruang tamu luas, kamar mandi utama mewah, pemandangan luar biasa, dan furniture kelas atas. Pilihan terbaik untuk keluarga.',
                'size_sqm' => 98,
                'price' => 950000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => true,
            ],
            [
                'name' => 'Studio Room City View EN 0812',
                'type' => 'studio',
                'tower' => 'Emerald North',
                'floor' => '08',
                'room_number' => 'EN 0812',
                'description' => 'Apartemen tipe studio praktis dengan pemandangan kota Bekasi, berlokasi strategis dekat lif, fully furnished dengan AC dan water heater.',
                'size_sqm' => 28,
                'price' => 3200000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Cosy 1BR Lagoon View ES 1104',
                'type' => '1br',
                'tower' => 'Emerald South',
                'floor' => '11',
                'room_number' => 'ES 1104',
                'description' => 'Tipe 1BR dijual murah di tower Emerald South. View danau (lagoon) langsung, sudah serah terima, kondisi siap huni, full furnish berkualitas.',
                'size_sqm' => 40,
                'price' => 580000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Modern 2BR Executive ES 1406',
                'type' => '2br',
                'tower' => 'Emerald South',
                'floor' => '14',
                'room_number' => 'ES 1406',
                'description' => 'Sewa bulanan/tahunan apartemen 2 kamar tidur di Tower Emerald South. Kamar tidur utama yang luas, balkon menghadap kolam renang, fully furnished modern.',
                'size_sqm' => 60,
                'price' => 6500000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Studio Minimalis Premium ST 0503',
                'type' => 'studio',
                'tower' => 'Sapphire Tower',
                'floor' => '05',
                'room_number' => 'ST 0503',
                'description' => 'Sewa studio minimalis modern di Tower Sapphire. Fully furnished, sangat bersih, sudah termasuk kulkas, TV, dispenser air, siap langsung ditempati.',
                'size_sqm' => 25,
                'price' => 3000000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Chic 1BR Executive Loft ST 0907',
                'type' => '1br',
                'tower' => 'Sapphire Tower',
                'floor' => '09',
                'room_number' => 'ST 0907',
                'description' => 'Apartemen 1 kamar bergaya loft modern di Tower Sapphire. Desain interior bernuansa hangat dengan pencahayaan ambient LED, tempat tidur king size, meja kerja, siap huni.',
                'size_sqm' => 38,
                'price' => 4500000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Grand Family Suite 3BR RT 1801',
                'type' => '3br',
                'tower' => 'Ruby Tower',
                'floor' => '18',
                'room_number' => 'RT 1801',
                'description' => 'Kesempatan memiliki unit 3 kamar tidur mewah di Ruby Tower. Sangat luas, terawat baik, furnished lengkap berkualitas, memiliki balkon menghadap danau Mall Lagoon Avenue.',
                'size_sqm' => 92,
                'price' => 1200000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Studio Cozy Corner View ST 1215',
                'type' => 'studio',
                'tower' => 'Sapphire Tower',
                'floor' => '12',
                'room_number' => 'ST 1215',
                'description' => 'Studio nyaman posisi sudut (corner) di Tower Sapphire. Menawarkan privasi ekstra dan pemandangan luar yang luas, fully furnished berkelas minimalis modern.',
                'size_sqm' => 28,
                'price' => 3300000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Elegant 2BR Pool View RT 1022',
                'type' => '2br',
                'tower' => 'Ruby Tower',
                'floor' => '10',
                'room_number' => 'RT 1022',
                'description' => 'Sewa unit 2 Bedroom elegan dengan view kolam renang langsung dari balkon. Interior rapi dengan finishing kayu mewah, dapur luas, siap serah terima.',
                'size_sqm' => 58,
                'price' => 6800000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Modern Studio Furnished ES 0311',
                'type' => 'studio',
                'tower' => 'Emerald South',
                'floor' => '03',
                'room_number' => 'ES 0311',
                'description' => 'Dijual unit studio fully furnished di tower Emerald South. Sangat terawat, furnitur fungsional hemat ruang, sangat berpotensi disewakan kembali untuk investasi pasif.',
                'size_sqm' => 26,
                'price' => 420000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Spacious 1BR Business Suite EN 1515',
                'type' => '1br',
                'tower' => 'Emerald North',
                'floor' => '15',
                'room_number' => 'EN 1515',
                'description' => 'Sewa bulanan 1BR luas untuk pebisnis/eksekutif. Dilengkapi dengan meja kerja yang nyaman, wifi siap pasang, kasur berkualitas tinggi, dan sofa santai mewah.',
                'size_sqm' => 45,
                'price' => 5500000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Duplex Luxury 2BR RT 2004',
                'type' => '2br',
                'tower' => 'Ruby Tower',
                'floor' => '20',
                'room_number' => 'RT 2004',
                'description' => 'Unit duplex dua lantai mewah di Ruby Tower yang jarang ada. Memberikan suasana tinggal seperti di rumah tapak dengan privasi tinggi, furnished mewah premium, desain interior modern.',
                'size_sqm' => 72,
                'price' => 1450000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Minimalist Studio High Floor EN 1809',
                'type' => 'studio',
                'tower' => 'Emerald North',
                'floor' => '18',
                'room_number' => 'EN 1809',
                'description' => 'Unit studio di lantai tinggi Tower Emerald North. Menawarkan udara segar, ketenangan bebas bising jalanan, dan view menakjubkan di malam hari. Lengkap dengan kompor & kulkas.',
                'size_sqm' => 28,
                'price' => 3600000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Comfortable 1BR Garden View ES 0612',
                'type' => '1br',
                'tower' => 'Emerald South',
                'floor' => '06',
                'room_number' => 'ES 0612',
                'description' => 'Sewa apartemen 1 Bedroom menghadap ke area taman hijau yang asri dan menenangkan. Dilengkapi balkon, smart TV, pemanas air kamar mandi, kulkas dua pintu.',
                'size_sqm' => 42,
                'price' => 4800000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Luxury 3BR Family Residence RT 1402',
                'type' => '3br',
                'tower' => 'Ruby Tower',
                'floor' => '14',
                'room_number' => 'RT 1402',
                'description' => 'Hunian keluarga 3 kamar tidur eksklusif di Ruby Tower. Area makan terpisah, ruang keluarga luas, 2 kamar mandi, area cuci, fully furnished eksklusif bernuansa hitam-gold.',
                'size_sqm' => 105,
                'price' => 11000000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Cozy Studio Pocket Friendly ES 0202',
                'type' => 'studio',
                'tower' => 'Emerald South',
                'floor' => '02',
                'room_number' => 'ES 0202',
                'description' => 'Studio terjangkau di lantai rendah tower Emerald South. Sangat mudah diakses tanpa harus mengantre lift lama, fully furnished, kasur nyaman, sangat bersih.',
                'size_sqm' => 24,
                'price' => 2800000.00,
                'listing_type' => 'rent',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Exclusive 1BR Executive ST 1111',
                'type' => '1br',
                'tower' => 'Sapphire Tower',
                'floor' => '11',
                'room_number' => 'ST 1111',
                'description' => 'Dijual cepat unit 1BR eksklusif tipe eksekutif di Sapphire Tower. Kondisi interior sangat mewah, full wallpaper, kitchen set modis dengan cooker hood, siap huni langsung.',
                'size_sqm' => 40,
                'price' => 620000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => false,
            ],
            [
                'name' => 'Classic 2BR Heritage Design RT 0808',
                'type' => '2br',
                'tower' => 'Ruby Tower',
                'floor' => '08',
                'room_number' => 'RT 0808',
                'description' => 'Unit 2 Kamar Tidur berdesain klasik modern di Ruby Tower. Furnitur kayu jati berkualitas tinggi, suasana nyaman seperti di rumah tapak, sangat strategis dekat area mall.',
                'size_sqm' => 64,
                'price' => 890000000.00,
                'listing_type' => 'sell',
                'status' => 'available',
                'is_featured' => false,
            ]
        ];

        
        $livingRooms = [
            'photo-1502672260266-1c1ef2d93688', 'photo-1600210492486-724fe5c67fb0', 'photo-1616486338812-3dadae4b4ace', 'photo-1586023492125-27b2c045efd7',
            'photo-1615529182904-14819c35db37', 'photo-1600585154526-990dced4db0d', 'photo-1615876234886-fd9a39fda97f', 'photo-1616046229478-9901c5536a45',
            'photo-1600607687939-ce8a6c25118c', 'photo-1600566752355-35792bedcfea', 'photo-1600210491892-03d54c0aaf87', 'photo-1513694203232-719a280e022f',
            'photo-1484154218962-a197022b5858', 'photo-1507089947368-19c1da9775ae', 'photo-1618219908412-a29a1bb7b86e', 'photo-1600566753190-17f0baa2a6c3',
            'photo-1618221195710-dd6b41faaea6', 'photo-1583847268964-b28dc8f51f92', 'photo-1616486029423-aaa4789e8c9a', 'photo-1585412727339-54e4bae3bbf9',
            'photo-1560448204-e02f11c3d0e2', 'photo-1582719478250-c89cae4dc85b'
        ];

        $bedrooms = [
            'photo-1505691938895-1758d7feb511', 'photo-1540518614846-7eded433c457', 'photo-1560185007-c5ca9d2c014d', 'photo-1505693416388-ac5ce068fe85',
            'photo-1590490360182-c33d57733427', 'photo-1595428774223-ef52624120d2', 'photo-1598928506311-c55ded91a20c', 'photo-1616594039964-ae9021a400a0',
            'photo-1566665797739-1674de7a421a', 'photo-1615874959474-d609969a20ed', 'photo-1584622781564-1d987f7333c1', 'photo-1618220179428-22790b461013',
            'photo-1595526114035-0d45ed16cfbf', 'photo-1560448204-e02f11c3d0e2', 'photo-1598928636135-d146006ff4be', 'photo-1590490360182-c33d57733427',
            'photo-1615529162924-f8605388461d', 'photo-1583847268964-b28dc8f51f92', 'photo-1566665797739-1674de7a421a', 'photo-1598928506311-c55ded91a20c',
            'photo-1616594039964-ae9021a400a0', 'photo-1615874959474-d609969a20ed'
        ];

        $kitchens = [
            'photo-1556911220-e15b29be8c8f', 'photo-1600585154340-be6161a56a0c', 'photo-1600566752355-35792bedcfea', 'photo-1565183997392-2f6f122e5912',
            'photo-1556911220-e15b29be8c8f', 'photo-1564013799919-ab600027ffc6', 'photo-1600573472591-ee6b68d14c68', 'photo-1600585154526-990dced4db0d',
            'photo-1600607687920-4e2a09cf159d', 'photo-1507089947368-19c1da9775ae', 'photo-1522050212171-61b01dd24579', 'photo-1556912172-45b7abe8b7e1',
            'photo-1556912172-45b7abe8b7e1', 'photo-1618221381711-42ca8ab6e908', 'photo-1618219908412-a29a1bb7b86e', 'photo-1600607687939-ce8a6c25118c',
            'photo-1600566752355-35792bedcfea', 'photo-1600585154526-990dced4db0d', 'photo-1556912172-45b7abe8b7e1', 'photo-1600585154340-be6161a56a0c',
            'photo-1600566752355-35792bedcfea', 'photo-1556912172-45b7abe8b7e1'
        ];

        $bathrooms = [
            'photo-1552321554-5fefe8c9ef14', 'photo-1584622650111-993a426fbf0a', 'photo-1600566753376-12c8ab7fb75b', 'photo-1584622781564-1d987f7333c1',
            'photo-1584622650111-993a426fbf0a', 'photo-1604014237800-1c9102c219da', 'photo-1618219908412-a29a1bb7b86e', 'photo-1600566753376-12c8ab7fb75b',
            'photo-1584622650111-993a426fbf0a', 'photo-1552321554-5fefe8c9ef14', 'photo-1604014237800-1c9102c219da', 'photo-1584622650111-993a426fbf0a',
            'photo-1584622781564-1d987f7333c1', 'photo-1552321554-5fefe8c9ef14', 'photo-1600566753376-12c8ab7fb75b', 'photo-1584622650111-993a426fbf0a',
            'photo-1584622650111-993a426fbf0a', 'photo-1600566753376-12c8ab7fb75b', 'photo-1552321554-5fefe8c9ef14', 'photo-1584622650111-993a426fbf0a',
            'photo-1604014237800-1c9102c219da', 'photo-1552321554-5fefe8c9ef14'
        ];

        $balconies = [
            'photo-1512917774080-9991f1c4c750', 'photo-1600596542815-ffad4c1539a9', 'photo-1600607687939-ce8a6c25118c', 'photo-1600566753190-17f0baa2a6c3',
            'photo-1580587771525-78b9dba3b914', 'photo-1600047509807-ba8f99d2cdde', 'photo-1600585154340-be6161a56a0c', 'photo-1512917774080-9991f1c4c750',
            'photo-1600596542815-ffad4c1539a9', 'photo-1600607687939-ce8a6c25118c', 'photo-1600566753190-17f0baa2a6c3', 'photo-1580587771525-78b9dba3b914',
            'photo-1600047509807-ba8f99d2cdde', 'photo-1512917774080-9991f1c4c750', 'photo-1600596542815-ffad4c1539a9', 'photo-1600607687939-ce8a6c25118c',
            'photo-1600566753190-17f0baa2a6c3', 'photo-1580587771525-78b9dba3b914', 'photo-1600047509807-ba8f99d2cdde', 'photo-1512917774080-9991f1c4c750',
            'photo-1600596542815-ffad4c1539a9', 'photo-1600607687939-ce8a6c25118c'
        ];

        $lobbies = [
            'photo-1600585154340-be6161a56a0c', 'photo-1560448204-e02f11c3d0e2', 'photo-1600573472591-ee6b68d14c68', 'photo-1600566752355-35792bedcfea',
            'photo-1600566753376-12c8ab7fb75b', 'photo-1600585154340-be6161a56a0c', 'photo-1560448204-e02f11c3d0e2', 'photo-1600573472591-ee6b68d14c68',
            'photo-1600566752355-35792bedcfea', 'photo-1600566753376-12c8ab7fb75b', 'photo-1600585154340-be6161a56a0c', 'photo-1560448204-e02f11c3d0e2',
            'photo-1600573472591-ee6b68d14c68', 'photo-1600566752355-35792bedcfea', 'photo-1600566753376-12c8ab7fb75b', 'photo-1600585154340-be6161a56a0c',
            'photo-1560448204-e02f11c3d0e2', 'photo-1600573472591-ee6b68d14c68', 'photo-1600566752355-35792bedcfea', 'photo-1600566753376-12c8ab7fb75b',
            'photo-1600585154340-be6161a56a0c', 'photo-1560448204-e02f11c3d0e2'
        ];

        foreach ($unitsData as $key => $unitData) {
            $createdUnit = Unit::create($unitData);

            $unitImages = [
                "https://images.unsplash.com/" . $livingRooms[$key] . "?w=1200&auto=format&fit=crop&q=80",
                "https://images.unsplash.com/" . $bedrooms[$key] . "?w=1200&auto=format&fit=crop&q=80",
                "https://images.unsplash.com/" . $kitchens[$key] . "?w=1200&auto=format&fit=crop&q=80",
                "https://images.unsplash.com/" . $bathrooms[$key] . "?w=1200&auto=format&fit=crop&q=80",
                "https://images.unsplash.com/" . $balconies[$key] . "?w=1200&auto=format&fit=crop&q=80",
                "https://images.unsplash.com/" . $lobbies[$key] . "?w=1200&auto=format&fit=crop&q=80"
            ];

            foreach ($unitImages as $index => $imageUrl) {
                UnitImage::create([
                    'unit_id' => $createdUnit->id,
                    'image_path' => $imageUrl,
                    'is_primary' => ($index === 0),
                    'order' => $index
                ]);
            }
        }
    }
}
