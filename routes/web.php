<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});
Route::get('/showprod',[ProfileController::class,'showprodact'])->name('showprod');
