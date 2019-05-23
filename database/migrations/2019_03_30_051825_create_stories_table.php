<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
//            $table->dateTime('update_date');
//            $table->integer('chapter_id');
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
//            $table->integer('category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->boolean('status')->default(0);
//            $table->foreign("category_id")->references("id")->on("categories")->onDelete('cascade');
            $table->foreign("author_id")->references("id")->on("authors")->onDelete('cascade');
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
        Schema::dropIfExists('stories');
    }
}
