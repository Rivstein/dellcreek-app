<?php

use App\Http\Controllers\CRMController;
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

Route::get('/', 'WebPagesController@index');

// Admin Routes
Route::get('dashboard','DashboardController@index');

// admin properties route group
Route::controller(AdminPropertiesController::class)
->prefix('admin/properties')->as('admin.propery.')
->group(function () {
    Route::get('manager','index');
    Route::get('property/{id}','show');
    Route::get('create','create');
    Route::post('store','store')->name('store');
    Route::get('edit/{id}','edit');
    Route::patch('update/{id}','update')->name('update');
    Route::get('delete/{id}','delete')->name('delete');
});
// highlighted propery routes
Route::post('highlight_property','HighlightedPropertyController@store')->name('highlight_property');
Route::patch('highlight_property','HighlightedPropertyController@update')->name('highlight_property');
Route::post('remove_highlighted/{id}', 'HighlightedPropertyController@remove')->name('remove_highlighted');

Route::get('index', 'CRMController@index');


// Web Routes
Route::controller(WebPropertiesController::class)->
        prefix('properties')->as('properties.')
->group(function () {
    Route::get('property/{id}','property');
});
// newsletter 
Route::post('newsletter','ContactController@store');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
