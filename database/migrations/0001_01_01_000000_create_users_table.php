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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('photo')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('mat')->nullable();
            $table->string('willaya')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('google_id')->nullable();
            $table->enum('role', ['admin','agent','user'])->default('user');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


       

    Schema::create('missions', function (Blueprint $table) {
        $table->id();
        $table->string('nom_mission');
        $table->string('departement');
        $table->string('lieu');
        $table->time('heure_debut');
        $table->text('description')->nullable();
        $table->timestamps();
    });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });


      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
