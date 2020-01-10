<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\AssesorPerProgram;
// use App\submittingEmail;
use App\Perspective;
use App\Http\Requests\SubmittingPerspetive;
use App\Http\Requests\validatingSubmittedData;
use App\Http\Requests\submittingEmail;
class adminController extends Controller
{
    public function addingANewProgramstep0(){
        $programs = Program::all();
        return view('adminPage.addingNewProgramStep0',['programs'=>$programs]);
    }
    public function addingANewProgramstep1(){
        $programs = Program::all();
        return view('adminPage.addingNewProgramStep1',['programs'=>$programs]);
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
            // $newProram = new Program(
            //                             array(
            //                                 'name'=>$name,
            //                                 'description'=>$description,
            //                                 'shortHand'=>$progamShortHand,
            //                                 'programCode'=>$progamCode,
            //                                 'colorCode'=>$color,
            //                                 'imageLocation'=>$newName
            //                             )
            // );
            // $newProram->save();
            $programDetailsArray = array();
            array_push($programDetailsArray,$name);
            array_push($programDetailsArray,$description);
            array_push($programDetailsArray,$progamShortHand);
            array_push($programDetailsArray,$progamCode);
            array_push($programDetailsArray,$color);
            array_push($programDetailsArray,$newName);
            // $programDetailsArray = 22;
            //! getting the last inserted data in the table.  


            $lastIds = Program::where('shortHand','=',$progamShortHand)->get();
            $id = null;
            foreach($lastIds as $lastId){
                $id = $lastId->id;
            }
            

            $unmetWeight = 0;
            $numbersSubmitted = 1;
            $sumOfWeight = 0;
        return view('adminPage.addingNewProgramStep2',['programDetailsArray'=>$programDetailsArray,'programs'=>$programs,'sumOfWeight'=>$sumOfWeight,'numbersSubmitted'=>$numbersSubmitted,'unmetWeight'=>$unmetWeight,'id'=>$id,'name'=>$name,'progamShortHand'=>$progamShortHand,'progamCode'=>$progamCode]);
    }
    public function submittingPerspectives(SubmittingPerspetive $request){

        // dd($request->newProgramDetails);()
        //! to submit the data that has been presented we hould first get the type of radioi button that has been submitted.

        $perspective = $request->perspective;

        //! id and shorthand of program 
        $id = $request->programId;
        $shortHand = $request->shorthand;
        if($perspective == 'primitive'){
            //! if the radio button submitted has a value of primitive, then we just get the weights based that it has. 

            $financial =  $request->perspectivePrimitivef;
            $customer =  $request->perspectivePrimitivec;
            $learningAndgrowth = $request->perspectivePrimitivelg;
            $internalBusiness =  $request->perspectivePrimitiveib;

            $sumOfWeight = $financial+$customer+$learningAndgrowth+$internalBusiness;

            if($sumOfWeight < 100 OR $sumOfWeight > 100){
                $lastIds = Program::where('shortHand','=',$request->shorthand)->get();
                $id = null;
                foreach($lastIds as $lastId){
                    $id = $lastId->id;
                }
                $programs = Program::all();
                $sumOfWeight = 0;
                return view('adminPage.addingNewProgramStep2',['programs'=>$programs,'sumOfWeight'=>$sumOfWeight,'unmetWeight'=>$sumOfWeight,'id'=>$id,'name'=>$request->name,'progamShortHand'=>$request->shorthand,'progamCode'=>$request->code]);
            }
            $perspectives = array();
            // dd($id);
            //!pushing data to array for easier insertion. 
            // $newProgramDetails

            $newProram = new Program(
                                        array(
                                            'name'=>$request->newProgramDetails[0],
                                            'description'=>$request->newProgramDetails[1],
                                            'shortHand'=>$request->newProgramDetails[2],
                                            'programCode'=>$request->newProgramDetails[3],
                                            'colorCode'=>$request->newProgramDetails[4],
                                            'imageLocation'=>$request->newProgramDetails[5]
                                        )
            );
            $newProram->save();

            array_push($perspectives,$financial);
            array_push($perspectives, $shortHand.'_'.'financial_perspective');
            array_push($perspectives,1);
            array_push($perspectives,$customer);
            array_push($perspectives, $shortHand.'_'.'customer_perspective');
            array_push($perspectives,2);
            array_push($perspectives,$learningAndgrowth );
            array_push($perspectives, $shortHand.'_'.'learning_and_growth_perspective');
            array_push($perspectives,3);
            array_push($perspectives,$internalBusiness);
            array_push($perspectives, $shortHand.'_'.'internal_business_process_perspective');
            array_push($perspectives,4);

            $lastIds = Program::where('shortHand','=',$request->newProgramDetails[2])->get();
            $id = null;
            foreach($lastIds as $lastId){
                $id = $lastId->id;
            }
                # code...
                for ($i=0; $i <count($perspectives) ; $i+=3) { 
                    # code...
                    $insertingPerspective = new Perspective(

                        array(
                            'name'=>$perspectives[$i+1],
                            'weight'=>$perspectives[$i], 
                            'perspective_group'=>$perspectives[$i+2],
                            'program_id'=>$id,
                        )
                    );
                    $insertingPerspective->save();
                }
                $programs = Program::all();
                return view('adminPage.addingNewProgramStep3',['programs'=>$programs,'id'=>$id,'name'=>$request->name,'progamShortHand'=>$request->shorthand,'progamCode'=>$request->code]);
        }
        elseif($perspective == 'custom'){

            $numbersSubmitted = $request->numberOfCustomPersectives;

            if($numbersSubmitted == 0){

                $numbersSubmitted = 0;
                $lastIds = Program::where('shortHand','=',$request->shorthand)->get();
                $id = null;
                foreach($lastIds as $lastId){
                    $id = $lastId->id;
                }
                $programs = Program::all();
                $unmetWeight = 0;
                $sumOfWeight = 0;
                return view('adminPage.addingNewProgramStep2',['programs'=>$programs,'sumOfWeight'=>$sumOfWeight,'unmetWeight'=>$unmetWeight,'numbersSubmitted'=>$numbersSubmitted,'id'=>$id,'name'=>$request->name,'progamShortHand'=>$request->shorthand,'progamCode'=>$request->code]);
            }
            else{

                //!the first step is to check if the weihts all add up to 100 before moving on.
                $sumOfWeight=0;
                for ($i=1; $i < $numbersSubmitted+1 ; $i++) { 
                    $name = 'customweight'.$i;
                    $sumOfWeight+= $request->$name;
                }
                // dd($numbersSubmitted+1);
                // dd($sumOfWeight);
                if ($sumOfWeight < 100 OR $sumOfWeight > 100) {
                    # code...
                    $programs = Program::all();
                    $unmetWeight = 0;
                    return view('adminPage.addingNewProgramStep2',['programs'=>$programs,'sumOfWeight'=>$sumOfWeight,'unmetWeight'=>$unmetWeight,'numbersSubmitted'=>$numbersSubmitted,'id'=>$id,'name'=>$request->name,'progamShortHand'=>$request->shorthand,'progamCode'=>$request->code]);
                } else {

                    // dd($id);
                    $perspectivesAlreadyInserted = Perspective::all();
                    $numberOfPerspectives = count($perspectivesAlreadyInserted);
                    for ($i=1; $i < $numbersSubmitted+1 ; $i++) { 
                        $weightname = 'customweight'.$i;
                        $perspectiveNamename = 'customname'.$i;
                         $request->$weightname;
                         $programShortHands = Program::where('id','=',$id)->get();
                         foreach($programShortHands as $programShortHand){
                            $shortHand = $programShortHand->shortHand ;
                         }
                         $newProram = new Program(
                            array(
                                'name'=>$request->newProgramDetails[0],
                                'description'=>$request->newProgramDetails[1],
                                'shortHand'=>$request->newProgramDetails[2],
                                'programCode'=>$request->newProgramDetails[3],
                                'colorCode'=>$request->newProgramDetails[4],
                                'imageLocation'=>$request->newProgramDetails[5]
                            )
                        );
                        $newProram->save();
                        $lastIds = Program::where('shortHand','=',$request->newProgramDetails[2])->get();
            $id = null;
            foreach($lastIds as $lastId){
                $id = $lastId->id;
            }
                         $insertingPerspective = new Perspective(

                            //! getting the shorthand of the program that has been inserted latest. 
                            
                            array(
                                'name'=> $shortHand.'_'.$request->$perspectiveNamename,
                                'weight'=>$request->$weightname, 
                                'program_id'=>$id,
                                'perspective_group'=>++$numberOfPerspectives
                            )
                        );
                        $insertingPerspective->save();

                    }
                    $programs = Program::all();
                    return view('adminPage.addingNewProgramStep3',['programs'=>$programs,'id'=>$id,'name'=>$request->name,'progamShortHand'=>$request->shorthand,'progamCode'=>$request->code]);

                }
                
            }

        }

        return $request->numberOfCustomPersectives."  ".$request->customname1."  ".$request->customweight1;
    }

    public function submittingEmailAddress(submittingEmail $request){

        //!getting the program is by seectinf all the id and sorting them in descending and limiting to 1

        $lastIds = Program::where('id','>',0)->orderBy('id', 'desc')->limit(1)->get();

        foreach($lastIds as $lastId){
            $id = $lastId->id;
        }

        // dd($id);

        $asesor = new AssesorPerProgram(
            array(
                'email'=>$request->email,
                'program_id'=>$id,
            )
        );
        $asesor->save();

        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'You Have Added A New Program');

        return redirect('/home');
        

    }
}
