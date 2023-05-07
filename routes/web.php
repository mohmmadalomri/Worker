<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SalarieController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OfferPriceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TaskEmployeeController;
use App\Http\Controllers\ProjectController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dashboard/departmint', DepartmentsController::class);
    Route::resource('dashboard/user', UserController::class);
    Route::resource('dashboard/vacation', VacationController::class);
    Route::resource('dashboard/debt', DebtController::class);
    Route::resource('dashboard/expense', ExpenseController::class);
    Route::resource('dashboard/salaries', SalarieController::class);
    Route::resource('dashboard/customers', CustomerController::class);
    Route::resource('dashboard/product', ProductController::class);
    Route::resource('dashboard/groups', GroupController::class);
    Route::resource('dashboard/tasks', TaskController::class);
    Route::resource('dashboard/orders', OrderController::class);
    Route::resource('dashboard/offer_prices', OfferPriceController::class);
    Route::resource('dashboard/invoices', InvoiceController::class);
    Route::resource('dashboard/task_employees', TaskEmployeeController::class);
    Route::resource('dashboard/project', ProjectController::class);

});

require __DIR__ . '/auth.php';
