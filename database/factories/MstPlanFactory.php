<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MstPlan;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MstPlan>
 */
class MstPlanFactory extends Factory
{
    protected $model = MstPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['フルタイムプラン', 'デイタイムプラン', 'ホリデープラン'];
        $name = array_rand($names, 1);

        $explanations = ['フルタイム(すべての営業時間)', 'デイタイム(平日17:00まで)', 'ホリデー(土日祝日のみ)'];
        $explanation = array_rand($explanations, 1);

        return [
            'plan_id' => Str::uuid()->toString(),
            'plan_name' => $names[$name],
            'adult_price' => rand(2000, 4000),
            'child_price' => rand(2000, 4000),
            'explanation' => $explanations[$explanation],
            'image' => 'storage/plans/' . (string) Str::uuid() . '.png',
            'delete_flag' => rand(0, 1),
        ];
    }
}
