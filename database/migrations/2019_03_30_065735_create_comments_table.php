<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function ( Blueprint $table_comment){
            $table_comment->increments('id');
            $table_comment->integer('user_id')->unsigned();
            $table_comment->integer('story_id')->unsigned();
            $table_comment->integer('comment');
            $table_comment->dateTime('updateDate');
            $table_comment->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table_comment->foreign('story_id')->references('id')->on('story')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
