<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\RolesController;

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

// Route::get('/', function () {
//     return view('admin.pages.roles.role_index');
// });

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/login/page', [AuthController::class, 'index'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login'); 
Route::get('/registration/page', [AuthController::class, 'registrationPage'])->name('registrationPage');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration'); 

Route::middleware('auth')->group(function(){
Route::get('/landingPage', [AuthController::class, 'landingPage'])->name('landingPage'); 
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

Route::group(['prefix'=>'admin'],function(){
Route::get('/role-index', [RolesController::class, 'index'])->name('role-index');
Route::get('/role-create', [RolesController::class, 'create'])->name('role-create');
Route::post('/role-store', [RolesController::class, 'store'])->name('role-store');

});

});


