<?php

namespace App\Http\Controllers;

use App\KeyPerfomanceIndicatorScore;
use App\Http\Resources\KeyPerfomanceIndicatorScoreCollection;
use App\Http\Resources\KeyPerfomanceIndicatorScoreResource;
 
class KeyPerfomanceIndicatorScoreAPIController extends Controller
{
    public function index()
    {
        return new KeyPerfomanceIndicatorScoreCollection(KeyPerfomanceIndicatorScore::paginate());
    }
 
    public function show(KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        return new KeyPerfomanceIndicatorScoreResource($keyPerfomanceIndicatorScore->load([]));
    }

    public function store(Request $request)
    {
        return new KeyPerfomanceIndicatorScoreResource(KeyPerfomanceIndicatorScore::create($request->all()));
    }

    public function update(Request $request, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        $keyPerfomanceIndicatorScore->update($request->all());

        return new KeyPerfomanceIndicatorScoreResource($keyPerfomanceIndicatorScore);
    }

    public function destroy(Request $request, KeyPerfomanceIndicatorScore $keyPerfomanceIndicatorScore)
    {
        $keyPerfomanceIndicatorScore->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
