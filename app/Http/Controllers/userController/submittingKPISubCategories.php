<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kpiChildren;
use App\kpiChildrenScores;
use App\YearActive;
class submittingKPISubCategories extends Controller
{
    public function submittingKPISubCategories(Request $request){
        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        foreach($activeYaerCollections as $activeYaerCollection){
            $activeYaer = $activeYaerCollection->Year;            
        }
        $incrementalNumber = $request->incrementalNumber;
        $kpiId = $request->kpiId;
        $array = array();
        for ($i=1; $i <= $incrementalNumber; $i++) { 
            # code...
            $inputName = 'kpichild'.$kpiId.$i;
            $kpiChildrenId = "kpiChildrenId".$i;
            $kpiChildrenId = $request->$kpiChildrenId;
            array_push($array,$request->$inputName);
            $kpiChildrenScores = kpiChildrenScores::where('kpi_id_children','=',$kpiChildrenId)
                                                    ->where('kpi_id','=',$kpiId)
                                                    ->where('year','=',$activeYaer)
                                                    ->where('kpi_id_children','=',$kpiChildrenId)
                                                    ->get();
                                                    // dd($request);
            if (count($kpiChildrenScores) == 0) {
                $newKPIChildrenScore = new kpiChildrenScores();
                $newKPIChildrenScore->kpi_id =$kpiId;
                $newKPIChildrenScore->kpi_id_children =$kpiChildrenId;
                $newKPIChildrenScore->year =$activeYaer;
                $newKPIChildrenScore->score  = $request->$inputName;
                $newKPIChildrenScore->save();
                $errorMessage = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "Scores Have Successfully been saved. Close To move on.".
                        "</strong><br /></span></div>";           
            } else {
                # code...                
                foreach($kpiChildrenScores as $kpiChildrenScore){
                    $kpiChildrenScore->kpi_id =$kpiId;
                    $kpiChildrenScore->kpi_id_children =$kpiChildrenId;
                    $kpiChildrenScore->year =$activeYaer;
                    $kpiChildrenScore->score  = $request->$inputName;  
                    $kpiChildrenScore->save();
                }                  
                $errorMessage = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "Scores Have Successfully been updated. Close To move on.".
                        "</strong><br /></span></div>";                                            
            } 
           
        }        
        return response()->json(['success'=>$errorMessage]);         
        
        
    }
}
