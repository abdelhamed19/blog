<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('posts',PostController::class);
    
    Route::get('/comments/{id}',[CommentController::class,'show']);
    Route::post('/comments',[CommentController::class,'store']);
    Route::put('/comments/{id}',[CommentController::class,'update']);
    Route::delete('/comments/{id}',[CommentController::class,'destroy']);
});
