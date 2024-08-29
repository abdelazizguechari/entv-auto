<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
     Schema::create('driver' , function(Blueprint $table) {
        $table->id();
        $table->string('nom')->nullable();
        $table->string('prenom')->nullable();
        $table->string('assurance_num')->nullable();
        $table->string('permis_conduire')->unique();
        $table->string('telephone')->nullable();
        $table->string('num_cas_urgance')->nullable();
        $table->string('nom_cas_urgance')->nullable();
        $table->string('email')->unique();
        $table->enum('status', ['active','inactive'])->default('inactive');
        $table->string('adresse')->nullable();
        $table->date('date_naissance')->nullable();
        $table->string('photo')->nullable();
        $table->string('voiture_id');
        $table->foreign('voiture_id')->references('immatriculation')->on('cars')->onDelete('cascade');
        $table->timestamps();

     });
    }


    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
