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
Route::get('/', 'HomeController@index')->name('/');

//Admin session
route::get('/admin', 'AdminController@getLogin')->name('admin');
route::post('/admin', 'AdminController@postLogin');

Route::group(['middleware' => ['admin']], function () {
  Route::get('admin/users/{user}/napcard',  ['as' => 'management.user.napcard', 'uses' => 'ManagementController@userNapcardEdit']);
  Route::patch('admin/users/{user}/napcard',  ['as' => 'management.user.napcard', 'uses' => 'ManagementController@userNapcardUpdate']);

  Route::get('admin/users/{user}/show',  ['as' => 'management.user.show', 'uses' => 'ManagementController@userDetail']);
  Route::get('admin/users/{user}/edit',  ['as' => 'management.user.edit', 'uses' => 'ManagementController@userEdit']);
  Route::patch('admin/users/{user}/update',  ['as' => 'management.user.update', 'uses' => 'ManagementController@userUpdate']);
  Route::get('list_users', ['as' => 'users', 'uses' => 'ManagementController@listUser']);

  Route::get('admin/chkms', ['as' => 'management.chkm.list', 'uses' => 'ManagementController@chkmList']);
  Route::get('admin/chkms/{chkm}/edit', ['as' => 'management.chkm.edit', 'uses' => 'ManagementController@chkmEdit']);
  Route::patch('admin/chkms/{chkm}/update', ['as' => 'management.chkm.update', 'uses' => 'ManagementController@chkmUpdate']);

  Route::get('admin/thongkenap', ['as' => 'management.thongkenap.list', 'uses' => 'ManagementController@thongKeNap']);
  Route::post('admin/thongkenap', ['as' => 'management.thongkenap.list', 'uses' => 'ManagementController@thongKeNap']);

  Route::get('admin/lognaptien', ['as' => 'management.lognaptien.list', 'uses' => 'ManagementController@logNapTien']);
  Route::post('admin/lognaptien', ['as' => 'management.lognaptien.list', 'uses' => 'ManagementController@logNapTien']);
  Route::get('admin/logquanlytaikhoan', ['as' => 'management.logquanlytaikhoan.list', 'uses' => 'ManagementController@logQuanLyTaiKhoan']);
});
//End admin session

Auth::routes();

Route::get('lichsunaptien', ['as' => 'lichsunaptien', 'uses' => 'CustomerUserController@lichsunaptien']);
Route::get('lichsuruttien', ['as' => 'lichsuruttien', 'uses' => 'CustomerUserController@lichsuruttien']);

Route::get('/home', 'HomeController@index')->name('/home');
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
