<?php
use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('products',productController::class);


//public routes
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/products',[productController::class, 'index']);
Route::get('/products/{id}',[productController::class, 'show']);
Route::get('/products/search/{name}',[productController::class, 'search']);




//protected routes
 Route::group(['middleware'=>['auth:sanctum']] , function () {
    Route::post('/products',[productController::class, 'store']);
    Route::put('/products/{id}',[productController::class, 'update']);
    Route::delete('/products/{id}',[productController::class, 'destroy']);
    Route::post('/logout',[AuthController::class, 'logout']);



});

// Route::get('/products',[productController::class, 'index']);
// Route::post('/products',[productController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
