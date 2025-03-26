<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper(Str::random(10)), // Mã coupon random
            'discount_type' => $this->faker->randomElement(['percentage', 'fixed']), // Loại giảm giá
            'discount_value' => $this->faker->randomFloat(2, 5, 50), // Giá trị từ 5 -> 50
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'), // Bắt đầu từ tháng trước
            'end_date' => $this->faker->dateTimeBetween('now', '+1 month'), // Kết thúc trong 1 tháng
            'status' => $this->faker->randomElement([0, 1]), // 0: không hoạt động, 1: hoạt động
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
