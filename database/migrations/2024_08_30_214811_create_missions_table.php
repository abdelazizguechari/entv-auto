<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    // File: database/migrations/2024_08_30_024133_create_missions_table.php
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['transportation', 'mission', 'evenements']);
            $table->string('name');
            $table->text('description')->nullable();
            $table->datetime('mission_start')->nullable();
            $table->datetime('mission_end')->nullable();
            $table->string('crew_leader')->nullable();
            $table->string('crew_name')->nullable();
            $table->enum('status', ['ongoing', 'scheduled', 'completed']);
            $table->unsignedInteger('fuel_tokens')->default(0);
            $table->unsignedInteger('fuel_tokens_used')->default(0);
            $table->unsignedInteger('distance')->default(0);
            $table->string('car_id')->nullable(); // Change to string if immatriculation is used
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->timestamps();

            $table->foreign('car_id')->references('immatriculation')->on('cars')->onDelete('cascade'); // Reference immatriculation
            $table->foreign('driver_id')->references('id')->on('driver')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('missions');
    }
}