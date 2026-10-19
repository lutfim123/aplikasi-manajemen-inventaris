<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Elektronik'],
            ['id' => 2, 'name' => 'Perangkat Komputer'],
            ['id' => 3, 'name' => 'Penyimpanan'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['id' => $category['id']], ['name' => $category['name']]);
        }
    }
}
