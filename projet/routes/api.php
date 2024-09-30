<?php

use App\Http\Controllers\Api\CarnetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/carnet", [CarnetController::class, 'index']);
Route::post("/carnet/create", [CarnetController::class, 'Ajouter']);
Route::put("/carnet/edit/{post}", [CarnetController::class, 'Modifier']);
Route::delete("/carnet/delete/{post}", [CarnetController::class, 'Supprimer']);
