<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('price', 6, 2, true) ;
            $table->string('name', 100) ;
            $table->string('rating_average', 100) ;
            $table->integer('rating_reviews') ;
            $table->string('image', 255) ;
            $table->bigInteger('id_api') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
