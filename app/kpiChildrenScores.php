<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpiChildrenScores extends Model
{
    public $table ='kpi_children_scores';
    protected $fillable = ["keyPerfomanceIndicator_id","name"];
}
