<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
class closedNonConformityEvidence extends Model
{
    use LogsActivity;
    use CausesActivity;
    public $table ='closed_non_conformity_evidence';
    protected $guarded = ['id'];
    // protected $fillable = ['clossureDate,created_at,updated_at,clossureDate,briefDescription,locationOfEvidence,nonConformity_id'];
    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'closed_non_conformity_evidence';
    public function nonconformity(){
        return $this->belongsTo('App\NonConformities');
        
    }
}
