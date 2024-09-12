<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverspamsTable extends Migration  
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singler_conducteur', function (Blueprint $table) {
            $table->id();
            
 
            $table->unsignedBigInteger('driver_id'); 
            
      
            $table->text('raison')->nullable();
            
        
            $table->date('date_singler'); 
            
       
            $table->string('status')->default('active');
            
      
            $table->date('expire_at')->nullable();
            
    
            $table->unsignedBigInteger('singler_par');
            

            $table->longText('justification')->nullable();
            
 
            $table->boolean('questioned_by_director')->default(false);
            
      
            $table->date('date_questioning')->nullable();
            
       
            $table->longText('director_remarks')->nullable();
            
  
            $table->unsignedBigInteger('director_id')->nullable();
            
       
            $table->timestamps();
          
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade'); // Now referencing the driver table
            $table->foreign('singler_par')->references('id')->on('users')->onDelete('set null'); // Referencing the user who signaled
            $table->foreign('director_id')->references('id')->on('users')->onDelete('set null'); // Referencing the director
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('singler_conducteur');
    }
}
