<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('books_id');
            $table->integer('author_id')->unsigned();
            $table->string('books_title');
            $table->string('books_subtitle');
            $table->string('books_isbn');
        });

        Schema::table('books', function($table) {
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
