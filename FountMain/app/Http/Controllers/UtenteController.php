<?php

namespace App\Http\Controllers;

use App\Models\Utente; //Modello utente in Utente.php
use App\Http\Controllers\Controller;    //Controller base di Laravel
use Illuminate\Http\Request;    //Usato in store() per le richieste HTTP

class UtenteController extends Controller
{
    //Se si inserisce nel motore di ricerca "localhost/.../public/utenti" si ottiene di default...
    public function index()
    {
        //Tutti gli utenti dalla tabella utenti nel DB fountmain, tutto nel modello Utente.php -> classe Utente
        return response()->json(Utente::all());
    }

    public function store(Request $request)
    {
        $utente = Utente::create($request->except('_token'));
        return response()->json($utente, 201);
    }
}
 