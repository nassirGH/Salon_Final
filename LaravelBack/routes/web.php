<?php


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
});

Route::get('/admi', function () {
  return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login.submit');

  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('  register');
  Route::post('/register', 'AdminAuth\RegisterController@register')->name('admin.register.submit');
  
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
  Route::get('/dashboard/pending/users', 'HomeController@pending')->name('dashboard.pending');

  Route::delete('/delete/{id}', 'HomeController@delete')->name('deleteUsers');
  Route::delete('/deleteBook/{id}', 'HomeController@deleteBook')->name('deletebooking');

  Route::put('/update/{id}', 'HomeController@update')->name('updateUsers');




  Route::get('event/add','EventController@createEvent')->name('admin.createevent');
  Route::post('event/add','EventController@store')->name('admin.store');
  Route::get('event','EventController@calender')->name('admin.calender');
  
  Route::get('/offer','OfferController@offer')->name('admin.offer');

  Route::get('/plan','OfferController@plan')->name('admin.plan');

  
});


Route::get('/users','Admin  Controller@index');




