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
        Schema::create('mission_archive', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id'); // Link to original mission
            $table->enum('type', ['transportation', 'mission']);
            $table->string('name');
            $table->text('description')->nullable();
            $table->datetime('mission_start')->nullable();
            $table->datetime('mission_end')->nullable();
            $table->string('crew_leader')->nullable();
            $table->string('crew_name')->nullable();
            $table->enum('status', ['completed']);
            $table->unsignedInteger('fuel_tokens')->default(0);
            $table->unsignedInteger('fuel_tokens_used')->default(0);
            $table->unsignedInteger('distance')->default(0);
            $table->string('car_id')->nullable();
            $table->foreign('car_id')->references('immatriculation')->on('cars')->onDelete('set null');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes(); // Optional, for soft deletes
        
            // Foreign key to link the mission_archive to the original mission
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_archive');
    }
};
