<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            CategorySeeder::class,
            ProductSeeder::class,
            ProductCommentSeeder::class,

            CartSeeder::class,
            CartDetailSeeder::class,

            CouponSeeder::class,
            PaymentSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class
        ]);
    }
}
