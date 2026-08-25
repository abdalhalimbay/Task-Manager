<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('tasks',[TaskController::class,'store']);
// Route::get('tasks',[TaskController::class,'index']);
// Route::put('tasks/{id}',[TaskController::class,'update']);
// Route::get('tasks/{id}',[TaskController::class,'show']);    
// Route::delete('tasks/{id}',[TaskController::class,'destroy']); 
//j

Route::apiResource('tasks',TaskController::class);

Route::post('profile',[ProfileController::class,'store']);
Route::post('category',[CategoryController::class,'store']);
Route::post('users',[UserController::class,'store']);
Route::get('users',[UserController::class,'index']);
Route::get('profile/{user_id}',[ProfileController::class,'show']);
Route::get('user/{id}/profile',[UserController::class,'getProfile']);
Route::put('profile/{user_id}',[ProfileController::class,'update']);
Route::get('user/{id}/tasks',[UserController::class,'getUserTasks']);
Route::get('tasks/{id}/user',[TaskController::class,'getUserId']);

Route::post('tasks/{task_id}/categories',[TaskController::class,'addCategoriesToTask']);

Route::get('task/{task_id}/categories',[TaskController::class,'getTaskCategories']);
Route::get('category/{category_id}/tasks',[CategoryController::class,'getCategoriesTask']);

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
Route::get('user',function(Request $request){
return $request->user();
})->middleware('auth:sanctum');