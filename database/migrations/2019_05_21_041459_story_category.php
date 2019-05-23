<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoryCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_category', function ( Blueprint $table) {
           $table->increments('id');
           $table->integer('story_id')->unsigned();
           $table->foreign('story_id')->references('id')->on('stories');
           $table->integer('category_id')->unsigned();
           $table->foreign('category_id')->references('id')->on('categories');
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
    }
}
