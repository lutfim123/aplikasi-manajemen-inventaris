<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aksesori = Category::where('name', 'Aksesori')->first();
        $perangkat = Category::where('name', 'Perangkat Komputer')->first();
        $penyimpanan = Category::where('name', 'Penyimpanan')->first();

        $items = [
        [
            'name' => 'Keyboard',
            'category_id' => $aksesori ? $aksesori->id : 1,
            'price' => 150000,
            'stock' => 10,
        ], 
        [
            'name' => 'Mouse',
            'category_id' => $aksesori ? $aksesori->id : 1,
            'price' => 75000,
            'stock' => 20,
        ],
        [
            'name' => 'Monitor',
            'category_id' => $perangkat ? $perangkat->id : 2,
            'price' => 1500000,
            'stock' => 5,
        ],
        [
            'name' => 'Headset',
            'category_id' => $aksesori ? $aksesori->id : 1,
            'price' => 250000,
            'stock' => 8,
        ],
        [
            'name' => 'Flashdisk',
            'category_id' => $penyimpanan ? $penyimpanan->id : 3,
            'price' => 85000,
            'stock' => 15,
        ],
    ];

    foreach ($items as $item) {
        Item::updateOrCreate(
            ['name' => $item['name']], $item);
    }
    }

    
}
