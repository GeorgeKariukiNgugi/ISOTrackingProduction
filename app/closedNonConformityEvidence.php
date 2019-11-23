<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class closedNonConformityEvidence extends Model
{
    protected $guarded = ['id'];

    public function nonconformity(){
        return $this->hasOne('App\NonConformities');
    }
}
