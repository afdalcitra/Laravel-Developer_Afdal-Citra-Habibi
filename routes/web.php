<?php

use App\Http\Controllers\CounterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

// Landing
Route::get('/', [PageController::class, 'landing'])->name('landing');

// Auth
Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

// Student Section
Route::get('/tambah/siswa', [StudentController::class, 'showFormPage'])->name('student.add');
Route::post('/tambah/siswa/act', [StudentController::class, 'addStudentAction'])->name('student.add.act');
Route::get('/edit/siswa/{id}', [StudentController::class, 'showEditPage'])->name('student.edit');
Route::post('/edit/siswa/{id}/act', [StudentController::class, 'editStudentAction'])->name('student.edit.act');
Route::post('/delete/siswa/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

// Counter
Route::get('/counter', [PageController::class, 'showCounterPage'])->name('counter');
Route::post('/counter/act', [CounterController::class, 'countCharacters'])->name('counter.act');


