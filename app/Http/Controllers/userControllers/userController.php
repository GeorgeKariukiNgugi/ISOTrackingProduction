<?php

namespace App\Http\Controllers\userControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StrategicObjective;
use App\QuaterActive;
use App\YearActive;
class userController extends Controller
{
    public function submittingKPIScores(Request $request){        

        //! getting the active year and active quater from the database.
        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        foreach($activeYaerCollections as $activeYaerCollection){
            $activeYaer = $activeYaerCollection->Year;
            // dd($activeYaer);
        }

        $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
        foreach($activeQuaterCollections as $activeQuaterCollection){
            $activeQuater = $activeQuaterCollection->Quater;
            // dd($activeQuater);
        }


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


    //? THE FUNCTION THAT IS USED TO INSERT THE NON CONFORMITIES INTO THE TABLE.

    public function submittingNonConformities(){

        return "submission";
    }
}
