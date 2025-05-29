<?php

namespace App\Http\Controllers;

use App\Models\Fontana;
use App\Http\Controllers\Controller;    //Controller base di Laravel
use Illuminate\Http\Request;    //Usato in store() per le richieste HTTP

class FontanaController extends Controller
{
    public function store(Request $request)
    {
        try {
            $exists = Fontana::where('lat', $request->lat)
                            ->where('lon', $request->lon)
                            ->exists();

            if (!$exists) {
                Fontana::create($request->only(['nome', 'lat', 'lon', 'img']));
                return response()->json(['status' => 'added']);
            } else {
                return response()->json(['status' => 'already_exists']);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Errore chiave duplicata
                return response()->json(['status' => 'already_exists', 'message' => 'Fontana già presente nel database!']);
            }
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function rinomina(Request $request)
    {
        $lat = round(floatval($request->lat), 6);
        $lon = round(floatval($request->lon), 6);

        $fontana = Fontana::whereRaw('ROUND(lat,6) = ?', [$lat])
                          ->whereRaw('ROUND(lon,6) = ?', [$lon])
                          ->first();

        if ($fontana) {
            $fontana->nome = $request->nome;
            $fontana->save();
            return response()->json(['status' => 'ok']);
        } else {
            return response()->json(['status' => 'not_found', 'message' => 'Fontana non trovata']);
        }
    }

    public function list()
    {
        return response()->json(Fontana::all());
    }

    public function aggiornaImmagine(Request $request)
    {
        $lat = round(floatval($request->lat), 6);
        $lon = round(floatval($request->lon), 6);

        $fontana = Fontana::whereRaw('ROUND(lat,6) = ?', [$lat])
                          ->whereRaw('ROUND(lon,6) = ?', [$lon])
                          ->first();

        if ($fontana) {
            if (!$request->img) {
                return response()->json(['status' => 'error', 'message' => 'Nessuna immagine inviata'], 400);
            }
            $fontana->img = $request->img;
            $fontana->save();
            return response()->json(['status' => 'ok']);
        } else {
            return response()->json(['status' => 'not_found', 'message' => 'Fontana non trovata']);
        }
    }
}


