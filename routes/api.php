<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk menampilkan data employees
Route::get('/employees', [EmployeeController::class, 'index']);
// Route untuk menambahkan data employees
Route::post('/employees', [EmployeeController::class, 'store']);
// Route untuk melihat detail data employees
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
// Route untuk mengedit data employees
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
// Route untuk menghapus data employees
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
// Route untuk mencari data employees
Route::get('/employees/search/{name}', [EmployeeController::class, 'search']);
// Route untuk melihat data employees yang aktif
Route::get('/employees/status/active', [EmployeeController::class, 'active']);
// Route untuk melihat data employees yang inaktif
Route::get('/employees/status/inactive', [EmployeeController::class, 'inactive']);
// Route untuk melihat data employees yang terminated
Route::get('/employees/status/terminated', [EmployeeController::class, 'terminated']);