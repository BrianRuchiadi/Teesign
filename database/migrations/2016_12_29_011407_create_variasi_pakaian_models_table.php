<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariasiPakaianModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variasi_pakaian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('size')->unsigned();
            $table->foreign('size')->references('id')->on('size')->onDelete('cascade');
            
            $table->integer('jenis_pakaian')->unsigned();
            $table->foreign('jenis_pakaian')->references('id')->on('jenis_pakaian')->onDelete('cascade');
            
            $table->integer('bahan_print_pakaian')->unsigned();
            $table->foreign('bahan_print_pakaian')->references('id')->on('bahan_print_pakaian')->onDelete('cascade');

            
            $table->integer('warna_pakaian')->unsigned();
            $table->foreign('warna_pakaian')->references('id')->on('warna_pakaian')->onDelete('cascade');

            $table->integer('luas_daerah_print')->unsigned();
            $table->foreign('luas_daerah_print')->references('id')->on('luas_daerah_print')->onDelete('cascade');

            $table->integer('aktif')->default(0);
            
           
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variasi_pakaian');
    }
}
