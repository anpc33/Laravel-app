<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserCatalogueController;

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

Route::middleware(['CheckLogin'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

  Route::resource('user', UserController::class);
  /*
    1. get: /user --> name= user.index
    2. get: /user/create --> user.create
    3. post: /user --> name = user.store
    4. get: /user/{user} --> user.show
    5. get: /user/edit --> user.edit
    6. put: /user/{user} --> user.update
    7. delete: /user/{user} ---> user.destroy
  */


  Route::get('user/catalogue/index', [UserCatalogueController::class, 'index'])->name('user_catalogue.index');
  Route::get('user/catalogue/create', [UserCatalogueController::class, 'create'])->name('user_catalogue.create');
  Route::post('user/catalogue/create', [UserCatalogueController::class, 'store'])->name('user_catalogue.store');
});




Route::get('/login', [AuthController::class, 'CheckLog'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.login');
