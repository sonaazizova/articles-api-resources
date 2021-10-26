<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
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

Route::apiResource('articles', ArticleController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('comments',CommentController::class);

Route::get('articles/{article}/relationships/author',[ArticleRelationshipController::class , 'author'])
     ->name('articles.relationships.author');

Route::get('articles/{article}/author',[ArticleRelationshipController::class, 'author'])
    ->name('articles.author');
        
Route::get('articles/{article}/relationships/comments',[ArticleRelationshipController::class, 'comments'])
    ->name('articles.relationships.comments');
    
Route::get('articles/{article}/comments',[ArticleRelationshipController::class, 'comments'])
    ->name('articles.comments');
        
