<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_childrens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->BigInteger('keyPerfomanceIndicator_id')->nullable();
            $table->string("name");
            // $table->foreign('keyPerfomanceIndicator_id')->references('id')->on('key_perfomance_indicators');
            
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi_childrens');
    }
}
