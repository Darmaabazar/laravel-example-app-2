<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);

Route::get('/post/edit/{id}', [PostController::class, 'edit']);
Route::put('/post/{id}', [PostController::class, 'update']);


Route::delete('/post/delete/{id}', [PostController::class, 'destroy']);

Route::get('/posts/search', [PostController::class, 'search']);

// Route::get('/second', function () {
//     return view('pages.second');
// });


