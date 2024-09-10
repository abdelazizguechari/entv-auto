<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMaintenanceStockToMaintenanceStocks extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
        Schema::rename('maintenance_stock', 'maintenance_stocks');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
        Schema::rename('maintenance_stocks', 'maintenance_stock');
    }
}

