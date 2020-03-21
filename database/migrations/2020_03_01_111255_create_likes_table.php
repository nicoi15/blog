<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('like_id');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('post_id');
            $table->integer('status')->default(1);
            $table->timestamps();

            // Foreign Key from 'posts' table
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts');

            // Foreign Key from 'users' table
            $table->foreign('id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
