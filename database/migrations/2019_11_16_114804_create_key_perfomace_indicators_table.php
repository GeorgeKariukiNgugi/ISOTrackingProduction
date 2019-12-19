<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyPerfomaceIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_perfomace_indicators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('strategicObjective_id')->nullable();
            $table->foreign('strategicObjective_id')->references('id')->on('strategic_objectives');
            $table->unsignedBigInteger('perspective_id')->nullable();
            $table->foreign('perspective_id')->references('id')->on('perspectives');
            $table->string('arithmeticStructure');
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
        Schema::dropIfExists('key_perfomace_indicators');
    }
}
