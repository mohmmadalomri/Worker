<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DepartmentsController;
use App\Http\Controllers\Api\VacationController;
use App\Http\Controllers\Api\DebtController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\SalarieController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OfferPriceController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\TaskEmployeeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auth/access-tokens', [AccessTokenController::class, 'store'])
    ->middleware('guest:sanctum');
Route::delete('auth/access-tokens/{token?}', [AccessTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('auth/order',OrderController::class);
    Route::apiResource('auth/user',UserController::class);
    Route::apiResource('auth/department',DepartmentsController::class);
    Route::apiResource('auth/vacation',VacationController::class);
    Route::apiResource('auth/debt',DebtController::class);
    Route::apiResource('auth/debt',DebtController::class);
    Route::apiResource('auth/expense',ExpenseController::class);
    Route::apiResource('auth/salarie',SalarieController::class);
    Route::apiResource('auth/customer',CustomerController::class);
    Route::apiResource('auth/product',ProductController::class);
    Route::apiResource('auth/group',GroupController::class);
    Route::apiResource('auth/task',TaskController::class);
    Route::apiResource('auth/offer_prices',OfferPriceController::class);
    Route::apiResource('auth/invoice',InvoiceController::class);
    Route::apiResource('auth/taskEmployee',TaskEmployeeController::class);

});





