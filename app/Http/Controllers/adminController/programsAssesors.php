<?php

namespace App\Http\Controllers\adminController;
use App\Program;
use App\Http\Requests\DeletingAssesor;
use App\AssesorPerProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\editingAssesor;
use App\Http\Requests\addingAssesor;
use RealRashid\SweetAlert\Facades\Alert;
class programsAssesors extends Controller
{
    public function displayingProgramsAssesors(){
        $programs = Program::all();
        $assesors = array();
        $assesorPerPrograms = AssesorPerProgram::all();
        $programDetails = array();
        foreach ($assesorPerPrograms as $assesorPerProgram) {
            # code...
            $userEmail = $assesorPerProgram->email;
            $program_ids = Program::where('id','=',$assesorPerProgram->program_id)->get();

            if ($assesorPerProgram->program_id == 0) {
                # code...
                $name =  'Admin';
                $code = 'Admin';

                
            } else {
                # code...
                foreach($program_ids as $program_id){
                
                    $name =$program_id->shortHand;
                    $code = $program_id->programCode;

            }
            }
            array_push($programDetails,$name);
            array_push($programDetails,$code);
            array_push($programDetails,$userEmail);
            array_push($programDetails,$assesorPerProgram->id);
        }
        return view('adminPage.assesors',['programs'=>$programs,'programDetails'=>$programDetails]);
    }

    public function deletingAssesor(DeletingAssesor $request){

        

        $deletingAssesors = AssesorPerProgram::where('id','=',$request->asesorId)->get();        
        foreach($deletingAssesors as $deletingAssesor){            
            $deletingAssesor->delete();
        }

        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'Succesfully Deleted An Assesor.');

        return back();
    }

    public function editingAnAssesor(editingAssesor $request){
        $email = $request->email;
        $program = $request->program;
        $assesorId = $request->assesorId;
        //! checking to see if both the fields are empty so that no action can be done.

        if ($email == null AND $program == 0) {
            Alert::info(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'No Action Has Been Perfomed On The Assesor.');
            return back();
        } elseif($email != null AND $program == 0) {
            # code...
            $editingAssesors = AssesorPerProgram::where('id','=',$assesorId)->get();
            foreach ($editingAssesors as $editingAssesor) {
                # code...
                $editingAssesor->email = $email;
                $editingAssesor->save();
                Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'Email Ha Been Edited.');
                return back();
            }
        }
        else {
            $editingAssesors = AssesorPerProgram::where('id','=',$assesorId)->get();
            foreach ($editingAssesors as $editingAssesor) {
                # code...
                $editingAssesor->email = $email;
                $editingAssesor->program_id = $program;
                $editingAssesor->save();
                Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'User Ha Successfully Been Edited.');
                return back();
            }
        }
    }

    public function addingAssesor(addingAssesor $request){

        $email = $request->email;
        $program = $request ->program;

        $newAssesor = new AssesorPerProgram(
                        array(
                            'email'=>$email,
                            'program_id'=>$program
                        )
        );
        $newAssesor->save();
        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'New User Has Been Added');
        return back();

    }
}
