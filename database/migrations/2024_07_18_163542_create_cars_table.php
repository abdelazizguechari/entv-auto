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
            $table->string('couleur')->nullable(); 
            $table->string('type_carburant')->nullable(); 
            $table->string('transmission')->nullable();
            $table->integer('puissance')->nullable(); 
            $table->integer('nombre_portes')->nullable(); 
            $table->integer('nombre_places')->nullable(); 
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2)->nullable();
            $table->date('date_achat')->nullable(); 
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('driver')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car');
    }
}