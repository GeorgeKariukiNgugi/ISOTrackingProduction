<?php

namespace App\Http\Controllers\userControllers;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuaterActive;
use App\YearActive;
use App\StrategicObjective;
use PDF;
use App\StrategicObjectiveScore;
class PDFController extends Controller
{
    public function downloadPFD($id){
        $idRetrieved = $id;

        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        foreach($activeYaerCollections as $activeYaerCollection){
            $activeYaer = $activeYaerCollection->Year;
        }

        $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
        foreach($activeQuaterCollections as $activeQuaterCollection){
            $activeQuater = $activeQuaterCollection->Quater;
        }

        //!getting the program Details.
        $programDetails = Program::where('id','=',$id)->get();

        foreach ($programDetails as $programDetail) {
            # code...
            //!initialising the arrays that are key in this section.
            $trackingNumberArray = array();
            $strategicObjectiveNameArray = array();
            $strategicObjectiveScoresArray = array();
            $perspectiveNameArray = array();


            $programName = $programDetail->name;
            $programShortHand = $programDetail->shortHand;
            $programImage = $programDetail->imageLocation;
            $gettingThePersectivesOfTheProgram =$programDetail->perspectives;
            $perspectives = $gettingThePersectivesOfTheProgram;

            foreach ($perspectives as $perspective) {
                # code...
                $perspectiveId = $perspective->id;
                $strategicObjectiveNumbers = count($perspective->strategicObjectives);
                $strategicObjectiveScores = count($perspective->strategicObjectiveScores);

                if($strategicObjectiveScores == $strategicObjectiveNumbers){
                    
                    //!pushing the number of strategic objectives to the array.
                    array_push($trackingNumberArray,count($perspective->strategicObjectiveScores));
                    //! pushing the perspective name to the array.
                    array_push($perspectiveNameArray,$perspective->name);

                    //!getting the strategic objectives of the particular perspective. 
                    $strategicObjectives = StrategicObjective::where('perspective_id','=',$perspective->id)->get();

                    foreach($strategicObjectives as $strategicObjective){
                        array_push($strategicObjectiveNameArray,$strategicObjective->name);

                        //!getting the rhyming strategic objective scores.
                        $trategicObjectiveScores = StrategicObjectiveScore::where('strategicObjective_id','=',$strategicObjective->id)->get();                        

                        foreach ($trategicObjectiveScores as $trategicObjectiveScore) {
                            # code...
                            array_push($strategicObjectiveScoresArray,$trategicObjectiveScore->score);
                        }
                    }
                    
                }
                else{
                    return "THERE ARE SOME STRATEGIC OBJECTIVES THAT HAVE NOT BEEN SCORED.";
                }

                //! selecting the strategic objecive scores that have the following perspective.
                
            }
        }
        // dd($trackingNumberArray);
        $yearForPdf =str_replace('/', '-', $activeYaer); 
        $data = Program::all();
        $pdf = PDF::loadView('users.templatePDFView',compact('activeYaer','programName','programImage','programDetail','activeQuater','trackingNumberArray','strategicObjectiveNameArray','strategicObjectiveScoresArray','perspectiveNameArray'));
        // $timeStamp = new Datetime();
        $pdfNames = $programShortHand.'_report_'.$yearForPdf.'_'.$activeQuater.'_'.time().'.pdf';
        $pdf->save('reports/'.$pdfNames);        
        return $pdf->download($pdfNames);
    }
}
