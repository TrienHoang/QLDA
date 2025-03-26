<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'cart_id' => Cart::all()->random()->id,
            'payment_id' => Payment::all()->random()->id,
            'coupon_id' => Coupon::all()->random()->id,
            'total_price' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement(['pending','processing','shipped','completed','cancelled']),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
