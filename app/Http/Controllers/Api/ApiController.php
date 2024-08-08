<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\attraction;
use App\Models\comment;
use App\Models\specie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function listSpecie()
    {
        return specie::all();
    }

    public function storeComment(Request $request)
    {
        $Comment = comment::create($request->all());
        return response()->json($Comment);
    }

    public function getSpeciebyAttraction(attraction $attraction)
    {
        $specie = specie::find($attraction->species_id);
        return response()->json($specie);
    }

    public function updateAttraction(Request $request, $id)
    {
        $attraction = attraction::find($id);
        $attraction->update($request->all());
        return response()->json($attraction);
    }
}
