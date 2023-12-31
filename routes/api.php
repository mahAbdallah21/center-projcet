<?php

use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\UserAuthController;
use App\Http\Controllers\PostController;
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
Route::apiResource('companies' , CompanyController::class);
Route::apiResource('branchs' , BranchController::class);
Route::apiResource('employees', EmployeeController::class);


Route::post('user/auth/register',[UserAuthController::class , 'register']);
Route::post('user/auth/login' , [UserAuthController::class, 'login']);
Route::get('user/posts', [PostController::class , 'index']);
