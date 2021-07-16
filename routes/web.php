<?php
use Illuminate\Http\Request;
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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/dashboard','DashboardController' );
Route::resource('/users','UserController' );
Route::get('/users/{user}/employee','UserController@showEmployee')->name('employee');
Route::get('/edit','UserController@edit')->name('edit');
Route::get('/changePassword','UserController@changePass')->name('changePassword');
Route::patch('/users/{user}/updatePassword','UserController@updatePass')->name('users.updatePass');
Route::patch('/users/{user}/update','UserController@uploadAvatar')->name('upload');

Route::resource('/attendances','AttendanceController' );
Route::post('/attendances/view', 'AttendanceController@index')->name('attendances.index');
Route::post('/attendances/show', 'AttendanceController@show')->name('attendances.show'); 
Route::get('/getAttendance', 'AttendanceController@getAttendance')->name('getAttendance');

Route::resource('/positions','PositionController' );
Route::resource('/departments','DepartmentController' );
Route::resource('/roles','RoleController' );
Route::resource('/holidays','HolidayController' );
Route::resource('/leave','leaveController' );
Route::patch('/leave/{leave}/status','leaveController@updateStatus')->name('leave.updateStatus');
