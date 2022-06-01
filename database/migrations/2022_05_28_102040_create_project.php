<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('creator_id');
            $table->var('creator_lastName')->nullable();
            $table->var('creator_firstName')->nullable();
            $table->string('name');
            $table->integer('studyYear');
            $table->boolean('status')->nullable();
            $table->longText("description")->nullable();
            $table->date('createdDate');
            $table->date('dataTarget');
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
        Schema::dropIfExists('projects');
    }
};
