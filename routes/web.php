<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;




Route::get('/', [DashController::class, 'index'])->name('accueil');

Route::prefix('departments')->group(function(){
    Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/create', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
});
Route::prefix('employers')->group(function(){
    Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
    Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
    Route::post('/create', [EmployerController::class, 'store'])->name('employer.store');
    Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
    Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update');
    Route::get('/{id}', [EmployerController::class, 'destroy'])->name('employer.destroy');
});


