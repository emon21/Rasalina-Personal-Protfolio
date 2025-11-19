<?php


use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\WebsiteSettingController;

/*
* Admin All Route List
*/

// Admin Login
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');


# Login to Dashboard
Route::get('/dashboard', function () {
   
   # Toaster Helper Function Using
   flashToastr('success', 'User Login Successfully');
   // return view('dashboard');
   return view('admin.index');

   // logout
   // Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');

})->middleware(['auth', 'verified'])->name('dashboard');
# ============== Backend Route Start ============== #


Route::prefix('admin')->middleware(['auth'])
   ->name('admin.') // 👈 automatically prefixes all route names with "admin."
   ->group(function () {

      # 👥 Users Management

      # Admin all Route
      Route::controller(AdminController::class)->group(function () {

         // Route::get('/admin/login', 'login')->name('login');
         Route::post('/admin/logout', 'logout')->name('logout');

         # 🏠 Dashboard
         Route::get('/dashboard', 'Dashboard')->name('dashboard');

         //profile
         Route::get('/admin/profile', 'profile')->name('profile');
         //Edit Profile
         Route::get('/admin/edit/profile', 'EditProfile')->name('edit.profile');
         //Update Profile
         Route::put('/admin/update/profile', 'UpdateProfile')->name('update.profile');

         Route::get('/admin/change.password', 'ChangePassword')->name('change.password');
         Route::put('admin.update.password', 'UpdatePassword')->name('update.password');
      });

      # Slider 
      Route::controller(SliderController::class)->group(function () {

         Route::get('slider', 'HomeSlider')->name('slider');
         //create,store
         Route::get('slider/create', 'create')->name('slider.create');
         Route::post('slider/store', 'store')->name('slider.store');
         // edit,update
         Route::get('slider/edit/{slider}', 'edit')->name('slider.edit');
         Route::put('slider/update/{slider}', 'update')->name('slider.update');
         //delete
         Route::get('slider/delete/{slider}', 'destroy')->name('slider.delete');

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
      Route::get('about', 'about')->name('about');
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

   Route::controller(PortfolioController::class)->group(function () {

      Route::get('portfolio', 'AllPortfolio')->name('portfolio');

      Route::get('add/portfolio', 'AddPortfolio')->name('add.portfolio');
      Route::post('store/portfolio', 'StorePortfolio')->name('store.portfolio');

      Route::get('edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
      Route::put('update/portfolio/{id}', 'UpdatePortfolio')->name('update.portfolio');

      Route::delete('delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');

      // Route::get('/portfolio/details/{portfolio:portfolio_name}',  'PortfolioDetails')->name('portfolio.details');
      Route::get('/portfolio/details/{id}',  'PortfolioDetails')->name('portfolio.details');
   });

   # Blog Category Route
    // Route::get('blog-category',[BlogController::class,'index'])->name('blog-category');

    # Category Route
    Route::resource('category', CategoryController::class);

    # Blog Route
    Route::resource('blog', BlogController::class);

    # Portfolio Route
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
    Route::resource('service', ServiceController::class);

    # website Setting Route
    Route::get('website-setting/footer', [WebsiteSettingController::class, 'FooterInfo'])->name('website-setting.footer');
    Route::put('website-setting/footer/{footer}', [WebsiteSettingController::class, 'FooterInfoUpdate'])->name('website-setting.footer.update');

    # Contact Route 

    Route::get('contact', [WebsiteSettingController::class, 'Contact'])->name('contact');
    Route::get('contact/delete/{contact}', [WebsiteSettingController::class, 'DeleteMessage'])->name('contact.delete');


   });


# ================== Backend Route List ================== #
