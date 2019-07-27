<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_tabl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('body');
            $table->string('url');
            $table->integer('user_id')->unsigned();
           $table->integer('commentable_id')->unsigned();
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
        Schema::dropIfExists('comments_tabl');
    }
}
