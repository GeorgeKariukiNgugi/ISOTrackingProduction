<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresRecordedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoresRecorded', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('keyPerfomanceIndicator_id');
            $table->foreign('keyPerfomanceIndicator_id')->references('id')->on('key_perfomance_indicators');
            $table->string('score');
            $table->string('quater');
            $table->string('year');
            $table->string('metOrUnmet');
            $table->string('reasonProvided');
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
        Schema::dropIfExists('scoresRecorded');
    }
}
