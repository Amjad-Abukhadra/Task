<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthCopy;



Route::get('/home', function () {
    return view('home'); 
});


Route::get('/register', function () {
    return view('register');
});

Route::get('/most_sales', function () {
    return view('most_sales');
});

Route::get('/basket', function () {
    return view('basket');
});

Route::get('/alert', function () {
    return view('alert');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('login', [AuthCopy::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthCopy::class, 'login'])->name('login.submit');

Route::get('register', [AuthCopy::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthCopy::class, 'register'])->name('register.submit');


Route::get('/admin', [AuthCopy::class, 'adminDashboard'])->middleware('admin')->name('admin');

Route::get('/admin', [AuthCopy::class, 'showUsers'])->middleware('admin')->name('admin');

Route::get('/edit', [AuthCopy::class, 'Edit'])->name('edit');

Route::get('/edit', [AuthCopy::class, 'DeleteRow'])->name('delete');

Route::get('/home', [AuthCopy::class, 'showHome'])->name('home');

Route::post('/update-info', [AuthCopy::class, 'updateinfo'])->name('update.info');

Route::post('/delete', [AuthCopy::class,'deleteRow'])->name('delete.user');

Route::post('/subject', [AuthCopy::class,'ShowNewSubject'])->name('subject');

Route::post('/subject', [AuthCopy::class,'NewSubject'])->name('subject.store');

Route::post('/user', [AuthCopy::class,'NewUser'])->name('new.user');

Route::post('/assign',[AuthCopy::class,'assign'])->name('subject.assign');

Route::get('/app', function () {
    return view('layouts/app');
});

Route::get('/app', function () {
    return view('layouts/app');
});

Route::post('/std',[AuthCopy::class,'changeMark'])->name('change.mark');