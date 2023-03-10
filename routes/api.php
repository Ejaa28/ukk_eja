<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/tipe_kamar",[App\Http\Controllers\TipeKamarController::class, 'store']);
Route::put("/tipe_kamar/{id}",[App\Http\Controllers\TipeKamarController::class, 'update']);
Route::delete("/tipe_kamar/{id}",[App\Http\Controllers\TipeKamarController::class, 'delete']);
Route::get("/tipe_kamar",[App\Http\Controllers\TipeKamarController::class, 'show']);
Route::get("/tipe_kamar/{id}",[App\Http\Controllers\TipeKamarController::class, 'detail']);

Route::post("/kamar",[App\Http\Controllers\KamarController::class, 'store']);
Route::put("/kamar/{id}",[App\Http\Controllers\KamarController::class, 'update']);
Route::delete("/kamar/{id}",[App\Http\Controllers\KamarController::class, 'delete']);
Route::get("/kamar",[App\Http\Controllers\KamarController::class, 'show']);
Route::get("/kamar/{id}",[App\Http\Controllers\KamarController::class, 'detail']);

Route::post("/pemesanan",[App\Http\Controllers\PemesananController::class, 'store']);
Route::put("/pemesanan/{id}",[App\Http\Controllers\PemesananController::class, 'update']);
Route::delete("/pemesanan/{id}",[App\Http\Controllers\PemesananController::class, 'delete']);
Route::get("/pemesanan",[App\Http\Controllers\PemesananController::class, 'show']);
Route::get("/pemesanan/{id}",[App\Http\Controllers\PemesananController::class, 'detail']);

Route::post("/detail_pemesanan",[App\Http\Controllers\DetailPemesananController::class, 'store']);
Route::put("/detail_pemesanan/{id}",[App\Http\Controllers\DetailPemesananController::class, 'update']);
Route::delete("/detail_pemesanan/{id}",[App\Http\Controllers\DetailPemesananController::class, 'delete']);
Route::get("/detail_pemesanan",[App\Http\Controllers\DetailPemesananController::class, 'show']);
Route::get("/detail_pemesanan/{id}",[App\Http\Controllers\DetailPemesananController::class, 'detail']);