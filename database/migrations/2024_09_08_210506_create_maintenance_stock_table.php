<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up()
        {
            Schema::create('maintenance_stock', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('maintenance_id');
                $table->unsignedBigInteger('stock_id');
                $table->integer('quantity'); 
                $table->foreign('maintenance_id')->references('id')->on('maintenance')->onDelete('cascade');
                $table->foreign('stock_id')->references('id')->on('stock')->onDelete('cascade');
                $table->timestamps();
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('maintenance_stock');
        }
    };
