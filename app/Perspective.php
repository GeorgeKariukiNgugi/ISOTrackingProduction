<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Perspective extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // use LogsActivity;
    // use CausesActivity;
    protected static $logFillable = true;
    protected static $logName = 'perspectives';
    protected $fillable = [
        'id', 'name', 'description', 'weight', 'program_id','perspective_group'
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
        'weight' => 'double'
    ];

    /**
     * Get the StrategicObjectives for the Perspective.
     */
    public function strategicObjectives()
    {
        return $this->hasMany(\App\StrategicObjective::class);
    }


    /**
     * Get the KeyPerfomaceIndicators for the Perspective.
     */
    public function keyPerfomaceIndicators()
    {
        return $this->hasMany(\App\KeyPerfomaceIndicator::class);
    }


    /**
     * Get the StrategicObjectiveScores for the Perspective.
     */
    public function strategicObjectiveScores()
    {
        return $this->hasMany(\App\StrategicObjectiveScore::class);
    }


    /**
     * Get the NonConformities for the Perspective.
     */
    public function nonConformities()
    {
        return $this->hasMany(\App\NonConformities::class);
    }


    /**
     * Get the Program for the Perspective.
     */
    public function program()
    {
        return $this->belongsTo(\App\Program::class);
    }

}
