<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentReplayesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replayes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('body');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
           $table->integer('commentable_id')->unsigned();
           $table->foreign('commentable_id')->references('id')->on('replay_lattters');
            $table->string('commentable_type');
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
        Schema::dropIfExists('comment_replayes');
    }
}
