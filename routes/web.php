<?php

use App\Livewire\AuthForm;
use App\Livewire\Auth\Login;
use App\Livewire\ProjectShow;
use App\Livewire\ProjectsFeed;
use App\Livewire\Auth\Register;
use App\Livewire\EnviarTrabalho;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;



Route::middleware(['guest'])->group(function () {
    Route::get('/login', AuthForm::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function(){
        return view('site.index');
    });
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/projects', function(){
        return view('site.project');
    });
    Route::get('/projetos', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projetos/{id}', [ProjectController::class, 'show'])->name('projects.show');
    // Route::get('/projects/{projectId}', ProjectShow::class)->name('projects.show');
    Route::get('/projeto/incluir', [ProjectController::class, 'addProjeto'])->name('projects.add');

});