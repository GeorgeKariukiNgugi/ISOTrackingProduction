<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonConformities extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'year', 'quater', 'rootCause', 'openClosed', 'correction', 'correctiveAction', 'keyPerfomanceIndicator_id', 'strategicObjective_id', 'perspective_id', 'program_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date', 'created_at', 'updated_at'];

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
        return $this->belongsTo(\App\KeyPerfomaceIndicator::class);
    }


    /**
     * Get the StrategicObjective for the NonConformities.
     */
    public function strategicObjective()
    {
        return $this->belongsTo(\App\StrategicObjective::class);
    }

}
