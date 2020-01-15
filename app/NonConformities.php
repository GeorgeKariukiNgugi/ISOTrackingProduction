<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class NonConformities extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // use LogsActivity;
    // use CausesActivity;
    protected static $logFillable = true;
    protected static $logName = 'non_conformities';
    protected $fillable = [
        'id', 'year', 'date', 'quater', 'rootCause', 'openClosed', 'correction', 'correctiveAction', 'keyPerfomanceIndicator_id', 'strategicObjective_id', 'perspective_id', 'program_id'
    ];
    
    
    
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    /**
     * Get the Program for the NonConformities.
     */
    public function program()
    {
        return $this->belongsTo(\App\Program::class);
    }


    /**
     * Get the Perspective for the NonConformities.
     */
    public function perspective()
    {
        return $this->belongsTo(\App\Perspective::class);
    }


    /**
     * Get the KeyPerfomaceIndicator for the NonConformities.
     */
    public function keyPerfomaceIndicator()
    {
        return $this->belongsTo(\App\KeyPerfomaceIndicator::class, 'keyPerfomanceIndicator_id');
    }


    /**
     * Get the StrategicObjective for the NonConformities.
     */
    public function strategicObjective()
    {
        return $this->belongsTo(\App\StrategicObjective::class, 'strategicObjective_id');
    }
    public function noncoformityEvidence(){
        return $this->hasOne('App\closedNonConformityEvidence', 'nonConformity_id');
    }
}
