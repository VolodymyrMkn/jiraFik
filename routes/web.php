<?php

use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('index');})->name('homepage');

Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('projects', ProjectsController::class);
Route::resource('tasks', TasksController::class);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('users', UserController::class, [
        'names' => [
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'show' => 'admin.users.show',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]]);
    Route::resource('languages', LanguageController::class);
    Route::resource('options', OptionsController::class);

});


require __DIR__.'/auth.php';
