<?php

namespace App\Http\Controllers\userControllers;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuaterActive;
use App\YearActive;
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
            $gettingThePersectivesOfTheProgram =$programDetail->perspectives;
            $perspectives = $gettingThePersectivesOfTheProgram;

            foreach ($perspectives as $perspective) {
                # code...
                $perspectiveId = $perspective->id;

                //! selecting the strategic objecive scores that have the following perspective.
                $strategicObjectiveScores = StrategicObjectiveScore::where('perspective_id','=',$perspectiveId)->get();                
                foreach ($strategicObjectiveScores as $strategicObjectiveScore) {
                    # code...
                    
                }
            }
        }
        $data = Program::all();
        $pdf = PDF::loadView('users.templatePDFView', compact('data','id','programDetails','activeYaer','activeQuater'));

        return $pdf->download('reportCard.pdf');
    }
}
