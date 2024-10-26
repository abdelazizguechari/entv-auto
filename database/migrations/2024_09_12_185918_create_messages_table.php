<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
  
  
  {


   

    Schema::create('conversations', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable(); 
        $table->timestamps();
    });
    

    Schema::create('messages', function (Blueprint $table) {
        $table->id();
        $table->text('message')->nullable();
        $table->string('file_path')->nullable(); // For file messages
        $table->foreignId('conversation_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Sender
        $table->timestamps();
    });


    Schema::create('conversation_participants', function (Blueprint $table) {
        $table->id();
        $table->foreignId('conversation_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();


    });






    

}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
