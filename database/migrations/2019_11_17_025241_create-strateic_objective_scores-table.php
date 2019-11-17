<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrateicObjectiveScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trategicObjectiveScores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('strategicObjective_id')->nullable();
            $table->foreign('strategicObjective_id')->references('id')->on('strategic_objectives');
            $table->unsignedBigInteger('perspective_id')->nullable();
            $table->foreign('perspective_id')->references('id')->on('perspectives');
            $table->double('score');
            $table->string('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trategicObjectiveScores');
    }
}
