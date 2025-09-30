<?php

// use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Frontend\FrontendController;

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
})->name('website');

Route::get('frontend/banner', [FrontendController::class, 'banner'])->name('banner');
Route::get('frontend/about', [FrontendController::class, 'about'])->name('about');

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


# About Page All Route
Route::controller(AboutController::class)->group(function () {
    
    //Route List
    Route::get('about/page','about')->name('about.page');
    //update about
    Route::put('update/about/{id}', 'AboutUpdate')->name('update.about');

    // about Multi Image
    Route::get('about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    // Route::get('about/multi/image', ' MultiImage')->name('about.multi.image');


    Route::get('all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::post('store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    Route::get('edit/multi/image/{edit}', 'EditMultiImage')->name('edit.multi-image');
    Route::put('update/multi/image/{update}', 'UpdateMultiImage')->name('update.multi-image');

  //  Route::get('delete/multi/image/{delete}', 'DeleteMultiImage')->name('delete.multi-image');

    Route::delete('delete/multi/image/{delete}', 'DeleteMultiImage')->name('delete.multi-image');


    
});

# about prefix and group set
// Route::prefix('about')->group(function () {
//     Route::get('us', function () {
//         return 'About Us';
//     });
//     Route::get('me', function () {
//         return 'About Me';
//     });
// });

# about* Route
// Route::get('about/us', function () {
//     return 'About Us';
// });
// Route::get('about/me', function () {
//     return 'About Me';
// });

# about.* Route
// Route::get('about.*', function () {
//     return 'About Us';
// });




require __DIR__ . '/auth.php';
