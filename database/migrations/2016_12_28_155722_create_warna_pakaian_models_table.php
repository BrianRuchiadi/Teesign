<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarnaPakaianModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warna_pakaian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('warna_1')->default('#FFFFFF');
            $table->string('warna_2')->nullable();
            $table->string('warna_3')->nullable();
            $table->boolean('aktif')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warna_pakaian');
    }
}
