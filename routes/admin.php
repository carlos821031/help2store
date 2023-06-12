<?php

use Illuminate\Support\Facades\Route;

//Route::get('', [HomeController::class, 'index'])->name('administration.index'); //Pagina de inicio de la administracion
/*
Route::get('/', function () {
    return 'Hello World';
})->name('administration.index');
*/
Route::get('/', function () {
    return view('administration.index');
})->name('administration.index')->middleware('auth');

Route::get('/location', function () {
    return "Location";
})->name('administration.location.index')->middleware('auth');

Route::get('/movement', function () {
    return view('administration.movement');
})->name('administration.movement.index')->middleware('auth');

Route::get('/product', function () {
    return "Product";
})->name('administration.product.index')->middleware('auth');

Route::get('/employee', function () {
    return "Employee";
})->name('administration.employee.index')->middleware('auth');

Route::get('/user', function () {
    return "User";
})->name('administration.user.index')->middleware('auth');