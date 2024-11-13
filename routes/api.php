<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk menampilkan data employees
Route::get('/employees', [EmployeeController::class, 'index'])
->middleware('auth:sanctum');
// Route untuk menambahkan data employees
Route::post('/employees', [EmployeeController::class, 'store'])
->middleware('auth:sanctum');
// Route untuk melihat detail data employees
Route::get('/employees/{id}', [EmployeeController::class, 'show'])
->middleware('auth:sanctum');
// Route untuk mengedit data employees
Route::put('/employees/{id}', [EmployeeController::class, 'update'])
->middleware('auth:sanctum');
// Route untuk menghapus data employees
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])
->middleware('auth:sanctum');
// Route untuk mencari data employees
Route::get('/employees/search/{name}', [EmployeeController::class, 'search'])
->middleware('auth:sanctum');
// Route untuk melihat data employees yang aktif
Route::get('/employees/status/active', [EmployeeController::class, 'active'])
->middleware('auth:sanctum');
// Route untuk melihat data employees yang inaktif
Route::get('/employees/status/inactive', [EmployeeController::class, 'inactive'])
->middleware('auth:sanctum');
// Route untuk melihat data employees yang terminated
Route::get('/employees/status/terminated', [EmployeeController::class, 'terminated'])
->middleware('auth:sanctum');

// Route untuk Registrasi user
Route::post('/register', [AuthController::class, 'register']);
// Route untuk Login User
Route::post('/login', [AuthController::class, 'login']);