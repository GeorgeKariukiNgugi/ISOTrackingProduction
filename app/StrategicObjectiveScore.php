<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class StrategicObjectiveScore extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // use LogsActivity;
    // use CausesActivity;
    protected static $logFillable = true;
    protected static $logName = 'reports_generateds';
    protected $fillable = [
        'id', 'score', 'year', 'strategicObjective_id', 'perspective_id','quater'
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
     * Get the Perspective for the StrategicObjectiveScore.
     */
    public function perspective()
    {
        return $this->belongsTo(\App\Perspective::class);
    }


    /**
     * Get the StrategicObjectiveScore for the StrategicObjectiveScore.
     */
    public function strategicObjectiveScore()
    {
        return $this->belongsTo(\App\StrategicObjectiveScore::class);
    }

    public function strategicObjective()
    {
        return $this->belongsTo(\App\StrategicObjective::class);
    }

}
