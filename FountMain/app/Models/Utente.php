<?php

namespace App\Models; // <--- AGGIUNGI QUESTA RIGA

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    use HasFactory;

    protected $table = 'utenti';   //Tabella utenti del database (obbligatorio da Laravel mettere il nome $table, sennò non funziona).
    protected $fillable = ['nome', 'cognome', 'email', 'password'];

    public $timestamps = false;
}

/*
Creato con php artisan make:model Utente -m

Artisan: Una CLI di Laravel che semplifica ad esempio la creazione di file standard
automaticamente senza dover produrli manualmente
*/