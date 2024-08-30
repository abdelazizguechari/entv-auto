<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionCarTable extends Migration
{
    public function up()
    {
        Schema::create('mission_car', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->string('car_id');
            $table->timestamps();

            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->foreign('car_id')->references('immatriculation')->on('cars')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mission_car');
    }
}