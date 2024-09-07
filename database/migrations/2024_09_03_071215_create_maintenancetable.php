<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->foreignId('stock_id')->constrained('stock')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->enum('maintenance_type', ['inside', 'outside']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('categorie_panne')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->timestamps();
            $table->enum('statue', ['completed', 'inwork'])->default('inwork');
            $table->foreign('immatriculation')->references('immatriculation')->on('cars')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('maintenance');
    }
};
