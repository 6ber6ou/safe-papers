<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
    {

    public function up()
        {

        Schema::create( 'papers', function( Blueprint $table )
            {

            $table->increments( 'id' );
            $table->string( 'path' );
            $table->integer( 'user_id' );
            $table->integer( 'category_id' );
            $table->timestamps();

            } );

        }

    // ------------------------------------------------------------

    public function down()
        {

        Schema::dropIfExists( 'papers' );

        }

    }
