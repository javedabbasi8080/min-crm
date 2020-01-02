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
    return redirect('login');
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


Auth::routes();


Route::group(['middleware' => ['auth']], function () {

// company crud
Route::resource('company', 'CompaniesController');

// employee crud
Route::resource('employee', 'EmployeesController');
    //
});