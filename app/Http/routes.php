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
    Route::post('admin/register','AdminAuth\AuthController@register');

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

    //Material Department User
    Route::get('/user/material/login','MaterialUserAuth\AuthController@showLoginForm');
    Route::post('/user/material/login','MaterialUserAuth\AuthController@login');
    Route::get('/user/material/logout',['as' => 'material_user.logout', 'uses' =>'MaterialUserAuth\AuthController@logout']);
    Route::get('/material/dashboard', ['as' => 'material_user.dashboard', 'uses' => 'MateriaUsersController@index']);

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

Route::group(['prefix'=>'designation'], function() {
    Route::get('/create', [
        'as' => 'designation.create',
        'middleware' => ['admin'],
        'uses' => 'DesignationController@create'
    ]);

    Route::post('/store', [
        'as' => 'designation.store',
        'middleware' => ['admin'],
        'uses' => 'DesignationController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'designation.index',
        'middleware' => ['admin'],
        'uses' => 'DesignationController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'designation.edit',
        'middleware' => ['admin'],
        'uses' => 'DesignationController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'designation.update',
        'middleware' => ['admin'],
        'uses' => 'DesignationController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'designation.disable',
        'middleware' => ['admin'],
        'uses' => 'DesignationController@disable'
    ]);
});


Route::group(['prefix'=>'admin_requisition'], function() {

     Route::get('/view-all', [
        'as' => 'admin.requisition.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@requisition_index'
    ]);

    Route::get('/admin-view-requisition-details/{num}', [
        'as' => 'admin.requisition.view',
        'middleware' => ['admin'],
        'uses' => 'AdminController@view'
    ]);
});

Route::group(['prefix'=>'role'], function() {
    Route::get('/create', [
        'as' => 'role.create',
        'middleware' => ['admin'],
        'uses' => 'AdminController@create_role'
    ]);

    Route::post('/store', [
        'as' => 'role.store',
        'middleware' => ['admin'],
        'uses' => 'AdminController@store_role'
    ]);

    Route::get('/view-all', [
        'as' => 'role.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@index_role'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'role.edit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@edit_role'
    ]);

    Route::post('/update/{num}', [
        'as' => 'role.update',
        'middleware' => ['admin'],
        'uses' => 'AdminController@update_role'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'role.disable',
        'middleware' => ['admin'],
        'uses' => 'AdminController@disable_role'
    ]);
});
Route::group(['prefix'=>'permission'], function() {
    Route::get('/create', [
        'as' => 'permission.create',
        'middleware' => ['admin'],
        'uses' => 'AdminController@create_permission'
    ]);

    Route::post('/store', [
        'as' => 'permission.store',
        'middleware' => ['admin'],
        'uses' => 'AdminController@store_permission'
    ]);

   Route::get('/view-all', [
        'as' => 'permission.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@index_permission'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'permission.edit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@edit_permission'
    ]);

    Route::post('/update/{num}', [
        'as' => 'permission.update',
        'middleware' => ['admin'],
        'uses' => 'AdminController@update_permission'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'permission.disable',
        'middleware' => ['admin'],
        'uses' => 'AdminController@disable_permission'
    ]);
});

Route::group(['prefix'=>'permission/assign/'], function() {
    Route::get('/add', [
        'as' => 'assign_permission.create',
        'middleware' => ['admin'],
        'uses' => 'AdminController@assign_permission'
    ]);

    Route::post('/store', [
        'as' => 'assign_permission.store',
        'middleware' => ['admin'],
        'uses' => 'AdminController@store_permission_assigned'
    ]);

     Route::get('/view-all', [
        'as' => 'assign_permission.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@index_assign_permission'
    ]);
     Route::get('/edit/{num}', [
        'as' => 'assign_permission.edit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@edit_assign_permission'
    ]);

    Route::post('/update/{num}', [
        'as' => 'assign_permission.update',
        'middleware' => ['admin'],
        'uses' => 'AdminController@update_assign_permission'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'assign_permission.disable',
        'middleware' => ['admin'],
        'uses' => 'AdminController@disable_assign_permission'
    ]);
});


Route::group(['prefix'=>'assign_role'], function() {
    Route::get('/create', [
        'as' => 'assign_role.create',
        'middleware' => ['admin'],
        'uses' => 'AdminController@assign_role'
    ]);

    Route::post('/store', [
        'as' => 'assign_role.store',
        'middleware' => ['admin'],
        'uses' => 'AdminController@store_role_assigned'
    ]);

     Route::get('/view-all', [
        'as' => 'assign_role.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@index_assign_role'
    ]);
});

Route::group(['prefix'=>'download'], function() {

     Route::get('/department-download', [
        'as' => 'department.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@download_department'
    ]);

      Route::get('/section-download', [
        'as' => 'section.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@download_section'
    ]);

       Route::get('/location-download', [
        'as' => 'location.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@download_location'
    ]);
       Route::get('/designation-download', [
        'as' => 'designation.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@download_designation'
    ]);

       Route::get('/rack-download', [
        'as' => 'rack.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@download_rack'
    ]);

       Route::get('/department_users-download/', [
        'as' => 'department_users.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@departmentusers_dowonload'
    ]);


     Route::get('/account_users-download', [
        'as' => 'account_users.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@accountusers_dowonload'
    ]);
      Route::get('/requisition-download', [
        'as' => 'requisition.download',
        'middleware' => ['admin'],
        'uses' => 'ExcelController@requisition_dowonload'
    ]);

});

Route::group(['prefix'=>'account-user-download'], function() {

      Route::get('/budget-head-download', [
        'as' => 'budget_head.download',
        'middleware' => ['accounts_user'],
        'uses' => 'ExcelController@budgethead_dowonload'
    ]);

       Route::get('/budget-head-transaction-download', [
        'as' => 'budget_head_transaction.download',
        'middleware' => ['accounts_user'],
        'uses' => 'ExcelController@budgetTransaction_dowonload'
    ]);

});

  Route::group(['prefix'=>'department_user-download'], function() {

    Route::get('/department-requisition-download', [
        'as' => 'department-user-requisition.download',
        'middleware' => ['department_user'],
        'uses' => 'ExcelController@requisition_dowonload'
    ]);
     Route::get('/measurement-items-download', [
        'as' => 'measurement-items.download',
        'middleware' => ['department_user'],
        'uses' => 'ExcelController@measurementItems_dowonload'
    ]);

    Route::get('/salvage-measurement-items-download', [
        'as' => 'salvage-measurement-items.download',
        'middleware' => ['department_user'],
        'uses' => 'ExcelController@salvagemeasurementItems_dowonload'
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

        Route::get('/edit/{num}', [
            'as' => 'department_user.edit',
            'middleware' => ['admin'],
            'uses' => 'AdminController@edit'
        ]);

        Route::post('/update/{num}', [
            'as' => 'department_user.update',
            'middleware' => ['admin'],
            'uses' => 'AdminController@update'
        ]);

        Route::get('/disable/{num}', [
            'as' => 'department_user.disable',
            'middleware' => ['admin'],
            'uses' => 'AdminController@disable'
        ]);
    });

    Route::group(['prefix'=>'material-department'], function() {
        Route::get('/create', [
            'as' => 'material_user.create',
            'middleware' => ['admin'],
            'uses' => 'AdminController@create_material_user'
        ]);

        Route::post('/store', [
            'as' => 'material_user.store',
            'middleware' => ['admin'],
            'uses' => 'AdminController@store_material_user'
        ]);


        Route::get('/view-all', [
            'as' => 'material_user.index',
            'middleware' => ['admin'],
            'uses' => 'AdminController@view_department_users'
        ]);


        Route::get('/change-password', [
            'as' => 'material_user.change_password',
            'middleware' => ['department_user'],
            'uses' => 'DepartmentUsersController@change_password'
        ]);

        Route::get('/edit/{num}', [
            'as' => 'material_user.edit',
            'middleware' => ['admin'],
            'uses' => 'AdminController@edit'
        ]);

        Route::post('/update/{num}', [
            'as' => 'material_user.update',
            'middleware' => ['admin'],
            'uses' => 'AdminController@update'
        ]);

        Route::get('/disable/{num}', [
            'as' => 'material_user.disable',
            'middleware' => ['admin'],
            'uses' => 'AdminController@disable'
        ]);
    });

     Route::group(['prefix'=>'account'], function() {

            Route::get('/create', [
            'as' => 'account_user.create',
            'middleware' => ['admin'],
            'uses' => 'AdminController@create_account_user'
        ]);

        Route::post('/store', [
            'as' => 'account_user.store',
            'middleware' => ['admin'],
            'uses' => 'AdminController@store_account_user'
        ]);
          Route::get('/view-all', [
            'as' => 'account_user.index',
            'middleware' => ['admin'],
            'uses' => 'AdminController@view_account_users'
        ]);

         Route::get('/edit/{num}', [
            'as' => 'account_user.edit',
            'middleware' => ['admin'],
            'uses' => 'AdminController@edit_account_user'
        ]);

        Route::post('/update/{num}', [
            'as' => 'account_user.update',
            'middleware' => ['admin'],
            'uses' => 'AdminController@update_account_user'
        ]);

        Route::get('/disable/{num}', [
            'as' => 'account_user.disable',
            'middleware' => ['admin'],
            'uses' => 'AdminController@disable_account_user'
        ]);

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
    Route::get('chnage-password/department/{num}',[
      'as' => 'chnage_department_user_password_admin',
      'middleware' => ['admin'],
      'uses' => 'PasswordController@change_password_department']
    );

    Route::post('chnage-password/department/{num}', [
        'as' => 'update_department_user_password_admin',
        'middleware' => ['admin'],
        'uses' => 'PasswordController@update_password_department']
    );

    /********Change password route for admin*******/
    /******************************************************/
    Route::get('chnage-password/admin',[
      'as' => 'chnage_admin_user_password',
      'uses' => 'PasswordController@change_password_admin']);

    Route::post('chnage-password/admin', [
        'as' => 'update_admin_user_password',
        'uses' => 'PasswordController@update_password_admin']);
});




/******************Department User*******************/

//requisition
Route::group(['prefix'=>'requisition'], function() {
    Route::get('/create', [
        'as' => 'requisition.create',
        'middleware' => ['department_user'],
        'uses' => 'RequisitionsController@create'
    ]);

    Route::post('/store', [
        'as' => 'requisition.store',
        'middleware' => ['department_user'],
        'uses' => 'RequisitionsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'requisition.index',
        'middleware' => ['material_user'],
        'uses' => 'RequisitionsController@index'
    ]);

    Route::get('/view-all-new', [
        'as' => 'requisition.view_arrived_requisitions',
        'middleware' => ['material_user'],
        'uses' => 'RequisitionsController@view_arrived_requisitions'
    ]);

    Route::get('/edit/{num}', [
            'as' => 'requisition.edit',
            'middleware' => ['department_user'],
            'uses' => 'RequisitionsController@edit'
    ]);

    Route::post('/update/{num}', [
            'as' => 'requisition.update',
            'middleware' => ['department_user'],
            'uses' => 'RequisitionsController@update'
    ]);

    Route::get('/disable/{num}', [
            'as' => 'requisition.disable',
            'middleware' => ['department_user'],
            'uses' => 'RequisitionsController@disable'
    ]);
    Route::get('/view-details/{num}', [
        'as' => 'requisition.view',
        'middleware' => ['material_user'],
        'uses' => 'RequisitionsController@view'
    ]);

    Route::get('/approve-requisition-item/{num}', [
        'as' => 'approve.requisition.item',
        'middleware' => ['material_user'],
        'uses' => 'RequisitionsController@approve_requisition_item_issue'
    ]);


    Route::get('/approved/list-all', [
        'as' => 'requisition.view_approved',
        'middleware' => ['department_user'],
        'uses' => 'RequisitionsController@view_approved'
    ]);
    Route::get('/receive/{num}', [
        'as' => 'requisition.receive',
        'middleware' => ['department_user'],
        'uses' => 'RequisitionsController@receiveRequisition'
    ]);

    Route::get('/issue/view/{requisition_id}/{item_id}', [
        'as' => 'requisition.issue.view',
        'middleware' => ['department_user'],
        'uses' => 'RequisitionsController@requisition_issue_view'
    ]);

    Route::post('/issue', [
        'as' => 'requisition.issue',
        'middleware' => ['department_user'],
        'uses' => 'RequisitionsController@requisition_issue'
    ]);

    /**
    * Approve Reuistion Items
    * Multiple Items from same or Multiple Requisitions
    **/
    Route::get('/view-pending-requisitions', [
        'as' => 'requisition.view_all.pending_requisitions',
        'middleware' => ['material_user'],
        'uses' => 'RequisitionsController@view_pending_requisitions'
    ]);
    Route::get('/approve-requisition/{num}', [
        'as' => 'requisition.approve',
        'middleware' => ['material_user'],
        'uses' => 'RequisitionsController@approveRequisition'
    ]);

    Route::post('/approve-requisition-items', [
        'as' => 'requisition.approve_multiple',
        'uses' => 'RequisitionsController@approveMultipleRequisitions'
    ]);

});

//Purchase Indent
Route::group(['prefix'=>'purchase-indent'], function() {
    Route::get('/create/{num}', [
        'as' => 'purchase_indent.create',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@create'
    ]);

    Route::post('/store', [
        'as' => 'purchase_indent.store',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'purchase_indent.index',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@index'
    ]);

    Route::get('/view-indents', [
        'as' => 'purchase_indent.view_indents',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@view_indents'
    ]);

    Route::get('/details/{num}', [
        'as' => 'purchase_indent.details',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@details'
    ]);

    Route::get('/view-checked-list', [
        'as' => 'purchase_indent.view_checked',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@view_checked'
    ]);

    Route::get('/check/{num}', [
        'as' => 'purchase_indent.check',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@check'
    ]);

    Route::get('/approve/{num}', [
        'as' => 'purchase_indent.approve',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@approve'
    ]);


    Route::get('/add-vendor-list', [
        'as' => 'purchase_indent.view_all_approved_indents',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@view_all_approved_indents'
    ]);
});


//Tender Management
Route::group(['prefix'=>'quotation-values'], function() {
    Route::get('/add/{purchase_indent_id}', [
        'as' => 'quotation_values.create',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@add_qoutation_value'
    ]);

    Route::post('/store', [
        'as' => 'quotation_values.store',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@store_qoutation_value'
    ]);

    Route::get('/view/{purchase_indent_item_id}', [
        'as' => 'quotation_values.view',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@view_qoutation_valus'
    ]);

    Route::get('/accept/{id}', [
        'as' => 'quotation_values.accept',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@accept_qoutation_valus'
    ]);
});

Route::group(['prefix'=>'purchase-indent-item'], function() {
    Route::get('/add-previous-rate/{purchase_indent_id}', [
        'as' => 'add.previous_rates',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@add_item_previous_rate'
    ]);

    Route::post('/store-previous-rate/{purchase_indent_id}', [
        'as' => 'store.previous_rates',
        'middleware' => ['department_user'],
        'uses' => 'PurchaseIndentsController@store_item_previous_rate'
    ]);
});

//Tender Management
Route::group(['prefix'=>'nit'], function() {
    Route::get('/create/{num}', [
        'as' => 'nit.create',
        'middleware' => ['department_user'],
        'uses' => 'NitsController@create'
    ]);

    Route::post('/store', [
        'as' => 'nit.store',
        'middleware' => ['department_user'],
        'uses' => 'NitsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'nit.index',
        'middleware' => ['department_user'],
        'uses' => 'NitsController@index'
    ]);

    Route::get('/details/{num}', [
        'as' => 'nit.details',
        'middleware' => ['department_user'],
        'uses' => 'NitsController@details'
    ]);

    Route::get('/comparative-study/{num}', [
        'as' => 'nit.comparative_study',
        'middleware' => ['department_user'],
        'uses' => 'NitsController@comparative_study'
    ]);
});

Route::group(['prefix'=>'item'], function() {
    Route::get('/create', [
        'as' => 'item_measurement.create',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@create'
    ]);

    Route::post('/store', [
        'as' => 'item_measurement.store',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'item_measurement.index',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'item_measurement.edit',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'item_measurement.update',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'item_measurement.disable',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@disable'
    ]);
    Route::get('/view-item-details/{num}', [
        'as' => 'item_measurement.view',
        'middleware' => ['admin'],
        'uses' => 'ItemMeasurementsController@view'
    ]);
});

Route::group(['prefix'=>'salvage-item'], function() {
    Route::get('/create', [
        'as' => 'salvage_item_measurement.create',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@create'
    ]);

    Route::post('/store', [
        'as' => 'salvage_item_measurement.store',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'salvage_item_measurement.index',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'salvage_item_measurement.edit',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'salvage_item_measurement.update',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'salvage_item_measurement.disable',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@disable'
    ]);
     Route::get('/view-salvage-item-details/{num}', [
        'as' => 'salvage_item_measurement.view',
        'middleware' => ['admin'],
        'uses' => 'SalvageItemMeasurementsController@view'
    ]);

});


Route::group(['prefix'=>'change_password_department_user'], function() {
 /********Change password route for department*******/
    Route::get('chnage-password/department',[
      'as' => 'chnage_department_user_password',
      'middleware' => ['department_user'],
      'uses' => 'DepartmentUsersController@change_password_department']);

    Route::post('chnage-password/department', [
        'as' => 'update_department_user_password',
        'middleware' => ['department_user'],
        'uses' => 'DepartmentUsersController@update_password_department']);

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

Route::group(['prefix'=>'budget-head-transactions'], function() {
/********Change password route for account users*******/

    Route::get('chnage-password/accountusers',[
      'as' => 'chnage_accounts_user_password',
      'middleware' => ['accounts_user'],
      'uses' => 'AccountsUsersController@change_password']);

    Route::post('chnage-password/accountusers', [
        'as' => 'update_accounts_user_password',
        'middleware' => ['accounts_user'],
        'uses' => 'AccountsUsersController@update_password']);
    });

/*******************REST CONTROLLER*************/
Route::group(['prefix'=>'rest'], function() {
    Route::get('/get-sections', [
        'as' => 'rest.get_sections',
        'uses' => 'RestController@getSections'
    ]);

    Route::get('/get-rackss', [
        'as' => 'rest.get_racks',
        'uses' => 'RestController@getRacks'
    ]);

    Route::get('/get-subgroups', [
        'as' => 'rest.get_sub_groups',
        'uses' => 'RestController@getSubgroups'
    ]);

    Route::get('/item-values', [
        'as' => 'rest.item_values',
        'uses' => 'RestController@itemValues'
    ]);

    Route::get('/approve-requisition-item', [
        'as' => 'rest.approve_requisition_item',
        'uses' => 'RestController@approveRequisition'
    ]);

    Route::get('/reject-requisition-item', [
        'as' => 'rest.reject_requisition_item',
        'uses' => 'RestController@rejectRequisition'
    ]);
});
