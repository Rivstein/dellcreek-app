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
Route::group(['middleware'=>['auth','permission:access-admin']],function(){
    Route::get('dashboard','DashboardController@index');
});


// admin properties route group
Route::controller(AdminPropertiesController::class)
->prefix('admin/properties')->as('admin.propery.')
->middleware('auth','permission:access-admin')
->group(function () {
    Route::get('manager','index');
    Route::get('property/{id}','show');
    Route::group(['middleware' => ['permission:manage-property']],function(){
        Route::get('create','create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit');
        Route::patch('update/{id}','update')->name('update');
        Route::get('listing/{id}','listing');
        Route::get('delete/{id}','delete')->name('delete');
        Route::delete('delete_image/{id}/{property_id}','deleteImage')->name('delete_image');
        Route::patch('update_main_image/{property_id}','updateMainImage')->name('update_main_image');
        Route::post('upload_image/{property_id}','uploadImage')->name('upload_image');
    });
});
// highlighted propery routes
Route::group(['middleware'=>['auth','permission:access-admin','permission:manage-property']],function(){
    Route::post('highlight_property','HighlightedPropertyController@store')->name('highlight_property');
    Route::patch('highlight_property','HighlightedPropertyController@update')->name('highlight_property');
    Route::post('remove_highlighted/{id}', 'HighlightedPropertyController@remove')->name('remove_highlighted');    
});


// crm routes
Route::group(['middleware'=>['auth','permission:access-admin']],function(){
    Route::get('index', 'CRMController@index');    
});


// users and security routes
Route::controller(UserSecurityController::class)
->prefix('user_security')->as('user_security.')
->middleware('auth','permission:access-admin')
->group(function () {
    Route::get('manager','index');
});
// redirect if permission fails - DONT LOCK ROUTE
Route::get('restricted_access','UserSecurityController@permissionFail');

// access control routes
Route::controller(AccessControlController::class)
->prefix('access_control')->as('access_control.')
->middleware('auth','permission:access-admin','permission:manage-access-control')
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

// user management routes
Route::group(['middleware'=>['auth','permission:access-admin']],function(){
    Route::get('users', 'AdminUsersController@index');
    Route::get('user_edit/{id}', 'AdminUsersController@user_edit');
    Route::patch('edit_user/{id}', 'AdminUsersController@update')->name('edit_user');
    Route::get('user_create', 'AdminUsersController@user_create');
    Route::post('create', 'AdminUsersController@create')->name('create_user');
    Route::get('delete_user/{id}', 'AdminUsersController@delete')->name('delete_user');
});  


// content managment system routes
Route::group(['middleware'=>['auth','permission:access-admin']],function(){
    Route::get('content_manager','CmsController@index');
    Route::get('content_manager_setup','CmsController@setup');
    Route::get('content_manager/{target}','CmsController@targetType');
    Route::get('content/{id}','CmsController@editType');
    Route::patch('content_manager_upload/{id}','CmsController@upload')->name('content_manager_upload');
    // cms team manager
    Route::get('content_manager_team','StaffController@index');
    Route::get('content_manager_team_create','StaffController@create');
    Route::post('content_manager_team_store','StaffController@store')->name('team_store');
    Route::get('team_manager/{id}','StaffController@edit');
    Route::patch('team_manager/{id}','StaffController@update')->name('team_update');
    Route::get('team_delete/{id}','StaffController@delete')->name('team_delete');
});

// web properties routes
Route::controller(WebPropertiesController::class)->
        prefix('properties')->as('properties.')
->group(function () {
    Route::get('property/{id}','property');
    Route::get('all/{type?}','properties')->name('all');
    Route::get('county/{name}','countyProperties');
    Route::get('sort/{type}/{county?}','sort')->name('sort');
    Route::get('filter','filter')->name('filter');
    Route::get('search','search')->name('search');
});

// contact webpage route
Route::get('contact','WebPagesController@contact');

// contact forms route 
Route::post('contact/{type}/{origin}/{property_id?}','ContactController@store')->name('contact');

// about webpage route
Route::get('about_us','WebPagesController@about');
 
// user account routes
Route::group(['middleware'=>['auth']],function(){
    Route::get('profile','UserAccountController@profile');
    Route::get('settings','UserAccountController@settings');
    Route::patch('settings_edit/{id}/{type}','UserAccountController@edit')->name('settings_edit');
    Route::get('account/contact/{type}/{property_id}','UserAccountController@contact');   
});

// property watch routes
Route::group(['middleware'=>['auth']],function(){
    Route::post('watch/{property_id}','PropertyWatchController@watch')->name('watch');
    Route::post('unwatch/{property_id}','PropertyWatchController@unwatch')->name('unwatch');    
});


Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
