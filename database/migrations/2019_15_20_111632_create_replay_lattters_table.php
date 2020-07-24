<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplayLatttersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replay_lattters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longtext('description')->nullable();
            $table->integer('letter_id')->unsigned();
            $table->integer('letter_position')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('letter_id')->references('id')->on('projects');


            
    
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
        Schema::dropIfExists('replay_lattters');
    }
}
