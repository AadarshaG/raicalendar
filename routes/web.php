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
Route::get('/show/calendar','Frontend\FrontendController@fullcalender');
Route::post('/fullcalenderAjax','Frontend\FrontendController@ajax');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

/****admin auth section ***/
Route::group(['prefix'=>'admin'],function(){
    Route::get('/register','Auth\Admin\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register','Auth\Admin\RegisterController@register')->name('admin.register.post');

    Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\Admin\LoginController@login')->name('admin.login.post');
    Route::get('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

    Route::get('/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.request');
    Route::post('/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.email');

    Route::post('/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.reset');
});
/* dashboard all route */
Route::group(['prefix'=>'/ewes','middleware' => ['admin']], function() {
    /* dashboard */
    Route::get('/back-end', function () {
        return view('admin.dashboard');
    })->name('dashboard');

   //calendar
    Route::get('fullcalender','Admin\CalendarController@index');
    Route::post('fullcalenderAjax','Admin\CalendarController@ajax');

});
