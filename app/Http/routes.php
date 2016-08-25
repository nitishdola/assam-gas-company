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



    //Department User
    Route::get('/user/department/login','DepartmentUserAuth\AuthController@showLoginForm');
    Route::post('/user/department/login','DepartmentUserAuth\AuthController@login');
    Route::get('/user/department/logout',['as' => 'department_user.logout', 'uses' =>'DepartmentUserAuth\AuthController@logout']);
    Route::get('/department/dashboard', ['as' => 'department_user.dashboard', 'uses' => 'DepartmentUsersController@index']);

    //Accounts User
    Route::get('/user/accounts/login','AccountsUserAuth\AuthController@showLoginForm');
    Route::post('/user/accounts/login','AccountsUserAuth\AuthController@login');
    Route::get('/user/accounts/logout',['as' => 'accounts_user.logout', 'uses' =>'AccountsUserAuth\AuthController@logout']);
    Route::get('/accounts/dashboard', ['as' => 'accounts_user.dashboard', 'uses' => 'AccountsUsersController@index']);

});  


Route::group(['prefix'=>'user'], function() {
    Route::get('/create', [
        'as' => 'admin.create.user',
        'middleware' => ['admin'],
        'uses' => 'AdminsController@create_user'
    ]);

    Route::post('/store', [
        'as' => 'rack.store',
        'middleware' => ['admin'],
        'uses' => 'RacksController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'rack.index',
        'middleware' => ['admin'],
        'uses' => 'RacksController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'rack.edit',
        'middleware' => ['admin'],
        'uses' => 'RacksController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'rack.update',
        'middleware' => ['admin'],
        'uses' => 'RacksController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'rack.disable',
        'middleware' => ['admin'],
        'uses' => 'RacksController@disable'
    ]);
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


Route::group(['prefix'=>'section'], function() {
    Route::get('/create', [
        'as' => 'section.create',
        'middleware' => ['admin'],
        'uses' => 'SectionsController@create'
    ]);

    Route::post('/store', [
        'as' => 'section.store',
        'middleware' => ['admin'],
        'uses' => 'SectionsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'section.index',
        'middleware' => ['admin'],
        'uses' => 'SectionsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'section.edit',
        'middleware' => ['admin'],
        'uses' => 'SectionsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'section.update',
        'middleware' => ['admin'],
        'uses' => 'SectionsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'section.disable',
        'middleware' => ['admin'],
        'uses' => 'SectionsController@disable'
    ]);
});


Route::group(['prefix'=>'item-group'], function() {
    Route::get('/create', [
        'as' => 'item_group.create',
        'middleware' => ['admin'],
        'uses' => 'ItemGroupsController@create'
    ]);

    Route::post('/store', [
        'as' => 'item_group.store',
        'middleware' => ['admin'],
        'uses' => 'ItemGroupsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'item_group.index',
        'middleware' => ['admin'],
        'uses' => 'ItemGroupsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'item_group.edit',
        'middleware' => ['admin'],
        'uses' => 'ItemGroupsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'item_group.update',
        'middleware' => ['admin'],
        'uses' => 'ItemGroupsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'item_group.disable',
        'middleware' => ['admin'],
        'uses' => 'ItemGroupsController@disable'
    ]);
});


Route::group(['prefix'=>'item-sub-group'], function() {
    Route::get('/create', [
        'as' => 'item_sub_group.create',
        'middleware' => ['admin'],
        'uses' => 'ItemSubGroupsController@create'
    ]);

    Route::post('/store', [
        'as' => 'item_sub_group.store',
        'middleware' => ['admin'],
        'uses' => 'ItemSubGroupsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'item_sub_group.index',
        'middleware' => ['admin'],
        'uses' => 'ItemSubGroupsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'item_sub_group.edit',
        'middleware' => ['admin'],
        'uses' => 'ItemSubGroupsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'item_sub_group.update',
        'middleware' => ['admin'],
        'uses' => 'ItemSubGroupsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'item_sub_group.disable',
        'middleware' => ['admin'],
        'uses' => 'ItemSubGroupsController@disable'
    ]);
});

Route::group(['prefix'=>'measurement-unit'], function() {
    Route::get('/create', [
        'as' => 'measurement_unit.create',
        'middleware' => ['admin'],
        'uses' => 'MeasurementUnitsController@create'
    ]);

    Route::post('/store', [
        'as' => 'measurement_unit.store',
        'middleware' => ['admin'],
        'uses' => 'MeasurementUnitsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'measurement_unit.index',
        'middleware' => ['admin'],
        'uses' => 'MeasurementUnitsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'measurement_unit.edit',
        'middleware' => ['admin'],
        'uses' => 'MeasurementUnitsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'measurement_unit.update',
        'middleware' => ['admin'],
        'uses' => 'MeasurementUnitsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'measurement_unit.disable',
        'middleware' => ['admin'],
        'uses' => 'MeasurementUnitsController@disable'
    ]);
});


Route::group(['prefix'=>'location'], function() {
    Route::get('/create', [
        'as' => 'location.create',
        'middleware' => ['admin'],
        'uses' => 'LocationsController@create'
    ]);

    Route::post('/store', [
        'as' => 'location.store',
        'middleware' => ['admin'],
        'uses' => 'LocationsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'location.index',
        'middleware' => ['admin'],
        'uses' => 'LocationsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'location.edit',
        'middleware' => ['admin'],
        'uses' => 'LocationsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'location.update',
        'middleware' => ['admin'],
        'uses' => 'LocationsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'location.disable',
        'middleware' => ['admin'],
        'uses' => 'LocationsController@disable'
    ]);
});


Route::group(['prefix'=>'rack'], function() {
    Route::get('/create', [
        'as' => 'rack.create',
        'middleware' => ['admin'],
        'uses' => 'RacksController@create'
    ]);

    Route::post('/store', [
        'as' => 'rack.store',
        'middleware' => ['admin'],
        'uses' => 'RacksController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'rack.index',
        'middleware' => ['admin'],
        'uses' => 'RacksController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'rack.edit',
        'middleware' => ['admin'],
        'uses' => 'RacksController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'rack.update',
        'middleware' => ['admin'],
        'uses' => 'RacksController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'rack.disable',
        'middleware' => ['admin'],
        'uses' => 'RacksController@disable'
    ]);
});

Route::group(['prefix'=>'user'], function() {
    Route::group(['prefix'=>'department'], function() {
        Route::get('/create', [
            'as' => 'department_user.create',
            'middleware' => ['admin'],
            'uses' => 'AdminController@create_department_user'
        ]);

        Route::post('/store', [
            'as' => 'department_user.store',
            'middleware' => ['admin'],
            'uses' => 'AdminController@store_department_user'
        ]);

        Route::get('/view-all', [
            'as' => 'department_user.index',
            'middleware' => ['admin'],
            'uses' => 'AdminController@view_department_users'
        ]);

        Route::get('/change-password', [
            'as' => 'department_user.change_password',
            'middleware' => ['department_user'],
            'uses' => 'DepartmentUsersController@change_password'
        ]);

        /*Route::get('/edit/{num}', [
            'as' => 'rack.edit',
            'middleware' => ['admin'],
            'uses' => 'RacksController@edit'
        ]);

        Route::post('/update/{num}', [
            'as' => 'rack.update',
            'middleware' => ['admin'],
            'uses' => 'RacksController@update'
        ]);

        Route::get('/disable/{num}', [
            'as' => 'rack.disable',
            'middleware' => ['admin'],
            'uses' => 'RacksController@disable'
        ]);*/
    });
});

Route::group(['prefix'=>'admin'], function() {
    Route::group(['prefix'=>'vendor'], function() {
        Route::get('/create', [
            'as' => 'admin.vendor.create',
            'middleware' => ['admin'],
            'uses' => 'VendorsController@create'
        ]);

        Route::post('/store', [
            'as' => 'admin.vendor.store',
            'middleware' => ['admin'],
            'uses' => 'VendorsController@store'
        ]);

        Route::get('/view-all', [
            'as' => 'admin.vendor.index',
            'middleware' => ['admin'],
            'uses' => 'VendorsController@index'
        ]);
        Route::get('/edit/{num}', [
            'as' => 'admin.vendor.edit',
            'middleware' => ['admin'],
            'uses' => 'VendorsController@edit'
        ]);

        Route::post('/update/{num}', [
            'as' => 'admin.vendor.update',
            'middleware' => ['admin'],
            'uses' => 'VendorsController@update'
        ]);

        Route::get('/disable/{num}', [
            'as' => 'admin.vendor.disable',
            'middleware' => ['admin'],
            'uses' => 'VendorsController@disable'
        ]);
    });
});


/******************Department User*******************/
Route::group(['prefix'=>'measurement-of-item'], function() {
    Route::get('/create', [
        'as' => 'item_measurement.create',
        'middleware' => ['department_user'],
        'uses' => 'ItemMeasurementsController@create'
    ]);

    Route::post('/store', [
        'as' => 'item_measurement.store',
        'middleware' => ['department_user'],
        'uses' => 'ItemMeasurementsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'item_measurement.index',
        'middleware' => ['department_user'],
        'uses' => 'ItemMeasurementsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'item_measurement.edit',
        'middleware' => ['department_user'],
        'uses' => 'ItemMeasurementsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'item_measurement.update',
        'middleware' => ['department_user'],
        'uses' => 'ItemMeasurementsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'item_measurement.disable',
        'middleware' => ['department_user'],
        'uses' => 'ItemMeasurementsController@disable'
    ]);
});

Route::group(['prefix'=>'measurement-of-salvage-item'], function() {
    Route::get('/create', [
        'as' => 'salvage_item_measurement.create',
        'middleware' => ['department_user'],
        'uses' => 'SalvageItemMeasurementsController@create'
    ]);

    Route::post('/store', [
        'as' => 'salvage_item_measurement.store',
        'middleware' => ['department_user'],
        'uses' => 'SalvageItemMeasurementsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'salvage_item_measurement.index',
        'middleware' => ['department_user'],
        'uses' => 'SalvageItemMeasurementsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'salvage_item_measurement.edit',
        'middleware' => ['department_user'],
        'uses' => 'SalvageItemMeasurementsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'salvage_item_measurement.update',
        'middleware' => ['department_user'],
        'uses' => 'SalvageItemMeasurementsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'salvage_item_measurement.disable',
        'middleware' => ['department_user'],
        'uses' => 'SalvageItemMeasurementsController@disable'
    ]);
});


/**************Accounts User routes*********************/
Route::group(['prefix'=>'chargeable-accounts'], function() {
    Route::get('/create', [
        'as' => 'chargeable_account.create',
        'middleware' => ['accounts_user'],
        'uses' => 'ChargeableAccountsController@create'
    ]);
    
   

    Route::post('/store', [
        'as' => 'chargeable_account.store',
        'middleware' => ['accounts_user'],
        'uses' => 'ChargeableAccountsController@store'
    ]);

     Route::get('/edit/{num}', [
        'as' => 'chargeable_account.edit',
        'middleware' => ['accounts_user'],
        'uses' => 'ChargeableAccountsController@edit'
    ]);
      Route::post('/update/{num}', [
        'as' => 'chargeableaccount.update',
        'middleware' => ['accounts_user'],
        'uses' => 'ChargeableAccountsController@update'
    ]);


    Route::get('/disable/{num}', [
        'as' => 'chargeable_account.disable',
        'middleware' => ['accounts_user'],
        'uses' => 'ChargeableAccountsController@disable'
    ]);

    Route::get('/view-all', [
        'as' => 'chargeable_account.index',
        'middleware' => ['accounts_user'],
        'uses' => 'ChargeableAccountsController@index'
    ]);
});

Route::group(['prefix'=>'budget-heads'], function() {
    Route::get('/create', [
        'as' => 'budget_head.create',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadsController@create'
    ]);

    Route::post('/store', [
        'as' => 'budget_head.store',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadsController@store'
    ]);
    Route::get('/edit/{num}', [
        'as' => 'budget_head.edit',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadsController@edit'
    ]);
      Route::post('/update/{num}', [
        'as' => 'head.update',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadsController@update'
    ]);


    Route::get('/disable/{num}', [
        'as' => 'BudgetHeads.disable',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadsController@disable'
    ]);

    Route::get('/view-all', [
        'as' => 'budget_head.index',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadsController@index'
    ]);
});

Route::group(['prefix'=>'budget-head-transactions'], function() {
    Route::get('/create', [
        'as' => 'budget_head_transaction.create',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadTransactionsController@create'
    ]);

    Route::post('/store', [
        'as' => 'budget_head_transaction.store',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadTransactionsController@store'
    ]);

  Route::get('/edit/{num}', [
        'as' => 'budget_head_transaction.edit',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadTransactionsController@edit'
    ]);
      Route::post('/update/{num}', [
        'as' => 'budget_head_transaction.update',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadTransactionsController@update'
    ]);


    Route::get('/disable/{num}', [
        'as' => 'budget_head_transaction.disable',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadTransactionsController@disable'
    ]);
    Route::get('/view-all', [
        'as' => 'budget_head_transaction.index',
        'middleware' => ['accounts_user'],
        'uses' => 'BudgetHeadTransactionsController@index'
    ]);
});

/*******************REST CONTROLLER*************/
Route::group(['prefix'=>'rest'], function() {
    Route::get('/get-sections', [
        'as' => 'rest.get_sections',
        //'middleware' => ['accounts_user'],
        'uses' => 'RestController@getSections'
    ]);
});