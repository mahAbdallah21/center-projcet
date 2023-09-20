<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

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

    Route::get('lang/{lang}', function ($lang)
    {
         if($lang =='en'|| $lang =='ar'){
              session()->put('lang',$lang);

              return back();
         }else{
            abort("403");
         }
    })->name('lang');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('companies')->as('companies.')->group(function(){
         Route::get('/', [CompanyController::class ,'index'])->name('index');
         Route::get('/create', [CompanyController::class ,'create'])->name('create');
         Route::post('/store', [CompanyController::class ,'store'])->name('store');

         Route::get('/edit/{id}', [CompanyController::class ,'edit'])->name('edit');
         Route::patch('/update/{id}', [CompanyController::class ,'update'])->name('update');
         Route::delete('/destroy/{id}', [CompanyController::class ,'destroy'])->name('destroy');
    });
    Route::resource('branches', BranchController::class);
    // Route::resource('branches', BranchController::class)->except('show');
    // Route::resource('branches', BranchController::class)->only('show');
    Route::resource('employees', EmployeeController::class );
    Route::resource('managers', ManagerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('courses', CourseController::class);
});

require __DIR__.'/auth.php';
