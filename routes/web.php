<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
  return redirect()->route('admin.login');
});

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('user.forgot_password');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

  Route::post('/mark-as-read', [NotificationController::class, 'markNotification'])->name('admin.markNotification');

  Route::resource('/user', UserController::class);
  Route::get('/user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
  Route::get('/user-status/{id}', [UserController::class, 'status'])->name('user.status');

  Route::resource('/roles', RoleController::class);
  Route::get('/roles-delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
});
