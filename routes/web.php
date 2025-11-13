<?php

// use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\admin\ServiceController;
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

# ============== Frontend Route Start ============== #

# -> Frontend root url
Route::get('/', function () {
    return view('frontend/index');
})->name('website');


# Post with Comment
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::get('comment-reply-remove/{comment}', [CommentController::class, 'CommentRemove'])->name('comment-reply-remove');


# Frontend Route 
Route::controller(FrontendController::class)->group(function () {

    Route::get('banner', 'banner')->name('banner');
    Route::get('about', 'about')->name('about');

    #service
    Route::get('service', 'Service')->name('service');
    Route::get('service/details/{service:title}', 'ServicesDetails')->name('service.details');

    # Portfolio 
    Route::get('portfolio', 'Portfolio')->name('portfolio');
    // Route::get('portfolio/details/{portfolio}', 'PortfolioDetails')->name('portfolio.details');
    Route::get('portfolio/details/{portfolio:portfolio_title}', 'PortfolioDetails')->name('portfolio.details');

    # Blog
    Route::get('blog', 'blog')->name('blog');
    Route::get('blog/details/{blog:blog_title}', 'BlogDetails')->name('blog-details');

    # Category
    Route::get('category/post/{id}', 'CategoryPost')->name('category.post');

    # blog category
    // Route::get('blog/category/{blog_category}', 'BlogCategory')->name('blog.category');
    // Route::get('blog/category/{blog_category}/{blog}', 'BlogCategoryDetails')->name('blog.category.details');

    # Contact
    Route::get('contact', 'Contact')->name('contact');
    Route::post('contact/store', 'ContactStore')->name('contact.store');
    
});


# ============== Frontend Route End ============== #


require __DIR__ . '/auth.php';

// admin route
// require __DIR__ . '/admin.php';
