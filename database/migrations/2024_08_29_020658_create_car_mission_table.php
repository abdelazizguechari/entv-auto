<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('car_mission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('car_id');
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_mission');
    }
};
