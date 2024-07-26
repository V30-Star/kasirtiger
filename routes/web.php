<?php
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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

Route::get('/','Home@index');
Route::get('/home','Home@index');
Route::get('/storagelist','Storage@index');
Route::get('/userlist','User@index');
Route::get('/settinglist','Settings@index');
Route::get('logout', 'Auth\LoginController@logout');

//report
Route::get('/reports/allreports','Reports@allreports');


//login
Route::get('logout', 'Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::get('login/getapplication','Auth\LoginController@getapplication');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@authenticate']);

//Home API
Route::get('home/totalbalance', 'Home@totalbalance');

//Storage API
Route::get('storage', 'Storage@getdata');
Route::get('liststorage', 'Storage@getrows');
Route::post('savestorage', 'Storage@save');
Route::post('updatestorage', 'Storage@update');
Route::post('deletestorage', 'Storage@delete');
Route::post('storagebyid', 'Storage@byid');

//User API
Route::get('user', 'User@getdata');
Route::get('listuser', 'User@getrows');
Route::post('saveuser', 'User@save');
Route::post('updateuser', 'User@update');
Route::post('deleteuser', 'User@delete');
Route::post('userbyid', 'User@byid');

//Settings API
Route::get('settings', 'Settings@getdata');
Route::post('updatesettings', 'Settings@update');