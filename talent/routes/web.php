<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {return view('layouts.master');});

Route::get('/relog', function () {return view('relog');});

Route::get('/show', function () {return view('hanze/show');});

Route::get('/index', function () {return view('hanze/index');});

Route::get('/upload', function () {return view('upload');});

//Route::resource('posts',PostController::class);
