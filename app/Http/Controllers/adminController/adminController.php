<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use App\Http\Requests\SubmittingPerspetive;
use App\Http\Requests\validatingSubmittedData;
class adminController extends Controller
{
    public function addingANewProgramstep0(){
        $programs = Program::all();
        return view('adminPages\addingNewProgramStep0',['programs'=>$programs]);
    }
    public function addingANewProgramstep1(){
        $programs = Program::all();
        return view('adminPages\addingNewProgramStep1',['programs'=>$programs]);
    }
    public function submittingProgramDetails(validatingSubmittedData $request){
        $programs = Program::all();
            $name = $request->name;
            $description = $request->description;
            $progamShortHand = $request->progamShortHand;
            $progamCode = $request->progamCode;
            $color = $request->color;
            $image = $request->image;
            // dd($image);

            $uploadLocation = "null";
            if ($request->hasFile('image')) {        
                $fileFullName = $request->image->getClientOriginalName();         
                $fileNameWithoutExtension = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
                // !getting the file extension.
                $extension = substr($fileFullName, strlen($fileNameWithoutExtension));
                //!creating the new name of the file by adding the timestamp. 
                $newName = $fileNameWithoutExtension . time() .$extension;
                $request->image->storeAs('public/images', $newName); 
            } else {
                $newName = "N/A";
            }
            
            //!this section of the code will be responsible for the submission of data into the database.
            $newProram = new Program(
                                        array(
                                            'name'=>$name,
                                            'description'=>$description,
                                            'shortHand'=>$progamShortHand,
                                            'programCode'=>$progamCode,
                                            'colorCode'=>$color,
                                            'imageLocation'=>$newName
                                        )
            );

            // dd($progamShortHand);
            $newProram->save();

        return view('adminPages\addingNewProgramStep2',['programs'=>$programs,'name'=>$name,'progamShortHand'=>$progamShortHand,'progamCode'=>$progamCode]);
    }
    public function submittingPerspectives(SubmittingPerspetive $request){

        return "name";
    }
}
