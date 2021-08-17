<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_dislikes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            
            $table->integer('user_id');
            $table->integer('reply_id');
            $table->integer('likes')->default(0);
            $table->integer('rank')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_dislikes');
    }
}
