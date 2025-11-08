<?php

// use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\home\AboutController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\home\BlogCategoryController;
use App\Http\Controllers\admin\WebsiteSettingController;

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
    Route::get('about/page', 'about')->name('about.page');
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



# portfolio route group

// Route::prefix('portfolio')->group(function () {
//     Route::get('us', function () {
//         return 'Portfolio Us';
//     });


// });


Route::controller(PortfolioController::class)->group(function () {

    Route::get('all/portfolio', 'AllPortfolio')->name('all.portfolio');

    Route::get('add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('store/portfolio', 'StorePortfolio')->name('store.portfolio');

    Route::get('edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::put('update/portfolio/{id}', 'UpdatePortfolio')->name('update.portfolio');

    Route::delete('delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');

    // Route::get('/portfolio/details/{portfolio:portfolio_name}',  'PortfolioDetails')->name('portfolio.details');
    Route::get('/portfolio/details/{id}',  'PortfolioDetails')->name('portfolio.details');
});


// Blog Category all Route
Route::controller(BlogCategoryController::class)->group(function () {

    # category Route
    // Route::get('all/category', 'AllCategory')->name('all.category');
    // Route::get('add/category', 'AddCategory')->name('add.category');
    // Route::post('store/category', 'StoreCategory')->name('store.category');
    // Route::get('edit/category/{id}', 'EditCategory')->name('edit.category');
    // Route::put('update/category/{id}', 'UpdateCategory')->name('update.category');
    // Route::delete('delete/category/{id}', 'DeleteCategory')->name('delete.category');


    Route::get('all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::post('store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::put('update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
    Route::delete('delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');

    # blog route
    Route::get('all/blog', 'AllBlog')->name('all.blog');
    Route::get('add/blog', 'AddBlog')->name('add.blog');
    Route::post('store/blog', 'StoreBlog')->name('store.blog');
    Route::get('edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::put('update/blog/{id}', 'UpdateBlog')->name('update.blog');
    Route::delete('delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
});


Route::controller(FrontendController::class)->group(function () {

    # Portfolio 
    Route::get('portfolio', 'Portfolio')->name('portfolio');
    Route::get('portfolio/details/{portfolio}', 'PortfolioDetails')->name('portfolio.details');

    Route::get('blog', 'blog')->name('blog');
    Route::get('blog/details/{blog}', 'BlogDetails')->name('blog-details');

    Route::get('category/post/{id}', 'CategoryPost')->name('category.post');


    # blog category
    // Route::get('blog/category/{blog_category}', 'BlogCategory')->name('blog.category');
    // Route::get('blog/category/{blog_category}/{blog}', 'BlogCategoryDetails')->name('blog.category.details');



});

# route group
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::prefix('frontend')->group(function () {
//     Route::get('/dashboard', 'AdminController@dashboard'); // Accessible at /admin/dashboard
//     Route::get('/settings', 'AdminController@settings');   // Accessible at /admin/settings
// });


Route::prefix('frontend')->group(function () {
    // Route::get('/users', 'AdminController@users')->name('users'); // Route name: admin.users
    // Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('portfolio', [FrontendController::class, 'Portfolio'])->name('portfolio');

    // Route::get('portfolio/details/{slug}', [FrontendController::class, 'PortfolioDetails'] )->name('portfolio.details');

    Route::get('portfolio/details/{portfolio:portfolio_title}', [FrontendController::class, 'PortfolioDetails'])
        ->name('portfolio.details');
});

# ================== Backend Route List ================== #

# route group prefix

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', 'AdminController@dashboard'); // Accessible at /admin/dashboard
//     Route::get('/settings', 'AdminController@settings');   // Accessible at /admin/settings
// });

// Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin']) // তুমি চাইলে middleware বাদ দিতে পারো
//     ->group(function () {

// 🧭 Dashboard
// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->name('dashboard');

// // 👥 Users
// Route::prefix('users')->name('users.')->group(function () {
//     Route::get('/', [UserController::class, 'index'])->name('index');
//     Route::get('/create', [UserController::class, 'create'])->name('create');
//     Route::post('/', [UserController::class, 'store'])->name('store');
//     Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [UserController::class, 'update'])->name('update');
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
// });

// // 🛍️ Products
// Route::prefix('products')->name('products.')->group(function () {
//     Route::get('/', [ProductController::class, 'index'])->name('index');
//     Route::get('/create', [ProductController::class, 'create'])->name('create');
//     Route::post('/', [ProductController::class, 'store'])->name('store');
//     Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [ProductController::class, 'update'])->name('update');
//     Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
// });

// // ⚙️ Settings
// Route::prefix('settings')->name('settings.')->group(function () {
//     Route::get('/', [SettingController::class, 'index'])->name('index');
//     Route::post('/update', [SettingController::class, 'update'])->name('update');
// });

// });



Route::prefix('admin')->name('admin.')->group(function () {


    # Blog Category Route
    // Route::get('blog-category',[BlogController::class,'index'])->name('blog-category');

    # Category Route
    Route::resource('category', CategoryController::class);

    # Blog Route
    Route::resource('blog', BlogController::class);

    // # Portfolio Route
    // Route::resource('portfolio',PortfolioController::class);

    // # Blog Category Route
    // Route::resource('blog-category',BlogCategoryController::class);

    # Comment Route
    Route::get('/comment', [CommentController::class, 'index'])->name('comment');

    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

    # Partner Route



    Route::get('partner', [PartnerController::class, 'index'])->name('partner');

    Route::get('partner/create', [PartnerController::class, 'create'])->name('partner.create');


    // # er moddy vul kothai
    // Route::get(uri: 'user/demo', [PartnerController::class, 'demoUser']); //vul asy

    // Route::get(uri: 'demo', [PartnerController::class, 'demo']); //vul asy

    // Route::get(uri: 'demo', action: [PartnerController::class, 'demo']); //sothik


    // Route::get('demo', [PartnerController::class, 'demo']);

    Route::get('partner/create', [PartnerController::class, 'create'])->name('partner.create');

    Route::post('partner/store', [PartnerController::class, 'store'])->name('partner.store');

    // extra route to delete single image (AJAX)
    Route::delete('partner-images/{image}', [PartnerController::class, 'destroyImage'])->name('partner-images.destroy');

    # image delete and update route
    Route::delete('/partner/image/{id}', [PartnerController::class, 'deleteImage'])->name('partner.image.delete');
    Route::post('/partner/image/update/{id}', [PartnerController::class, 'updateImage'])->name('partner.image.update');

    Route::get('partner/{partner}', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('partner/{partner}', [PartnerController::class, 'update'])->name('partner.update');


    # Client 
    Route::resource('client', ClientController::class);

    # Service Route
    Route::resource('service',ServiceController::class);

    # website Setting Route
    Route::get('website-setting/footer',[WebsiteSettingController::class,'FooterInfo'])->name('website-setting.footer');
    Route::put('website-setting/footer/{footer}',[WebsiteSettingController::class, 'FooterInfoUpdate'])->name('website-setting.footer.update');
    
});


Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::get('comment-reply-remove/{comment}', [CommentController::class, 'CommentRemove'])->name('comment-reply-remove');

 # services-details
Route::get('services-details/{service}',[ServiceController::class,'ServicesDetails'])->name('services-details');




require __DIR__ . '/auth.php';
