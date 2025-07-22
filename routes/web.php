<?php


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

# ============ Frontend  Routes Start ============ # 

# Frontend Routes and prefix with group

// Route::group(['prefix' => 'frontend'], function () {

//     Route::get('home', [DemoController::class, 'demo'])->name('frontend.home');
//     Route::get('about', function () {
//         echo "This is the frontend about page";
//     })->name('frontend.about');
// });


# ============ Frontend  Routes End ============ # 


# ============ Backend Routes Routes Start ============ # 

# Backend Routes and prefix with group

// Route::group(['prefix' => 'backend'], function () {

//     Route::get('dashboard', function () {
//         echo "This is the backend dashboard page";
//     })->name('backend.dashboard');

//     Route::get('settings', function () {
//         echo "This is the backend settings page";
//     })->name('backend.settings');
// });


# ============ Backend Routes Routes End ============ # 
