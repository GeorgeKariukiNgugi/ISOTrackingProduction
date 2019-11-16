<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorisations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('emailAddress');
            $table->integer('prorammeAssesment');
            $table->foreign('prorammeAssesment')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorisations');
    }
}
