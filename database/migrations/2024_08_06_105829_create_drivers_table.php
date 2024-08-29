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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('license_number')->unique();
            $table->date('license_expiry');
            $table->enum('status',['on_leave','pending','on_mission']);
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('car_id')->unique();
            $table->timestamps();
        });
    }


    
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
