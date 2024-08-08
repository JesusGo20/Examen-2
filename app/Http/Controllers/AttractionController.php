<?php

namespace App\Http\Controllers;

use App\Models\attraction;
use App\Models\specie;
use Illuminate\Http\Request;


class AttractionController extends Controller
{
    //
    public function index()
    {
        $attractions = Attraction::with('comments')
            ->get()
            ->map(function ($attraction) {
                $attraction->calificacion_promedio = $attraction->comments->avg('calificacion');
                return $attraction;
            });

        return view('attractions.index', compact('attractions'));
    }

    public function cantidadComentarios($attractionId)
    {
        $cantidad = Attraction::findOrFail($attractionId)->comments()->count();
        return view('attractions.cantidad_comentarios', compact('cantidad'));
    }

    public function atraccionesPorEspecie($speciesId)
    {
        $attractions = Attraction::where('species_id', $speciesId)->get();
        return view('attractions.por_especie', compact('attractions'));
    }

    public function calificacionPromedioPorEspecie($speciesId)
    {
        $calificacionPromedio = Attraction::where('species_id', $speciesId)
            ->with('comments')
            ->get()
            ->pluck('comments')
            ->flatten()
            ->avg('calificacion');

        return view('attractions.calificacion_promedio', compact('calificacionPromedio'));
    }
}
