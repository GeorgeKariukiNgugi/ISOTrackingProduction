<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class closedNonConformityEvidence extends Model
{
   public $table ='closed_non_conformity_evidence';
    protected $guarded = ['id'];

    public function nonconformity(){
        return $this->belongsTo('App\NonConformities');
    }
}
