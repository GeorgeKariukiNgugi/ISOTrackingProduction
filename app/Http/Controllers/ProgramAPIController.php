<?php

namespace App\Http\Controllers;

use App\Program;
use App\Http\Resources\ProgramCollection;
use App\Http\Resources\ProgramResource;
 
class ProgramAPIController extends Controller
{
    public function index()
    {
        return new ProgramCollection(Program::paginate());
    }
 
    public function show(Program $program)
    {
        return new ProgramResource($program->load(['perspectives', 'nonConformities']));
    }

    public function store(Request $request)
    {
        return new ProgramResource(Program::create($request->all()));
    }

    public function update(Request $request, Program $program)
    {
        $program->update($request->all());

        return new ProgramResource($program);
    }

    public function destroy(Request $request, Program $program)
    {
        $program->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
