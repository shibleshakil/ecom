<?php

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

Route::match(['get','post'],'/admin-register', 'AdminController@register');
Route::match(['get','post'],'/admin-login', 'AdminController@login');

//admin route
Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin-dashboard', 'AdminController@dashboard');
    Route::get('/admin-setting', 'AdminController@setting');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
    //category
    Route::match(['get','post'],'/admin/categories/add-main-category', 'CategoriesController@addMainCategory');
    Route::get('/admin/categories/view-main-categories', 'CategoriesController@viewMainCategories');
    Route::match(['get','post'],'/admin/categories/edit-main-category/{id}', 'CategoriesController@editMainCategory');
    Route::match(['get','post'],'/admin/categories/add-sub-category', 'CategoriesController@addSubCategory');
    Route::get('/admin/categories/view-sub-categories', 'CategoriesController@viewSubCategories');
    Route::match(['get','post'],'/admin/categories/edit-sub-category/{id}', 'CategoriesController@editSubCategory');

});

Route::get('logout','AdminController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
