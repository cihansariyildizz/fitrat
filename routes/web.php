<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\FoodFormController;
use App\Http\Controllers\VerilerFormController;
use App\Http\Controllers\SevenDayPlanController;
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
    return view('auth.login');
});


Route::group(['middleware' => ['AlreadyLoggedIn']], function () {
    Route::get('login', [UserAuthController::class, 'login']);
    Route::get('register', [UserAuthController::class, 'register']);
    Route::get('planner', [SevenDayPlanController::class, 'showPlan']);
    Route::get('foodform', [FoodFormController::class, 'foodform']);
    Route::get('veriform', [VerilerFormController::class, 'veriform']);
    Route::get('welcoming', [UserAuthController::class, 'nextpage']);
});



Route::get('admin', [UserAuthController::class, 'admin']);
Route::get('profile', [SevenDayPlanController::class, 'show']);


Route::post('addpro', [FoodFormController::class, 'addproduct'])->name('auth.add_product');
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
// Route::post('createfood', [FoodFormController::class, 'create'])->name('auth.create_food');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');

Route::post('createveri', [VerilerFormController::class, 'create'])->name('auth.create_veri');

Route::post('createPlan', [SevenDayPlanController::class, 'generateMealPlan7days'])->name('create_foodplan');
Route::get('logout', [UserAuthController::class, 'logout']);





