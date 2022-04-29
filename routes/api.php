<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

Route::group(['prefix' => 'posts'], function () {
    Route::get('', [PostsController::class, 'index']);
    Route::post('', [PostsController::class, 'store']);
    Route::get('{post}', [PostsController::class, 'show']);
    Route::put('{post}', [PostsController::class, 'update']);
    Route::delete('{post}', [PostsController::class, 'destroy']);
    Route::post('{post}/upvote', [PostsController::class, 'addUpvote']);

    Route::post('{post}/comments', [CommentsController::class, 'store']);
    Route::put('{post}/comments/{comment}', [CommentsController::class, 'update']);
    Route::delete('{post}/comments/{comment}', [CommentsController::class, 'destroy']);
});
