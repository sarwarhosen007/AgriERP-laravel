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

// All Admin Routes

Route::namespace('Admin')->group(function () {

    Route::prefix('admin')->group(function () {

    	/* 
    	  show admin login view
		   Matches The "/admin/login" URL
    	*/
     	Route::get('login','LoginController@index')->name('adminLogin');

     	Route::post('login','LoginController@loginProcess')->name('loginProcess');

     	// admin home
     	Route::get('home','AdminHomeController@index')->name('adminHome');

     	// farmer controller
     	Route::resource('farmer', 'FarmerController', ['only' => [
     			'index', 'show','destroy'
     	]]);

     	// region controller
     	Route::resource('region', 'RegionController', ['except' => [ 'show' ]]);

     	// crop controller
        Route::resource('crop', 'CropController', ['except' => [ 'show' ]]);

        // fertilizer controller 
        Route::resource('fertilizer', 'FertilizerController', ['except' => [ 'show' ]]);
        
        // insecticide controller
        Route::resource('insecticide', 'InsecticideController', ['except' => [ 'show' ]]);

        // cropweeklytask controller
     	Route::resource('cropweeklytask', 'CropWeeklyTasksController', ['except' => [ 'index' ]]);

	});
});

 