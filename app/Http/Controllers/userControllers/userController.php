<?php

namespace App\Http\Controllers\userControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StrategicObjective;
class userController extends Controller
{
    public function submittingKPIScores(Request $request){
        // return "this is a return.";

        $strategicObjectiveIdFromForm = $request->strategicObjective;

        $strategicObjectivesKpis = StrategicObjective::where('id','=',$strategicObjectiveIdFromForm)->get();
        //!getting the key perfomance indicators of the strategic objectuve.
        foreach($strategicObjectivesKpis as $strategicObjectivesKpi){
            $kpis = $strategicObjectivesKpi->keyPerfomaceIndicators;
            $kpiNumber = count($kpis);
        }
        

        //!counting the key perfomance indicators.         

        return $kpiNumber;
    }
}
