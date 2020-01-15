<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
class AssesorPerProgram extends Model
{
    // use LogsActivity;
    // use CausesActivity;
    
    protected $guarded = ['id'];
    protected $fillable = ['created_at','updated_at','email','program_id'];
    protected static $logFillable = true;
    protected static $logName = 'assesor_per_programs';
}
