<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)->create();
        Product::factory()->create(['price' => 500]);
        Product::factory()->create(['price' => 700]);
        Product::factory()->create(['price' => 900]);
        Product::factory()->create(['price' => 1000]);
        Product::factory()->create(['price' => 1200]);
    }
}
