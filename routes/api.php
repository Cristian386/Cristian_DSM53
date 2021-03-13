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


Route::apiResource('category','\App\Http\Controllers\CategoryController');

Route::get('posthome', '\App\Http\Controllers\PostController@slider');

Route::get('PostCategory', '\App\Http\Controllers\PostController@PostCategory');

Route::get('categories', '\App\Http\Controllers\PostController@categories');

Route::get('unaCategoria/{id}','\App\Http\Controllers\PostController@unaCategoria');

Route::get('cuerpoPost/{id}','\App\Http\Controllers\PostController@cuerpoPost');

Route::get('exaEnPoint','\App\Http\Controllers\PostController@exaEnPoint');