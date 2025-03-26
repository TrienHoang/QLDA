<?php

namespace Database\Seeders;

use App\Models\CartDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CartDetail::factory()
            ->count(10)
            ->create();
    }
}
