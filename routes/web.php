<?php

// use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

# Frontend Route
Route::get('/', function () {
    return view('frontend/index');
});

Route::get('frontend/banner', [FrontendController::class, 'banner'])->name('banner');


# Login to Dashboard
Route::get('/dashboard', function () {
    # Toaster Helper Function Using
    flashToastr('success', 'User Login Successfully');
    // return view('dashboard');
    return view('admin.index');

    // logout
    // Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');


})->middleware(['auth', 'verified'])->name('dashboard');

# Admin all Route

Route::controller(AdminController::class)->group(function () {

    // Route::get('/admin/login','login')->name('admin.login');
    Route::post('/admin/logout', 'logout')->name('admin.logout');
    //profile
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    //Edit Profile
    Route::get('/admin/edit/profile', 'EditProfile')->name('admin.edit.profile');
    //Update Profile
    Route::put('/admin/update/profile', 'UpdateProfile')->name('admin.update.profile');

    Route::get('/admin/change.password', 'ChangePassword')->name('admin.change.password');
    Route::put('admin.update.password', 'UpdatePassword')->name('admin.update.password');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# Backend Feature Route List

Route::controller(HomeSliderController::class)->group(function () {

    Route::get('home.slider', 'HomeSlider')->name('home.slider');
    Route::get('home/slider/create', 'create')->name('home.slider.create');
    Route::post('home/slider/store', 'store')->name('home.slider.store');

    Route::get('home/slider/edit/{slider}', 'edit')->name('home.slider.edit');
    Route::put('home/slider/update/{slider}', 'update')->name('home.slider.update');
    Route::get('home/slider/delete/{slider}', 'destroy')->name('home.slider.delete');
    // Route::delete('/home/slider/delete/{id}', HomeSliderController::class)->name('home.slider.delete');

    // Route::post('upload/slider', 'UploadSlider')->name('upload.slider');
    // Route::get('all/slider', 'AllSlider')->name('all.slider');
    // Route::get('edit/slider/{id}', 'EditSlider')->name('edit.slider');
    // Route::post('update/slider', 'UpdateSlider')->name('update.slider');
    // Route::get('delete/slider/{id}', 'DeleteSlider')->name('delete.slider');

});




require __DIR__ . '/auth.php';
