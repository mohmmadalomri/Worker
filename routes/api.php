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
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\OccupationController;
use App\Http\Controllers\Api\DeductionController;
use App\Http\Controllers\Api\JopController;

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

Route::post('auth/access-tokens/register', [AccessTokenController::class, 'register'])
    ->middleware('guest:sanctum');

Route::post('auth/access-tokens/forgotpassword', [AccessTokenController::class, 'forgotpassword'])
    ->middleware('guest:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/order/serach', [OrderController::class, 'serach']);
    Route::post('auth/user/serach', [UserController::class, 'serach']);
    Route::post('auth/department/serach', [DepartmentsController::class, 'serach']);
    Route::apiResource('auth/order', OrderController::class);
    Route::apiResource('auth/user', UserController::class);
    Route::apiResource('auth/department', DepartmentsController::class);
    Route::post('auth/vacation/serach', [VacationController::class, 'serach']);
    Route::get('auth/vacation/history', [VacationController::class, 'history']);
    Route::apiResource('auth/vacation', VacationController::class);
    Route::post('auth/debt/serach', [DebtController::class, 'serach']);
    Route::apiResource('auth/debt', DebtController::class);
    Route::post('auth/expense/serach', [ExpenseController::class, 'serach']);
    Route::apiResource('auth/expense', ExpenseController::class);
    Route::post('auth/salarie/serach', [SalarieController::class, 'serach']);
    Route::apiResource('auth/salarie', SalarieController::class);
    Route::post('auth/customer/serach', [CustomerController::class, 'serach']);
    Route::apiResource('auth/customer', CustomerController::class);
    Route::post('auth/product/serach', [ProductController::class, 'serach']);
    Route::apiResource('auth/product', ProductController::class);
    Route::post('auth/group/serach', [GroupController::class, 'serach']);
    Route::apiResource('auth/group', GroupController::class);
    Route::post('auth/task/serach', [TaskController::class, 'serach']);
    Route::apiResource('auth/task', TaskController::class);
    Route::post('auth/offer_prices/serach', [OfferPriceController::class, 'serach']);
    Route::apiResource('auth/offer_prices', OfferPriceController::class);
    Route::post('auth/invoice/serach', [InvoiceController::class, 'serach']);
    Route::apiResource('auth/invoice', InvoiceController::class);
    Route::post('auth/taskEmployee/serach', [TaskEmployeeController::class, 'serach']);
    Route::apiResource('auth/taskEmployee', TaskEmployeeController::class);
    Route::post('auth/project/serach', [ProjectController::class, 'serach']);
    Route::apiResource('auth/project', ProjectController::class);
    Route::post('auth/holiday/serach', [HolidayController::class, 'serach']);
    Route::apiResource('auth/holiday', HolidayController::class);
    Route::post('auth/occupation/serach', [OccupationController::class, 'serach']);
    Route::post('auth/deduction/serach', [DeductionController::class, 'serach']);
    Route::apiResource('auth/deduction', DeductionController::class);
    Route::apiResource('auth/occupation', OccupationController::class);
    Route::post('auth/jop/serach', [JopController::class, 'serach']);
    Route::apiResource('auth/jop', JopController::class);

});





