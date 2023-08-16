<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_plans', function (Blueprint $table) {
            $table->unsignedSmallInteger('price_type')->after('mst_plan_id');
            $table->unsignedSmallInteger('delete_flag')->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_plans', function (Blueprint $table) {
            $table->dropColumn('price_type');
            $table->dropColumn('delete_flag');
        });
    }
};
