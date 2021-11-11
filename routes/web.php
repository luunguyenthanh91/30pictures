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


/* Route::get('/', function () {
    return view('index.index');    
});*/
// Route::group(['namespace' => 'Admin' , 'middleware' => ['adminAuth'] ], function () {

//     Route::get('/', 'HomeController@index')->name('home.index');
//     Route::get('/',                                     'DashboardController@index')->name('dashboard.index');
    
// });
Route::group(['namespace' => 'FE' ], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/story-sellers/{slug}/{key}.html', 'HomeController@directorDetail');
    Route::get('/story-sellers/{slug}', 'HomeController@director');
    Route::get('/index.html', 'HomeController@home');
    Route::get('/story-sellers', 'HomeController@story');
    Route::get('/director-{id}.html', 'HomeController@director');
    Route::get('/video-{id}.html', 'HomeController@directorDetail');
    Route::get('/search.html', 'HomeController@search');
    Route::get('/about-us', 'HomeController@about');
    Route::get('/contact-us', 'HomeController@contact');
    Route::post('/contact-us', 'HomeController@contact');

    Route::get('/votes/{slug}', 'HomeController@votes');

    // Route::get('/contact.html', 'ContactController@index');

    Route::get('/check-zipcode/{slug}', 'VotesController@check');
    Route::get('/votes/not-zip/{slug}', 'VotesController@updateZip');
    Route::post('/votes/not-zip/{slug}', 'VotesController@updateZip');

    Route::get('/votes/confirm/{slug}', 'VotesController@confirm');
    Route::post('/votes/confirm/{slug}', 'VotesController@confirm');


    Route::get('/votes/send-mail-update/{slug}', 'VotesController@sendMailUpdate');
    Route::post('/votes/send-mail-update/{slug}', 'VotesController@sendMailUpdate');

    Route::get('/votes/start-form/{slug}', 'VotesController@startForm');

    Route::get('/votes/confirm-form/{slug}', 'VotesController@confirmForm');
    Route::post('/votes/confirm-form/{slug}', 'VotesController@confirmForm');
});



/* Dashboard */
