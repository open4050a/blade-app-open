<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MstPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MstPlanSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //MstPlan::factory()->count(3)->create();
        $plan1 = '623e4070-5852-4560-9e54-f7202183018c';
        $plan2 = '799101fa-07f1-449e-a699-ff3a30a9f72d';
        $plan3 = 'c5f3088c-19c6-40fc-9acc-36976231c334';

        DB::table('mst_plans')->insert([
            'plan_id' => $plan1,
            'plan_name' => 'フルタイムプラン',
            'adult_price' => 3470,
            'child_price' => 2980,
            'explanation' => 'フルタイム(すべての営業時間)',
            'image' => 'storage/plans/' . $plan1 . '.jpeg',
            'delete_flag' => 0,
        ]);

        DB::table('mst_plans')->insert([
            'plan_id' => $plan2,
            'plan_name' => 'デイタイムプラン',
            'adult_price' => 2470,
            'child_price' => 1980,
            'explanation' => 'デイタイム(平日17:00まで)',
            'image' => 'storage/plans/' . $plan2 . '.jpeg',
            'delete_flag' => 0,
        ]);

        DB::table('mst_plans')->insert([
            'plan_id' => $plan3,
            'plan_name' => 'ホリデープラン',
            'adult_price' => 1470,
            'child_price' => 980,
            'explanation' => 'ホリデー(土日祝日のみ)',
            'image' => 'storage/plans/' . $plan3 . '.jpeg',
            'delete_flag' => 0,
        ]);
    }
}
