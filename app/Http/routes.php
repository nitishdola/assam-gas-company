<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout',['as' => 'admin.logout', 'uses' =>'AdminAuth\AuthController@logout']);

    //Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

    Route::get('/admin', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);
});  

Route::group(['prefix'=>'department'], function() {
    Route::get('/create', [
        'as' => 'department.create',
        'middleware' => ['admin'],
        'uses' => 'DepartmentsController@create'
    ]);

    Route::post('/store', [
        'as' => 'department.store',
        'middleware' => ['admin'],
        'uses' => 'DepartmentsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'department.index',
        'middleware' => ['admin'],
        'uses' => 'DepartmentsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'department.edit',
        'middleware' => ['admin'],
        'uses' => 'DepartmentsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'department.update',
        'middleware' => ['admin'],
        'uses' => 'DepartmentsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'department.disable',
        'middleware' => ['admin'],
        'uses' => 'DepartmentsController@disable'
    ]);
});
