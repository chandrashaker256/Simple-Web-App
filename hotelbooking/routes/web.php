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

// use Illuminate\Auth;
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
});
Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/user-roles', 'Admin\DashboardController@register');
    Route::get('/user-edit/{id}', 'Admin\DashboardController@registeredit');
    Route::put('/user-registerupdate/{id}', 'Admin\DashboardController@registerupdate');
    Route::get('/user-delete/{id}', 'Admin\DashboardController@registerdelete');

});
    
    Route::group(['prefix' => 'api'], function() {
        Route::get('/user-data','Admin\DashboardController@user_data');
      });

    
    
    Route::get('/hotel_data', 'Admin\HotelPackageController@hotel_data');


    Route::get('/hotel-package','Admin\HotelPackageController@index')->middleware('auth');
    Route::get('/hotel-package/create-packages','Admin\HotelPackageController@create');

    Route::post('/save-package','Admin\HotelPackageController@store');
    Route::get('/hotel-package/{id}','Admin\HotelPackageController@edit');
    Route::put('hotel-package-update/{id}','Admin\HotelPackageController@update');
    Route::get('hotel-package-delete/{id}','Admin\HotelPackageController@delete');
    
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'Admin\HotelPackageController@homepage');


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::post('/contactus','Admin\DashboardController@contact');