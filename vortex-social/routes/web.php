<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\SignupController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware('auth:sanctum', 'verified')->group(function () {
// SELECT PLAN
Route::get('signup/plan', [SignupController::class, 'plan'])->name('signup.plan');
// BILLING INFO
Route::post('signup/welcome', [SignupController::class, 'saveNewAccount'])->name('signup.saveNewAccount');
Route::get('signup/billing/{plan}', [SignupController::class, 'billingAccount'])->name('signup.billingAccount');
// CHOOSE NUMBER
Route::get('/search-numbers', [SignupController::class, 'search'] )->name('search.numbers');
Route::post('/numbers/provision', [SignupController::class, 'provision'] )->name('number.provision');
// SETUP GROUP
Route::get('/signup/group', [SignupController::class, 'group'] )->name('signup.group');
Route::post('/signup/group', [SignupController::class, 'saveGroup'] )->name('signup.newGroup');

// SETUP QR
// PROFILE
Route::get('/signup/profile', [SignupController::class, 'profile'] )->name('signup.profile');
Route::post('/signup/profile', [SignupController::class, 'saveProfile'] )->name('signup.newProfile');

});
