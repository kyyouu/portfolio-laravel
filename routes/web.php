<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\portfoliocontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 HOME (halaman utama)
Route::get('/', function () {
    return view('home');
})->name('home');


// 🔹 MAHASISWA CRUD (resource controller)
Route::resource('mahasiswa', MahasiswaController::class);


// 🔹 PORTFOLIO (via Controller)
Route::get('/portfolio', [portfoliocontroller::class, 'index'])->name('portfolio');
Route::post('/portfolio/contact', [portfoliocontroller::class, 'sendContact'])->name('portfolio.contact');

// 🔹 WELCOME
Route::get('/welcome', function () {
    return view('welcome');
});


// 🔹 ABOUT
Route::get('/about', function () {
    return view('about');
});


// 🔹 PARAMETER
Route::get('/user/{nama}', function ($nama) {
    return "Halo, " . $nama;
});


// 🔹 REDIRECT
Route::redirect('/home', '/');


// 🔹 ADMIN GROUP
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Halaman Admin Dashboard";
    });

    Route::get('/users', function () {
        return "Data Users";
    });
});