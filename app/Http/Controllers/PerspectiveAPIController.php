<?php

namespace App\Http\Controllers;

use App\Perspective;
use App\Http\Resources\PerspectiveCollection;
use App\Http\Resources\PerspectiveResource;
 
class PerspectiveAPIController extends Controller
{
    public function index()
    {
        return new PerspectiveCollection(Perspective::paginate());
    }
 
    public function show(Perspective $perspective)
    {
        return new PerspectiveResource($perspective->load(['strategicObjectives', 'keyPerfomaceIndicators', 'strategicObjectiveScores', 'nonConformities', 'program']));
    }

    public function store(Request $request)
    {
        return new PerspectiveResource(Perspective::create($request->all()));
    }

    public function update(Request $request, Perspective $perspective)
    {
        $perspective->update($request->all());

        return new PerspectiveResource($perspective);
    }

    public function destroy(Request $request, Perspective $perspective)
    {
        $perspective->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
