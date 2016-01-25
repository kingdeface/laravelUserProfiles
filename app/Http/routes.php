<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    //Authorization Routes
    Route::auth();
    //Profile Routes
    Route::resource('profiles', 'ProfilesController');
    Route::post('/profiles/search', ['as' => 'profiles.search', 'uses'=>'ProfilesController@search']);

    //User routes
    Route::get('/dashboard', 'DashboardController@index');


});
