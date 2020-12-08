<?php

use App\Http\Controllers\LinkController;
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

Route::get('/submit-link', [LinkController::class, 'create']);

Route::get('/user/{username}/links', function () {
    return "<h1> trabalha malandro </h1>";
})->name('user.links');

Route::get('/tag/{tag}/links', function () {
    return "<h1> trabalha malandro </h1>";
})->name('tag.links');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
