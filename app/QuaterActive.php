<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class QuaterActive extends Model
{
    //
    use LogsActivity;
    use CausesActivity;
    protected static $logUnguarded = true;
    protected static $logName = 'quater_actives';

    protected $guarded = ['id'];
}
