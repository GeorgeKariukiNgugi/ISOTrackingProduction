<?php

namespace App\Http\Controllers;

use App\StrategicObjective;
use App\Http\Resources\StrategicObjectiveCollection;
use App\Http\Resources\StrategicObjectiveResource;
 
class StrategicObjectiveAPIController extends Controller
{
    public function index()
    {
        return new StrategicObjectiveCollection(StrategicObjective::paginate());
    }
 
    public function show(StrategicObjective $strategicObjective)
    {
        return new StrategicObjectiveResource($strategicObjective->load(['keyPerfomaceIndicators', 'keyPerfomanceIndicatorScores', 'strategicObjectiveScores', 'nonConformities', 'perspective']));
    }

    public function store(Request $request)
    {
        return new StrategicObjectiveResource(StrategicObjective::create($request->all()));
    }

    public function update(Request $request, StrategicObjective $strategicObjective)
    {
        $strategicObjective->update($request->all());

        return new StrategicObjectiveResource($strategicObjective);
    }

    public function destroy(Request $request, StrategicObjective $strategicObjective)
    {
        $strategicObjective->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
