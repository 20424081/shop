<?php

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
    return view('home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::resource('permission-groups', 'PermissionGroupController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');

    Route::resource('categories', 'CategoryController', [
        'parameters' => ['category' => 'category_id']
    ]);

    Route::resource('product-types', 'ProductTypeController', [
        'parameters' => ['product_type' => 'product_type_id']
    ]);

    Route::resource('product-companies', 'ProductCompanyController', [
        'parameters' => ['product_type' => 'product_type_id']
    ]);
    Route::resource('products', 'ProductController', [
        'parameters' => ['product_type' => 'product_type_id']
    ]);
});

Auth::routes();
