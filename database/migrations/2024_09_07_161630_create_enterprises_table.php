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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Name of the enterprise
            $table->string('siege_social'); // Headquarters
            $table->string('email'); // Contact email
            $table->string('telephone'); // Contact phone number
            $table->string('facebook')->nullable(); // Facebook link
            $table->string('twitter')->nullable(); // Twitter link
            $table->string('linkedin')->nullable(); // LinkedIn link
            $table->string('instagram')->nullable(); // Instagram link
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Department name
            $table->integer('nb_employes'); // Number of employees
            $table->string('responsable'); // Department head
            $table->string('localisation'); // Location of the department
            $table->string('email'); // Contact email
            $table->string('telephone');// Contact phone number
            $table->foreignId('enterprise_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key to enterprises
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
