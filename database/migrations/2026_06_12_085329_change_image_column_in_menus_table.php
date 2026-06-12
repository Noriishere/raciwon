<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            // Mengubah kolom image menjadi text agar bisa menampung string JSON yang panjang
            $table->text('image')->nullable()->change(); 
        });
    }
    
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
};
