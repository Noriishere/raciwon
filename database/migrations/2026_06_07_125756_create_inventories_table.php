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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->enum('unit', [
                'kg',
                'gram',
                'liter',
                'ml',
                'pcs',
                'pack',
            ]);

            $table->decimal('current_stock', 15, 2);
            $table->decimal('minimum_stock', 15, 2);
            $table->decimal('cost_per_unit', 15, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
