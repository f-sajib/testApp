<?php

use Illuminate\Support\Facades\Auth;
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

    $hospital = \App\Models\Hospital::find(1);

    return view('contact',compact('hospital'));
});
Route::get('/{Hospital}/login','AuthController@login')->name('login');

Route::post('/user/login','AuthController@userLogin')->name('user.login');

Route::name('hospital.')->group(function () {
    Route::get('/hospital','HospitalController@index')->name('hospital');
    Route::post('/hospital/create','HospitalController@create')->name('create');
});

Route::group(['middleware' => ['auth:web']], function () {

});

Route::post('/send','MailController@send')->name('mail.send');

