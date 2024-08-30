<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionDriverTable extends Migration
{
    public function up()
    {
        Schema::create('mission_driver', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('driver_id');
            $table->timestamps();

            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('driver')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mission_driver');
    }
}