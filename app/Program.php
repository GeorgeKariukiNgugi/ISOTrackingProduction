<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'shortHand', 'description','imageLocation','programCode','colorCode'
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
     * Get the Perspectives for the Program.
     */
    public function perspectives()
    {
        return $this->hasMany(\App\Perspective::class);
    }


    /**
     * Get the NonConformities for the Program.
     */
    public function nonConformities()
    {
        return $this->hasMany(\App\NonConformities::class);
    }

}
