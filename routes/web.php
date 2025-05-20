<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LabelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('tasks', TaskController::class);
Route::resource('task_statuses', TaskStatusController::class); //->only(['index', 'show']) - так не загружается http://127.0.0.1:8000/task_statuses/create
Route::resource('labels', LabelController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Статусы
    Route::resource('task_statuses', TaskStatusController::class)->except(['index', 'show']);

    // Метки
    Route::resource('labels', LabelController::class)->except(['index', 'show']);
    // Задачи
    Route::resource('tasks', TaskController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';
