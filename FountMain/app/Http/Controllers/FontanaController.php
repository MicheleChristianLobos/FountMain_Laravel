<?php

namespace App\Http\Controllers;

use App\Models\Fontana;
use App\Http\Controllers\Controller;    //Controller base di Laravel
use Illuminate\Http\Request;    //Usato in store() per le richieste HTTP

class FontanaController extends Controller
{
    public function store(Request $request)
    {
            $exists = Fontana::where('lat', $request->lat)
                            ->where('lon', $request->long)
                            ->exists();

            if (!$exists) {
                Fontana::create($request->only(['nome', 'lat', 'lon', 'img']));
                return response()->json(['status' => 'added']);
            } else {
                return response()->json(['status' => 'already_exists']);
            }
    }
}


