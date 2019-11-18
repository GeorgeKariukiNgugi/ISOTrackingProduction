<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrategicObjective extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'perspective_id'
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
     * Get the KeyPerfomaceIndicators for the StrategicObjective.
     */
    public function keyPerfomaceIndicators()
    {
        return $this->hasMany(\App\KeyPerfomaceIndicator::class);
    }


    /**
     * Get the KeyPerfomanceIndicatorScores for the StrategicObjective.
     */
    public function keyPerfomanceIndicatorScores()
    {
        return $this->hasMany(\App\KeyPerfomanceIndicatorScore::class);
    }
    public function keyPerfomanceIndicator()
    {
        return $this->hasMany(\App\KeyPerfomaceIndicator::class);
    }

    /**
     * Get the StrategicObjectiveScores for the StrategicObjective.
     */
    public function strategicObjectiveScores()
    {
        return $this->hasMany(\App\StrategicObjectiveScore::class);
    }


    /**
     * Get the NonConformities for the StrategicObjective.
     */
    public function nonConformities()
    {
        return $this->hasMany(\App\NonConformities::class);
    }


    /**
     * Get the Perspective for the StrategicObjective.
     */
    public function perspective()
    {
        return $this->belongsTo(\App\Perspective::class);
    }

}
