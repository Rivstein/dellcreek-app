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
    Route::delete('delete_image/{id}/{property_id}','deleteImage')->name('delete_image');
    Route::patch('update_main_image/{property_id}','updateMainImage')->name('update_main_image');
    Route::post('upload_image/{property_id}','uploadImage')->name('upload_image');
});
// highlighted propery routes
Route::post('highlight_property','HighlightedPropertyController@store')->name('highlight_property');
Route::patch('highlight_property','HighlightedPropertyController@update')->name('highlight_property');
Route::post('remove_highlighted/{id}', 'HighlightedPropertyController@remove')->name('remove_highlighted');

// crm routes
Route::get('index', 'CRMController@index');

// users and security routes
Route::controller(UserSecurityController::class)
->prefix('user_security')->as('user_security.')
->group(function () {
    Route::get('manager','index');
});

// access control routes
Route::controller(AccessControlController::class)
->prefix('access_control')->as('access_control.')
->group(function () {
    Route::get('manager/{type}','index');
    Route::post('store/{type}','store')->name('store');
    Route::patch('store/{type}/{id?}','update')->name('store');
    Route::get('role/{id}','showRole');
    Route::get('permission/{id}','showPermission');
    Route::get('delete/{type}/{id}','delete');
    Route::post('role_permissions/{id}','rolePermissions')->name('role_permissions');
    Route::post('permission_roles/{id}','permissionRoles')->name('permission_roles');
});


// Web Routes
Route::controller(WebPropertiesController::class)->
        prefix('properties')->as('properties.')
->group(function () {
    Route::get('property/{id}','property');
});

// contact webpage route
Route::get('contact','WebPagesController@contact');

// contact forms route 
Route::post('contact/{type}/{origin}/{property_id?}','ContactController@store')->name('contact');

// about webpage route
Route::get('about_us','WebPagesController@about');
 
// user account routes
Route::get('profile','UserAccountController@profile');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
