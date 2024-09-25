
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
     
            $table->text('raison')->nullable();
            $table->date('date_singler');
            $table->string('status')->default('active');
            $table->date('expire_at')->nullable();
      
            $table->longText('justification')->nullable();
            $table->boolean('questioned_by_director')->default(false);
            $table->date('date_questioning')->nullable();
            $table->longText('director_remarks')->nullable();
            $table->timestamps();
           
            $table->unsignedBigInteger('driver_id'); 
            $table->foreign('driver_id')->references('id')->on('drivers');

            $table->unsignedBigInteger('singler_par');
            $table->foreign('singler_par')->references('id')->on('users');

            $table->unsignedBigInteger('director_id')->nullable();
            $table->foreign('director_id')->references('id')->on('users');


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
