<?php

namespace App\Http\Controllers;

use App\NonConformities;
use App\Http\Resources\NonConformitiesCollection;
use App\Http\Resources\NonConformitiesResource;
 
class NonConformitiesAPIController extends Controller
{
    public function index()
    {
        return new NonConformitiesCollection(NonConformities::paginate());
    }
 
    public function show(NonConformities $nonConformities)
    {
        return new NonConformitiesResource($nonConformities->load(['program', 'perspective', 'keyPerfomaceIndicator', 'strategicObjective']));
    }

    public function store(Request $request)
    {
        return new NonConformitiesResource(NonConformities::create($request->all()));
    }

    public function update(Request $request, NonConformities $nonConformities)
    {
        $nonConformities->update($request->all());

        return new NonConformitiesResource($nonConformities);
    }

    public function destroy(Request $request, NonConformities $nonConformities)
    {
        $nonConformities->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
