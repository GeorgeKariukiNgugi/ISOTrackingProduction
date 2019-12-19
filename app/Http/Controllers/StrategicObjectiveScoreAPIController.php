<?php

namespace App\Http\Controllers;

use App\StrategicObjectiveScore;
use App\Http\Resources\StrategicObjectiveScoreCollection;
use App\Http\Resources\StrategicObjectiveScoreResource;
 
class StrategicObjectiveScoreAPIController extends Controller
{
    public function index()
    {
        return new StrategicObjectiveScoreCollection(StrategicObjectiveScore::paginate());
    }
 
    public function show(StrategicObjectiveScore $strategicObjectiveScore)
    {
        return new StrategicObjectiveScoreResource($strategicObjectiveScore->load(['perspective', 'strategicObjectiveScore']));
    }

    public function store(Request $request)
    {
        return new StrategicObjectiveScoreResource(StrategicObjectiveScore::create($request->all()));
    }

    public function update(Request $request, StrategicObjectiveScore $strategicObjectiveScore)
    {
        $strategicObjectiveScore->update($request->all());

        return new StrategicObjectiveScoreResource($strategicObjectiveScore);
    }

    public function destroy(Request $request, StrategicObjectiveScore $strategicObjectiveScore)
    {
        $strategicObjectiveScore->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
