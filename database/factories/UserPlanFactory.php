<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserPlan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPlan>
 */
class UserPlanFactory extends Factory
{
    protected $model = UserPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 1),
            'mst_plan_id' => rand(1, 9),
            'price_type' => rand(0, 1),
            'start_date' => fake()-> date('Y/m/d'),
            'end_date' => fake()-> date('Y/m/d'),
            'delete_flag' => rand(0, 1),
        ];
    }
}
