<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MstPlan;

class MstPlanSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MstPlan::factory()->count(3)->create();
    }
}
