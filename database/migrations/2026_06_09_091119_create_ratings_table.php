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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel customers (Aplikasi Mobile)
            $table->foreignId('customer_id')
                ->constrained('customers')
                ->onDelete('cascade');

            // Relasi ke tabel menus
            $table->foreignId('menu_id')
                ->constrained('menus')
                ->onDelete('cascade');

            // Relasi ke tabel orders (Header Transaksi)
            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade');

            // Nilai rating menggunakan TINYINT (skala 1-5)
            $table->tinyInteger('rating')->unsigned();

            // Ulasan opsional dari pelanggan
            $table->text('review')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
