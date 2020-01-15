<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
class KeyPerfomanceIndicatorScore extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // use LogsActivity;
    // use CausesActivity;

    protected static $logFillable = true;
    protected static $logName = 'key_perfomance_indicator_scores';

    protected $fillable = [
        'id', 'year', 'ytd', 'kpi_id', 'strategic_objective_id', 'score','quater'
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
}
