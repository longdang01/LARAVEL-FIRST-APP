<?php

use App\Http\Controllers\api\ApiAccountController;
use App\Http\Controllers\api\ApiAdsController;
use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiCustomerController;
use App\Http\Controllers\api\ApiMigrationController;
use App\Http\Controllers\api\ApiNewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiSlideController;
use App\Http\Controllers\api\ApiStaffController;
use App\Http\Controllers\api\ApiSupplierController;

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
Route::resource('products', ApiProductController::class);
Route::resource('categories', ApiCategoryController::class);
Route::resource('suppliers', ApiSupplierController::class);
Route::resource('migrations', ApiMigrationController::class);

Route::resource('newss', ApiNewsController::class);
Route::resource('staffs', ApiStaffController::class);
Route::resource('accounts', ApiAccountController::class);

Route::resource('adss', ApiAdsController::class);
Route::resource('customers', ApiCustomerController::class);
Route::resource('slides', ApiSlideController::class);

