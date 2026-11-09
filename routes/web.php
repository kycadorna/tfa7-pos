<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [PageController::class, 'about']);

Route::get('/tasks', [TaskController::class, 'index'])
    ->name('tasks.index');

Route::post('/tasks', [TaskController::class, 'store'])
    ->name('tasks.store');

Route::get('/tasks/{id}', [PageController::class, 'task'])
    ->name('tasks.show');

Route::resource('members', MemberController::class);

Route::patch('/members/{member}/reactivate', [MemberController::class, 'reactivate'])
    ->name('members.reactivate');

Route::resource('customers', CustomerController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);

Route::resource('users', UserController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);