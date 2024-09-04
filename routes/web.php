<?php

use App\Livewire\AuthForm;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\EnviarTrabalho;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


// Route::get('/', function () {
//     return view('site.index');
// });

// Route::get('/registrar', Register::class)->name('register');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', AuthForm::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function(){
        return view('site.index');
    });
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/enviar-trabalho', EnviarTrabalho::class)->name('enviar-trabalho');
});