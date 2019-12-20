<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Program;
use App\AssesorPerProgram;
use App\Http\Requests\deletingProgram;
use App\Http\Requests\editingProgram;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class programDetails extends Controller
{
    public function viewingTheProgramDetails($id){
        $programs = Program::all();
        return view('adminPage.programDetails',['programs'=>$programs,'id'=>$id]);
    }

    public function deleteProgram(deletingProgram $request){

        $programId = $request->programId;

        $deletingPrograms = Program::where('id','=',$programId)->get();
        foreach($deletingPrograms as $deletingProgram){
            //!first get the program perspectives.
            $perspectives = $deletingProgram->perspectives;

            foreach ($perspectives as $perspective) {
                # code...
                $strategicObjectives = $perspective->strategicObjectives;
                //!getting the kpi.
                foreach($strategicObjectives as $strategicObjective){

                   $kpis =  $strategicObjectives->keyPerfomaceIndicators;

                   foreach ($kpis as $kpi) {
                       # code...
                       //delete the kpi physically.
                       $kpi->delete();

                   }
                   $strategicObjective->delete();
                }
                $perspective->delete();
            }
            $deletingProgram->delete();
        }

        //!deleting the assesors that asses the program.
        $assesorToBeDeleted = AssesorPerProgram::where('program_id','=',$programId)->get();

        foreach($assesorToBeDeleted as $assesor){

            $assesor->delete();
        }

        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'The Program Has Successfully Been Deleted.');

        return redirect('/home');
    }

    public function editProgram(editingProgram $request){

        // return "editing The program.";
        //!getting the data of the edited program.
        $programId = $request->programId;

        $programSelected = Program::where('id','=',$programId)->get();

        foreach ($programSelected as $program) {
            $program->name = $request->programName;
            $program->shortHand = $request->programShortHand;
            $program->programCode = $request->programCode;
            $program->description = $request->programDescription;

            $program->save();            
        }
        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'You Have Successfully Edited The Program.');
    return back();
    }
    
}
