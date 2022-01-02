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


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth']], function () {
    Route::get('/',                                     'DashboardController@index')->name('dashboard.index');
    Route::post('/',                                     'DashboardController@index')->name('dashboard.index');
    Route::get('/clear-files-store',                                     'DashboardController@clearFileStorege');
    Route::get('/clear-files-intro',                                     'DashboardController@clearFileIntro');

    Route::get('/home-page',                                     'DashboardController@homePage');
    Route::post('/home-page',                                     'DashboardController@homePage');

    Route::get('/about-page',                                     'DashboardController@aboutPage');
    Route::post('/about-page',                                     'DashboardController@aboutPage');

    Route::get('/contact-page',                                     'DashboardController@contactPage');
    Route::post('/contact-page',                                     'DashboardController@contactPage');

    Route::get('/galary',                                     'DashboardController@galary');
    Route::post('/galary',                                     'DashboardController@galary');
    Route::get('/manager-file',                                     'DashboardController@files');
});
Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'files'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});
Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'user'], function () {
    Route::get('list',                  'UserController@list')->name('admin.listUser');
    Route::get('get-list',                  'UserController@getList')->name('admin.getListUser');
    Route::get('add',                  'UserController@add')->name('admin.addUser');
    Route::post('add',                  'UserController@add')->name('admin.addUser');
    Route::get('edit/{id}',                  'UserController@edit')->name('admin.editUser');
    Route::post('edit/{id}',                  'UserController@edit')->name('admin.editUser');
    Route::get('delete/{id}',                  'UserController@delete')->name('admin.deleteUser');
    Route::get('active-status/{id}',                  'UserController@active')->name('admin.activeUser');
    Route::get('deactive-status/{id}',                  'UserController@deactive')->name('admin.deactiveUser');
    Route::get('check-permission-role/{id}',                  'UserController@checkListPermission');
    Route::post('update-permission-role/{id}',                  'UserController@addListPermission');
});


Route::group(['namespace' => 'Admin',  'prefix' => 'authentication'], function () {
        Route::get('logout',                  'AuthenticationController@logout')->name('admin-logout');
        Route::get('login',                  'AuthenticationController@login')->name('login');
        Route::post('login',                  'AuthenticationController@postLogin')->name('post-login');
        Route::get('register',               'AuthenticationController@register')->name('authentication.register');
        Route::get('forgotpassword',         'AuthenticationController@forgotpassword')->name('authentication.forgotpassword');
        Route::get('error404',               'AuthenticationController@error404')->name('authentication.error404');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'customer'], function () {
    Route::get('/',                  'CustomerController@list')->name('admin.myCustomer');
    Route::post('/',                  'CustomerController@list')->name('admin.myCustomer');
    Route::get('get-list',                  'CustomerController@getList')->name('admin.getCustomer');
    Route::get('get-list-all',                  'CustomerController@getListAll')->name('admin.getAllCustomer');
    Route::post('edit/{id}',                  'CustomerController@edit')->name('admin.editCustomer');
    Route::get('edit/{id}',                  'CustomerController@edit')->name('admin.editCustomer');
    Route::get('delete/{id}',                  'CustomerController@delete')->name('admin.deleteCustomer');
    Route::post('add',                  'CustomerController@add')->name('admin.addCustomer');
    Route::get('add',                  'CustomerController@add')->name('admin.addCustomer');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'list-vote'], function () {
    Route::get('/',                  'ListVoteController@list')->name('admin.myListVote');
    Route::post('/',                  'ListVoteController@list')->name('admin.myListVote');
    Route::get('get-list',                  'ListVoteController@getList')->name('admin.getListVote');
    Route::get('get-list-all',                  'ListVoteController@getListAll')->name('admin.getAllListVote');
    Route::post('edit/{id}',                  'ListVoteController@edit')->name('admin.editListVote');
    Route::get('edit/{id}',                  'ListVoteController@edit')->name('admin.editListVote');
    Route::get('delete/{id}',                  'ListVoteController@delete')->name('admin.deleteListVote');
    Route::post('add',                  'ListVoteController@add')->name('admin.addListVote');
    Route::get('add',                  'ListVoteController@add')->name('admin.addListVote');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'storys'], function () {
    Route::get('/',                  'StorysController@list')->name('admin.Company');
    Route::get('get-list',                  'StorysController@getList')->name('admin.getCompany');
    Route::get('get-list-all',                  'StorysController@getListAll')->name('admin.getAllCompany');
    Route::post('edit/{id}',                  'StorysController@edit')->name('admin.editCompany');
    Route::get('edit/{id}',                  'StorysController@edit')->name('admin.editCompany');
    Route::get('delete/{id}',                  'StorysController@delete')->name('admin.deleteCompany');
    Route::post('add',                  'StorysController@add')->name('admin.addCompany');
    Route::get('add',                  'StorysController@add')->name('admin.addCompany');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'blog'], function () {
    Route::get('/',                  'BlogController@list')->name('admin.Blog');
    Route::get('get-list',                  'BlogController@getList')->name('admin.getBlog');
    Route::get('get-list-all',                  'BlogController@getListAll')->name('admin.getAllBlog');
    Route::post('edit/{id}',                  'BlogController@edit')->name('admin.editBlog');
    Route::get('edit/{id}',                  'BlogController@edit')->name('admin.editBlog');
    Route::get('delete/{id}',                  'BlogController@delete')->name('admin.deleteBlog');
    Route::post('add',                  'BlogController@add')->name('admin.addBlog');
    Route::get('add',                  'BlogController@add')->name('admin.addBlog');
});