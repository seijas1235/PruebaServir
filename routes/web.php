<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');

});
//Rutas departamentos
Route::get('departments', [DepartmentController::class, 'index'])->name('department.index');
Route::get('departments/getJson', [DepartmentController::class, 'getJson']);
Route::get('department', [DepartmentController::class, 'newDepartment'])->name('department.new');
Route::get('department/{department}', [DepartmentController::class, 'showDepartment'])->name('department.show');
Route::Post('department', [DepartmentController::class, 'saveDepartment'])->name('department.save');
Route::Post('department/{department}', [DepartmentController::class, 'updateDepartment'])->name('department.update');
Route::delete('department/{department}', [DepartmentController::class, 'deleteDepartment'])->name('Department.delete');

#rutas empleados
Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('employees/getJson', [EmployeeController::class, 'getJson']);
Route::get('employee', [EmployeeController::class, 'newEmployee'])->name('employee.new');
Route::get('employee/{employee}', [EmployeeController::class, 'showEmployee'])->name('employee.show');
Route::Post('employee', [EmployeeController::class, 'saveEmployee'])->name('employee.save');
Route::Post('employee/{employee}', [EmployeeController::class, 'updateEmployee'])->name('employee.update');
Route::delete('employee/{employee}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');
