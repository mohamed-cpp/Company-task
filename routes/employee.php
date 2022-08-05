<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('employee.welcome');
});

Route::group(['middleware' => 'auth.guard:employee'], function () {
    Route::get('/home', function () {
        return view('employee.home');
    })->name('employee.home');
});

Route::get('login', 'Employee\Auth\LoginController@showLoginForm')->name('employee.loginForm');
Route::post('login', 'Employee\Auth\LoginController@login')->name('employee.login');
Route::post("logout", "Employee\Auth\LoginController@logout")->name("employee.logout");


Route::get('register', 'Employee\Auth\RegisterController@showRegistrationForm')->name('employee.registerForm');
Route::post('register', 'Employee\Auth\RegisterController@register')->name('employee.register');

