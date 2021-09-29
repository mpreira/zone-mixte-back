<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//sports
Route::middleware(['cors'])->get('/sports', [\App\Http\Controllers\ApiController::class, 'listSports']);
Route::middleware(['cors'])->get('/sports/{id}', [\App\Http\Controllers\ApiController::class, 'uniqueSport']);

//articles
Route::middleware(['cors'])->get('/articles', [\App\Http\Controllers\ApiController::class, 'listArticles']);
Route::middleware(['cors'])->get('/articles/{id}', [\App\Http\Controllers\ApiController::class, 'uniqueArticle']);

//videos
Route::middleware(['cors'])->get('/videos', [App\Http\Controllers\ApiController::class, 'listVideos']);
Route::middleware(['cors'])->get('/videos/{id}', [\App\Http\Controllers\ApiController::class, 'uniqueVideo']);

//users
Route::middleware(['cors'])->get('/utilisateurs', [\App\Http\Controllers\ApiController::class, 'listUsers']);
Route::middleware(['cors'])->get('/utilisateurs/{id}', [\App\Http\Controllers\ApiController::class, 'uniqueUser']);

//comments
Route::middleware(['cors'])->post('/commentaires', [\App\Http\Controllers\CommentController::class, 'store']);
Route::middleware(['cors'])->get('/commentaires', [\App\Http\Controllers\ApiController::class, 'listComments']);
Route::middleware(['cors'])->get('/commentaires/{id}', [\App\Http\Controllers\ApiController::class, 'uniqueComment']);
