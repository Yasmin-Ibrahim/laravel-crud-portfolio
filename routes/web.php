<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('dashboard');
});

Route::prefix('client/')->name('client.')->group(function(){
    Route::get('index', [ClientController::class, 'index'])->name('index');
    Route::get('create', [ClientController::class, 'create'])->name('create');
    Route::post('store', [ClientController::class, 'store'])->name('store');
    Route::get('edit{id}', [ClientController::class, 'edit'])->name('edit');
    Route::post('update{id}', [ClientController::class, 'update'])->name('update');
    Route::get('show{id}', [ClientController::class, 'show'])->name('show');
    Route::get('destroy{id}', [ClientController::class, 'destroy'])->name('destroy');
});

Route::prefix('about/')->name('about.')->group(function(){
    Route::get('index', [AboutController::class, 'index'])->name('index');
    Route::get('create', [AboutController::class, 'create'])->name('create');
    Route::post('store', [AboutController::class, 'store'])->name('store');
    Route::get('edit{id}', [AboutController::class, 'edit'])->name('edit');
    Route::post('update{id}', [AboutController::class, 'update'])->name('update');
    Route::get('destroy{id}', [AboutController::class, 'destroy'])->name('destroy');
});

Route::prefix('skill/')->name('skill.')->group(function(){
    Route::get('index', [SkillController::class, 'index'])->name('index');
    Route::get('create', [SkillController::class, 'create'])->name('create');
    Route::post('store', [SkillController::class, 'store'])->name('store');
    Route::get('edit{id}', [SkillController::class, 'edit'])->name('edit');
    Route::post('update{id}', [SkillController::class, 'update'])->name('update');
    Route::get('destroy{id}', [SkillController::class, 'destroy'])->name('destroy');
});

Route::prefix('project/')->name('project.')->group(function(){
    Route::get('index', [ProjectController::class, 'index'])->name('index');
    Route::get('create', [ProjectController::class, 'create'])->name('create');
    Route::post('store', [ProjectController::class, 'store'])->name('store');
    Route::get('show{id}', [ProjectController::class, 'show'])->name('show');
    Route::get('edit{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::post('update{id}', [ProjectController::class, 'update'])->name('update');
    Route::get('destroy{id}', [ProjectController::class, 'destroy'])->name('destroy');
});

Route::prefix('contact/')->name('contact.')->group(function(){
    Route::get('index', [ContactController::class, 'index'])->name('index');
    Route::get('create', [ContactController::class, 'create'])->name('create');
    Route::post('store', [ContactController::class, 'store'])->name('store');
    Route::get('show{id}', [ContactController::class, 'show'])->name('show');
    Route::get('edit{id}', [ContactController::class, 'edit'])->name('edit');
    Route::post('update{id}', [ContactController::class, 'update'])->name('update');
    Route::get('destroy{id}', [ContactController::class, 'destroy'])->name('destroy');
});

