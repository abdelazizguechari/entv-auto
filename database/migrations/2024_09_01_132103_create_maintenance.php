<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->bigInteger('stock_id');
            $table->bigInteger('driver_id');
            $table->enum('maintenance_type', ['inside', 'outside']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('categorie_panne')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade'); 
            $table->timestamps();
            $table->foreign('immatriculation')->references('immatriculation')->on('cars')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('stock')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance');
    }
}
