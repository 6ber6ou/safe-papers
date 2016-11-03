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
            $table->string( 'description' );
            $table->string( 'path' );
            $table->integer( 'user_id' );
            $table->integer( 'category_id' )->unsigned();
            $table->timestamp( 'consulted_at' )->nullable();
            $table->timestamps();

            $table->foreign( 'category_id' )
                  ->references( 'id' )
                  ->on( 'categories' )
                  ->onUpdate( 'cascade' )
                  ->onDelete( 'cascade' );

            } );

        }

    // ------------------------------------------------------------

    public function down()
        {

        Schema::dropIfExists( 'papers' );

        }

    }
