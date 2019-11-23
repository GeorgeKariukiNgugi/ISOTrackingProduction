<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonConformitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_conformities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('quater');
            $table->string('rootCause');
            $table->string('openClosed');
            $table->string('correction');
            $table->string('correctiveAction');
            $table->timestamp('date')->nullable();

            $table->unsignedBigInteger('keyPerfomanceIndicator_id');
            $table->foreign('keyPerfomanceIndicator_id')->references('id')->on('key_perfomance_indicators');

            $table->unsignedBigInteger('strategicObjective_id')->nullable();
            $table->foreign('strategicObjective_id')->references('id')->on('strategic_objectives');

            $table->unsignedBigInteger('perspective_id')->nullable();
            $table->foreign('perspective_id')->references('id')->on('perspectives');

            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs');
            
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
        Schema::dropIfExists('non_conformities');
    }
}
