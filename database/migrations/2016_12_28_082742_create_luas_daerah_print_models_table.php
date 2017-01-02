<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuasDaerahPrintModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luas_daerah_print', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_referensi');
            $table->string('nama_tampil');
            $table->float('panjang');
            $table->float('lebar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luas_daerah_print');
    }
}
