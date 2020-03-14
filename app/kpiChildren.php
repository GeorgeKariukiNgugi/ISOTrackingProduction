<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpiChildren extends Model
{
    public $table ='kpi_childrens';
    protected $fillable = ["keyPerfomanceIndicator_id","name"];
}
