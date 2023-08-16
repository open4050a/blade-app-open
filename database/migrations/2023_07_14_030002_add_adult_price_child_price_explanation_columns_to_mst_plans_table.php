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
        Schema::table('mst_plans', function (Blueprint $table) {
            $table->unsignedInteger('adult_price')->nullable()->after('plan_name');
            $table->unsignedInteger('child_price')->nullable()->after('adult_price');
            $table->string('explanation')->nullable()->after('child_price');
            $table->string('image')->nullable()->after('explanation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_plans', function (Blueprint $table) {
            $table->dropColumn('adult_price');
            $table->dropColumn('child_price');
            $table->dropColumn('explanation');
            $table->dropColumn('image');
        });
    }
};
