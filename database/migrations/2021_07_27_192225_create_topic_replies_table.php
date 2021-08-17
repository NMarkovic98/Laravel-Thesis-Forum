<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_replies', function (Blueprint $table) {
            $table->id();
            $table->longtext('desc');
            $table->unsignedBigInteger('forum_id');
            $table->integer('topic_id');
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
            $table->integer('is_deleted')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('topic_replies');
    }
}
