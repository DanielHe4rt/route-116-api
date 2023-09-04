<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/customers')->group(function () {
    Route::get('/', [CustomersController::class, 'getCustomers'])->name('customers.index');
    Route::post('/', [CustomersController::class, 'postCustomer'])->name('customers.store');
    Route::put('/{customer}', [CustomersController::class, 'putCustomer'])->name('customers.update');
    Route::delete('/{customer}', [CustomersController::class, 'deleteCustomer'])->name('customers.delete');
});

Route::prefix('/products')->group(function () {
    Route::get('/', [ProductsController::class, 'getProducts'])->name('products.index');
});

Route::post('/carts');
Route::post('/carts/{cartId}/products/{productId}');

Route::get('/checkout/{cartId}');
Route::post('/checkout/{cartId}'); // enviar descontos, metodo etc

