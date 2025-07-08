<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LabelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/test-cookie', function() { // тестово добавляем куку
    return response('Cookie test')
        ->cookie('test_lax', '123', 2, '/', null, true, false, 'lax')
        ->cookie('test_none', '456', 2, '/', null, true, false, 'none');
});

// Настраиваем маршруты для аутентифицированных пользователей
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Задачи
    Route::resource('tasks', TaskController::class)->except(['index', 'show']);
    // Статусы
    Route::resource('task_statuses', TaskStatusController::class)->except(['index']);
    // Метки
    Route::resource('labels', LabelController::class)->except(['index']);
});

// Задачи
Route::resource('tasks', TaskController::class)->only(['index', 'show']);
// Статусы
Route::resource('task_statuses', TaskStatusController::class)->only(['index']);
// Метки
Route::resource('labels', LabelController::class)->only(['index']);

require __DIR__ . '/auth.php';
