<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Program;
use App\Userediting;
use App\YearActive;
use App\QuaterActive;
use App\Http\Requests\submittingCalender;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
class asesmentCalender extends Controller
{
    public function viewingAssesmentCalender(){

        $programs = Program::all();

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
        return view('adminPage.assesmentCalender',['programs'=>$programs,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater]);
    }

    public function submittingNewCalender(submittingCalender $request){

        //! first get if the year is set or its empty.

        $yaer = 0;

        if($request->year != null){
            //!to store the new year, first check for the active year and turn it off.

            $activeYears = YearActive::where('Active','=',1)->get();

            foreach ($activeYears as $activeYear) {
                # code...
                $activeYear->Active = 0;
                $activeYear->save();
            }

            //! next, insert the new year and activate.
            //? first check if there is an year with the exact year. 

            $repeatYears = YearActive::where('Year','=',$request->year)->get(); 

            //?counting the number of years. 

            if (count($repeatYears) == 0) {
                # code...
                $insertYear = new YearActive(
                    array(
                        'Year'=>$request->year,
                        'Active'=> 1,
                    )
        );
        $insertYear->save();
            } else {
                # code...
                foreach ($repeatYears as $repeatYear) {
                    # code...
                    $repeatYear->Year = $request->year;
                    $repeatYear->Active = 1;
                    $repeatYear->save();
                }
            }
            
        }

        //! the next stage is to insert the quater active.
        $activeQuaters = QuaterActive::where('Active','=',1)->get(); 

        foreach($activeQuaters as $activeQuater){

                $activeQuater->Active = 0;
                $activeQuater->save();
        }

        //! next, we insert the new quater.

        $activatingQuaters = QuaterActive::where('Quater','=',$request->quater)->get();

        foreach ($activatingQuaters as $activatingQuater) {
            # code...
            $activatingQuater->Active = 1;
            $activatingQuater->save();

        }

        $editingValues = Userediting::all();

        foreach($editingValues as $editingValue){
            $editingValue->value = $request->edit;
            $editingValue->save();
        }

        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'Calender Assesment Period Activated');
        return back();

    }
}
