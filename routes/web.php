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

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin session
route::get('/admin', 'AdminController@getLogin')->name('admin');
route::post('/admin', 'AdminController@postLogin');

Route::group(['middleware' => ['admin']], function () {
  Route::get('show_user',  ['as' => 'management.user.show', 'uses' => 'ManagementController@userDetail']);
  Route::get('list_users', ['as' => 'users', 'uses' => 'ManagementController@listUser']);
});
//End admin session

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/{user}/show',  ['as' => 'users.show', 'uses' => 'CustomerUserController@show']);
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'CustomerUserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'CustomerUserController@update']);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('promotion/{promotion}', ['as' => 'promotion.edit', 'uses' => 'PromotionConfigurationController@edit']);
Route::patch('promotion/{promotion}/update', ['as' => 'promotion.update', 'uses' => 'PromotionConfigurationController@update']);