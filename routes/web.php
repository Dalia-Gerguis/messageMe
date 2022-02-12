<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/{id}/message', [MessageController::class, 'create'])->name('message.create')->middleware('message');
Route::post('/user/{id}/message', [MessageController::class, 'store'])->name('message.store');

Route::get('/user/{id}/sent', [MessageController::class, 'sent'])->name('user.sent');
Route::get('/user/{id}/inbox', [MessageController::class, 'inbox'])->name('user.inbox');
Route::get('/message/{id}', [MessageController::class, 'show'])->name('message.show');


Route::get('/message/{id}/reply', [RepliesController::class, 'create'])->name('reply.create');
Route::post('/message/{id}/reply', [RepliesController::class, 'store'])->name('reply.store');





