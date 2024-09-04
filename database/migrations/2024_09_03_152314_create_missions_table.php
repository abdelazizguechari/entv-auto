<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['transportation', 'mission']);
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
            $table->string('car_id')->nullable();
            $table->foreign('car_id')->references('immatriculation')->on('cars')->onDelete('set null');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('missions');
    }
}