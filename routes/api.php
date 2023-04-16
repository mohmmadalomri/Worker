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

Route::apiResource('auth/user',UserController::class)->middleware('auth:sanctum');
Route::apiResource('auth/department',DepartmentsController::class)->middleware('auth:sanctum');
Route::apiResource('auth/vacation',VacationController::class)->middleware('auth:sanctum');
Route::apiResource('auth/debt',DebtController::class)->middleware('auth:sanctum');
Route::apiResource('auth/debt',DebtController::class)->middleware('auth:sanctum');
Route::apiResource('auth/expense',ExpenseController::class)->middleware('auth:sanctum');
Route::apiResource('auth/salarie',SalarieController::class)->middleware('auth:sanctum');
Route::apiResource('auth/customer',CustomerController::class)->middleware('auth:sanctum');
Route::apiResource('auth/product',ProductController::class)->middleware('auth:sanctum');
Route::apiResource('auth/group',GroupController::class)->middleware('auth:sanctum');
Route::apiResource('auth/task',TaskController::class)->middleware('auth:sanctum');
