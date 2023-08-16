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
        Schema::create('mst_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id');
            $table->string('plan_name');
            $table->unsignedInteger('price');
            $table->unsignedSmallInteger('delete_flag');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_plans');
    }
};
