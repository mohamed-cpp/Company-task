<?php

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
    return view('welcome');
});

Route::group(['middleware' => 'auth.guard:web'], function () {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('admin.home');



    Route::get('companies/create', 'Admin\CompanyController@create')->name('admin.companies.create');
    Route::post('companies/create', 'Admin\CompanyController@store')->name('admin.companies.store');
    Route::get('companies/edit/{company}', 'Admin\CompanyController@edit')
        ->name('admin.companies.edit');
    Route::put('companies/update/{company}', 'Admin\CompanyController@update')
        ->name('admin.companies.update');





    Route::get('companies-get', 'Admin\CompanyController@dataTable')->name('admin.companies.datatable');
    Route::get('employees-get', 'Admin\EmployeeController@dataTable')->name('admin.employees.datatable');


    Route::delete('companies-delete/{company}', 'Admin\CompanyController@destroy')
        ->name('admin.delete.companies.datatable');
    Route::delete('employees-delete/{employee}', 'Admin\EmployeeController@destroy')
        ->name('admin.delete.employees.datatable');

});


Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.loginForm');
Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::post("logout", "Admin\Auth\LoginController@logout")->name("admin.logout");

