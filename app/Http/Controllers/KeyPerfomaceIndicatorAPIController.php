<?php

namespace App\Http\Controllers;

use App\KeyPerfomaceIndicator;
use App\Http\Resources\KeyPerfomaceIndicatorCollection;
use App\Http\Resources\KeyPerfomaceIndicatorResource;
 
class KeyPerfomaceIndicatorAPIController extends Controller
{
    public function index()
    {
        return new KeyPerfomaceIndicatorCollection(KeyPerfomaceIndicator::paginate());
    }
 
    public function show(KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        return new KeyPerfomaceIndicatorResource($keyPerfomaceIndicator->load(['scoresRecordeds', 'keyPerfomanceIndicatorScores', 'nonConformities', 'perspective', 'strategicObjective']));
    }

    public function store(Request $request)
    {
        return new KeyPerfomaceIndicatorResource(KeyPerfomaceIndicator::create($request->all()));
    }

    public function update(Request $request, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        $keyPerfomaceIndicator->update($request->all());

        return new KeyPerfomaceIndicatorResource($keyPerfomaceIndicator);
    }

    public function destroy(Request $request, KeyPerfomaceIndicator $keyPerfomaceIndicator)
    {
        $keyPerfomaceIndicator->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
