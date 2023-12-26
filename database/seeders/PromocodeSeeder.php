<?php

namespace Database\Seeders;

use App\Models\Promocode;
use Illuminate\Database\Seeder;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promocode::create(['code' => '10%OFF', 'discount' => 10]);
        Promocode::create(['code' => '30%OFF', 'discount' => 30]);
        Promocode::create(['code' => '50%OFF', 'discount' => 50]);
        Promocode::create(['code' => '80%OFF', 'discount' => 80]);
    }
}
