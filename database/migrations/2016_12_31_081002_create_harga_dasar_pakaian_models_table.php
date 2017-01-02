<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaDasarPakaianModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // id, variasi pakaian, harga dasar, tanggal update
        Schema::create('harga_dasar_pakaian', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('variasi_pakaian')->unsigned();
            $table->foreign('variasi_pakaian')->references('id')->on('variasi_pakaian')->onDelete('cascade');
            $table->decimal('harga_dasar', 20, 2 )->default(0.00);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_dasar_pakaian');
    }
}
