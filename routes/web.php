<?php

use App\Http\Controllers\APIController;
use App\Models\Episode;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

// Az 'home' útvonalon érkező kérés kezelése
Route::get('/', function () {

    // Az 'episode' modell alapján elkészítjük a 'list' nézetet és átadjuk a 'list' változót a nézetnek
    $ob = Request::get('ob');
    $ad = Request::get('ad');

    $from = Request::get('from');
    $to = Request::get('to');

    if ($ob)
        in_array($ob, ['id', 'name', 'created'])
            or abort(403);

    if ($ad)
        in_array($ad, ['asc', 'desc'])
            or abort(403);

    $list = Episode::where(function ($query) use ($from, $to) {

        if ($from)
            $query->where("created", ">=", $from . " 00:00:00");
        if ($to)
            $query->where("created", "<=", $to . " 23:59:59");
    })->orderBy(
        $ob  ? $ob : 'id',
        $ad  ? $ad : 'asc'
    )
        // Az eredmények oldalankénti megjelenítéséhez 'pagination' beállítása, és a felhasználói keresési paraméterek megtartása
        ->paginate(10)->withQueryString();

    return view('list', compact("list"));
})->name('home');

// Az 'sync' útvonalon érkező kérés kezelése
Route::post('/sync', [APIController::class, 'sync'])->name('sync');

// Az 'episode' útvonalon érkező kérés kezelése
Route::get('/characters/{episode}', function (Episode $episode) {
    // Az 'episode' modell alapján elkészítjük a 'episode' nézetet és átadjuk a 'episode' változót a nézetnek
    return view('episode', compact("episode"));
})->name('characters');
