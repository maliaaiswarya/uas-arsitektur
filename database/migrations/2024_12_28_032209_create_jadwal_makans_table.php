<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        {
            Schema::create('jadwal_makans', function (Blueprint $table) {
                $table->id(); // Primary Key
                $table->date('tanggal_makan'); // Kolom untuk tanggal makan
                $table->time('waktu_makan'); // Kolom untuk waktu makan
                $table->string('menu'); // Kolom untuk menu makan
                $table->timestamps(); // Kolom created_at dan updated_at
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_makans');
    }
};
