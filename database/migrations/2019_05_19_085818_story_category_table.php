<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoryCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'story_category',function ( Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id')->unsigned();
            $table->integer('category_id')->unsigned();
//            $table->foreign('story_id')->references('id')->on('story');
//            $table->foreign('category_id')->references('id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story_category');
    }
}
