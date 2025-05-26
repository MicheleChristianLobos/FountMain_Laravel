<?php

use Illuminate\Support\Facades\Route;

/*I percorsi sono indicati a /FountMain/FountMain/public/resources/views/...*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('registration');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/map', function () {
    return view('map');
});

use App\Http\Controllers\UtenteController;

Route::get('/utenti', [UtenteController::class, 'index']);

Route::post('/utenti', [UtenteController::class, 'store']);