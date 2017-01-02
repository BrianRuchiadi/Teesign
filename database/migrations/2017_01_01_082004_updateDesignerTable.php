<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDesignerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users_designers', function( $table ){
            $table->boolean( 'laki_laki' )->default( 0 );
            $table->date( 'tanggal_lahir' )->nullable();
            $table->decimal( 'poin', 20, 2 )->default( 0 );
            $table->decimal( 'nilai_popularitas', 20, 2 )->default( 0 );
            $table->decimal( 'rating', 2, 2 )->default( 0 );
            $table->string( 'no_contact' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
