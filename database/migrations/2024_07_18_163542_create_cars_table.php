<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->string('immatriculation')->primary();
            $table->string('marque')->nullable();
            $table->string('modele')->nullable();
            $table->string('etat')->nullable();
            $table->integer('kilometrage')->nullable();
            $table->string('datem')->nullable();
            $table->string('couleur')->nullable(); // Color of the car
            $table->string('type_carburant')->nullable(); // Fuel type (e.g., Petrol, Diesel, Electric)
            $table->string('transmission')->nullable(); // Transmission type (e.g., Manual, Automatic)
            $table->integer('puissance')->nullable(); // Horsepower
            $table->integer('nombre_portes')->nullable(); // Number of doors
            $table->integer('nombre_places')->nullable(); // Number of seats
            $table->text('description')->nullable(); // Description of the car
            $table->decimal('prix', 10, 2)->nullable(); // Price
            $table->date('date_achat')->nullable(); // Purchase date
            $table->string('proprietaire')->nullable(); // Owner
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car');
    }
}