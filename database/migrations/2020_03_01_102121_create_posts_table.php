<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->unsignedBigInteger('id');
            $table->string('title');
            $table->string('image');
            $table->mediumText('body');
            $table->unsignedBigInteger('tag_id');
            $table->integer('status')->default(1);
            $table->timestamps();

            // Foreign Key from 'users' table
            $table->foreign('id')
                ->references('id')
                ->on('users');
            // Foreign Key from 'tags' table
            $table->foreign('tag_id')
                ->references('tag_id')
                ->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
