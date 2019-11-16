<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyPerfomanceIndicatorScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_perfomance_indicator_scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('ytd');
            $table->unsignedBigInteger('keyPerfomanceIndicator_id');
            $table->foreign('keyPerfomanceIndicator_id')->references('id')->on('key_perfomance_indicators');
            $table->unsignedBigInteger('strategicObjective_id')->nullable();
            $table->foreign('strategicObjective_id')->references('id')->on('strategic_objectives');
            $table->string('score');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_perfomance_indicator_scores');
    }
}
