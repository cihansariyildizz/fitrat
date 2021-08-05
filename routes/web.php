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

});








Route::get('veriform', [VerilerFormController::class, 'veriform']);
Route::get('foodform', [FoodFormController::class, 'foodform']);

Route::post('/create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('/createfood', [FoodFormController::class, 'create'])->name('auth.create_food');
Route::post('/check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('logout', [UserAuthController::class, 'logout']);
Route::post('/createveri', [VerilerFormController::class, 'create'])->name('auth.create_veri');


Route::post('createPlan', [SevenDayPlanController::class, 'planner'])->name('create_foodplan');


Route::get('profile', [UserAuthController::class, 'profile']);
Route::get('planner', [SevenDayPlanController::class, 'showPlan']);

