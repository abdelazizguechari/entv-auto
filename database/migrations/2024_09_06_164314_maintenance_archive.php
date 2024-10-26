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
        Schema::create('maintenance_archive', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maintenance_id'); // Foreign key to the original maintenance record
            $table->enum('maintenance_type', ['inside', 'outside']);
            $table->date('start_date');
            $table->string('categorie_panne')->nullable();
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->timestamps();
        
            $table->foreign('maintenance_id')->references('id')->on('maintenance')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
