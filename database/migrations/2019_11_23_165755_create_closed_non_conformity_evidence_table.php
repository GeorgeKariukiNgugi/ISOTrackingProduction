<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosedNonConformityEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closed_non_conformity_evidence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('clossureDate');
            $table->text('briefDescription');
            $table->text('locationOfEvidence');
            $table->unsignedBigInteger('nonConformity_id');
            $table->foreign('nonConformity_id')->references('id')->on('non_conformities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('closed_non_conformity_evidence');
    }
}
