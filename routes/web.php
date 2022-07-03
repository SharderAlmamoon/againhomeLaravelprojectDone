<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

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

Route::get('/view',function(){
    return view('backend.dashboard');
})->name('backenddashboard');
// For Vendor
Route::get('/vendormanage',[VendorController::class,'index'])->name('vendormanage');
Route::post('/vendorstore',[VendorController::class,'store']);
Route::get('/forshow',[VendorController::class,'forshow']);
Route::get('/vendoreditforshow/{id}',[VendorController::class,'vendoreditforshow']);
Route::post('/updatedVendor/{id}',[VendorController::class,'update']);
Route::get('/delteforid/{id}',[VendorController::class,'destroy']);