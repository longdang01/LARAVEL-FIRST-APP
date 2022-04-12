<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\BillExportController;
use App\Http\Controllers\BillImportController;
use App\Http\Controllers\BillExportDetailController;
use App\Http\Controllers\BillImportDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MigrationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Product
Route::get('/admin/product',[ProductController::class, 'index']);
Route::get('/admin/product/{id}/show',[ProductController::class, 'show']);
Route::post('/admin/product/create',[ProductController::class, 'create']);
Route::post('/admin/product/update',[ProductController::class, 'update']);
Route::get('/admin/product/{id}/delete',[ProductController::class, 'delete']);

/** =======Route: API======== */
Route::get('/admin/products', function() { return view('admin.product.product'); });
Route::get('/admin/categories', function() { return view('admin.category.category'); });
Route::get('/admin/suppliers', function() { return view('admin.supplier.supplier'); });
Route::get('/admin/migrations', function() { return view('admin.migration.migration'); });

Route::get('/admin/newss', function() { return view('admin.news.news'); });
Route::get('/admin/staffs', function() { return view('admin.staff.staff'); });
Route::get('/admin/accounts', function() { return view('admin.account.account'); });

Route::get('/admin/adss', function() { return view('admin.ads.ads'); });
Route::get('/admin/customers', function() { return view('admin.customer.customer'); });
Route::get('/admin/slides', function() { return view('admin.slide.slide'); });
/** ========================== */

//Category
Route::get('/admin/category',[CategoryController::class, 'index']);
Route::get('/admin/category/{id}/show',[CategoryController::class, 'show']);
Route::post('/admin/category/create',[CategoryController::class, 'create']);
Route::post('/admin/category/update',[CategoryController::class, 'update']);
Route::get('/admin/category/{id}/delete',[CategoryController::class, 'delete']);

//Supplier
Route::get('/admin/supplier',[SupplierController::class, 'index']);
Route::get('/admin/supplier/{id}/show',[SupplierController::class, 'show']);
Route::post('/admin/supplier/create',[SupplierController::class, 'create']);
Route::post('/admin/supplier/update',[SupplierController::class, 'update']);
Route::get('/admin/supplier/{id}/delete',[SupplierController::class, 'delete']);

//Migration
Route::get('/admin/migration',[MigrationController::class, 'index']);
Route::get('/admin/migration/{id}/show',[MigrationController::class, 'show']);
Route::post('/admin/migration/create',[MigrationController::class, 'create']);
Route::post('/admin/migration/update',[MigrationController::class, 'update']);
Route::get('/admin/migration/{id}/delete',[MigrationController::class, 'delete']);

//News
Route::get('/admin/news',[NewsController::class, 'index']);
Route::get('/admin/news/{id}/show',[NewsController::class, 'show']);
Route::post('/admin/news/create',[NewsController::class, 'create']);
Route::post('/admin/news/update',[NewsController::class, 'update']);
Route::get('/admin/news/{id}/delete',[NewsController::class, 'delete']);

//Staff
Route::get('/admin/staff',[StaffController::class, 'index']);
Route::get('/admin/staff/{id}/show',[StaffController::class, 'show']);
Route::post('/admin/staff/create',[StaffController::class, 'create']);
Route::post('/admin/staff/update',[StaffController::class, 'update']);
Route::get('/admin/staff/{id}/delete',[StaffController::class, 'delete']);

//Account
Route::get('/admin/account',[AccountController::class, 'index']);
Route::get('/admin/account/{id}/show',[AccountController::class, 'show']);
Route::post('/admin/account/create',[AccountController::class, 'create']);
Route::post('/admin/account/update',[AccountController::class, 'update']);
Route::get('/admin/account/{id}/delete',[AccountController::class, 'delete']);

//Ads
Route::get('/admin/ads',[AdsController::class, 'index']);
Route::get('/admin/ads/{id}/show',[AdsController::class, 'show']);
Route::post('/admin/ads/create',[AdsController::class, 'create']);
Route::post('/admin/ads/update',[AdsController::class, 'update']);
Route::get('/admin/ads/{id}/delete',[AdsController::class, 'delete']);

//Customer
Route::get('/admin/customer',[CustomerController::class, 'index']);
Route::get('/admin/customer/{id}/show',[CustomerController::class, 'show']);
Route::post('/admin/customer/create',[CustomerController::class, 'create']);
Route::post('/admin/customer/update',[CustomerController::class, 'update']);
Route::get('/admin/customer/{id}/delete',[CustomerController::class, 'delete']);

//Slide
Route::get('/admin/slide',[SlideController::class, 'index']);
Route::get('/admin/slide/{id}/show',[SlideController::class, 'show']);
Route::post('/admin/slide/create',[SlideController::class, 'create']);
Route::post('/admin/slide/update',[SlideController::class, 'update']);
Route::get('/admin/slide/{id}/delete',[SlideController::class, 'delete']);

//Bill export
Route::get('/admin/bill-export',[BillExportController::class, 'index']);
Route::get('/admin/bill-export/{id}/show',[BillExportController::class, 'show']);
Route::post('/admin/bill-export/create',[BillExportController::class, 'create']);
Route::post('/admin/bill-export/update',[BillExportController::class, 'update']);
Route::get('/admin/bill-export/{id}/delete',[BillExportController::class, 'delete']);

//Bill export detail
Route::get('/admin/bill-export-detail',[BillExportDetailController::class, 'index']);
Route::get('/admin/bill-export-detail/{id}/show',[BillExportDetailController::class, 'show']);
Route::post('/admin/bill-export-detail/create',[BillExportDetailController::class, 'create']);
Route::post('/admin/bill-export-detail/update',[BillExportDetailController::class, 'update']);
Route::get('/admin/bill-export-detail/{id}/delete',[BillExportDetailController::class, 'delete']);

//Bill import
Route::get('/admin/bill-import',[BillImportController::class, 'index']);
Route::get('/admin/bill-import/{id}/show',[BillImportController::class, 'show']);
Route::post('/admin/bill-import/create',[BillImportController::class, 'create']);
Route::post('/admin/bill-import/update',[BillImportController::class, 'update']);
Route::get('/admin/bill-import/{id}/delete',[BillImportController::class, 'delete']);

//Bill import detail
Route::get('/admin/bill-import-detail',[BillImportDetailController::class, 'index']);
Route::get('/admin/bill-import-detail/{id}/show',[BillImportDetailController::class, 'show']);
Route::post('/admin/bill-import-detail/create',[BillImportDetailController::class, 'create']);
Route::post('/admin/bill-import-detail/update',[BillImportDetailController::class, 'update']);
Route::get('/admin/bill-import-detail/{id}/delete',[BillImportDetailController::class, 'delete']);

//Store
Route::get('/admin/store',[StoreController::class, 'index']);
Route::get('/admin/store/{id}/show',[StoreController::class, 'show']);
Route::post('/admin/store/create',[StoreController::class, 'create']);
Route::post('/admin/store/update',[StoreController::class, 'update']);
Route::get('/admin/store/{id}/delete',[StoreController::class, 'delete']);

//Feedback
Route::get('/admin/feedback',[FeedbackController::class, 'index']);
Route::get('/admin/feedback/{id}/show',[FeedbackController::class, 'show']);
Route::post('/admin/feedback/create',[FeedbackController::class, 'create']);
Route::post('/admin/feedback/update',[FeedbackController::class, 'update']);
Route::get('/admin/feedback/{id}/delete',[FeedbackController::class, 'delete']);