<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrenoriController;
use App\Http\Controllers\JucatorController;
use App\Http\Controllers\StadionController;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\ClubController;
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
    return view('index');
});

Route::get('/antrenor/create', [AntrenoriController::class, 'create']);
Route::get('/antrenor', [AntrenoriController::class, 'index']);
Route::post('/antrenor/store', [AntrenoriController::class, 'store']);
Route::get('antrenor/delete/{id}',[AntrenoriController::class,'destroy']);
Route::get('antrenor/edit/{id}',[AntrenoriController::class,'edit']);
Route::post('antrenor/update/{id}',[AntrenoriController::class,'update']);

Route::get('antrenor/sort/{criteria}',[AntrenoriController::class,'sort'])->name('antrenor.sort');
Route::get('/groupByCertificare', [AntrenoriController::class, 'groupByCertificare'])->name('antrenor.groupByCertificare');

Route::get('jucator/create', [JucatorController::class, 'create']);
Route::post('jucator/store', [JucatorController::class, 'store']);
Route::get('jucator/delete/{id}',[JucatorController::class,'destroy']);
Route::get('jucator/edit/{id}',[JucatorController::class,'edit']);
Route::post('jucator/update/{id}',[JucatorController::class,'update']);
Route::get('jucator/',[JucatorController::class,'index']);

Route::get('jucator/sort/{criteria}',[JucatorController::class,'sort'])->name('jucator.sort');
Route::get('jucator/groupByAll}',[JucatorController::class,'groupByAll'])->name('jucator.groupByAll');

Route::get('/club/create', [ClubController::class, 'create']);
Route::post('/club/store', [ClubController::class, 'store']);
Route::get('club/delete/{id}',[ClubController::class,'destroy']);
Route::get('club/edit/{id}',[ClubController::class,'edit']);
Route::post('club/update/{id}',[ClubController::class,'update']);
Route::get('club/',[ClubController::class,'index']);

Route::get('club/sort/{criteria}',[ClubController::class,'sort'])->name('club.sort');
Route::get('club/sumaClubs/',[ClubController::class,'sumaClubs'])->name('club.sumaClubs');
Route::get('club/infoClub/{id}',[ClubController::class,'infoClub'])->name('club.infoClub');



Route::get('/liga/create', [LigaController::class, 'create']);
Route::post('/liga/store', [LigaController::class, 'store']);
Route::get('liga/delete/{id}',[LigaController::class,'destroy']);
Route::get('liga/edit/{id}',[LigaController::class,'edit']);
Route::post('liga/update/{id}',[LigaController::class,'update']);
Route::get('liga/',[LigaController::class,'index']);

Route::get('liga/sort/{criteria}',[LigaController::class,'sort'])->name('liga.sort');
Route::get('liga/groupByAllLiga}',[LigaController::class,'groupByAllLiga'])->name('liga.groupByAllLiga');

Route::get('stadion/create', [StadionController::class, 'create']);
Route::post('stadion/store', [StadionController::class, 'store']);
Route::get('stadion/delete/{id}',[StadionController::class,'destroy']);
Route::get('stadion/edit/{id}',[StadionController::class,'edit']);
Route::post('stadion/update/{id}',[StadionController::class,'update']);
Route::get('stadion/',[StadionController::class,'index']);

Route::get('stadion/sort/{criteria}',[StadionController::class,'sort'])->name('stadion.sort');
Route::get('stadion/groupByAllStadion}',[StadionController::class,'groupByAllStadion'])->name('stadion.groupByAllStadion');
