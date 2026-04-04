<?php
 
use App\Http\Controllers\UserController;
 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
 use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

Route::post('createProject',[ProjectsController::class, 'createProject']);
Route::put('UpdateUser',[ProfileController::class, 'UpdateUser']);
Route::post('store',[ProfileController::class, 'store']);
Route::get('getAllProject',[UserController::class, 'getAllProject']);
});
Route::get('login',[UserController::class, 'login']);
Route::post('createUser',[UserController::class, 'createUser']);
Route::get('showAllProjects',[ProjectsController::class, 'showAllProjects']);
Route::get('allProfiles',[ProfileController::class, 'allProfiles']);