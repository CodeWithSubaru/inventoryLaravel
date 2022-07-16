<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PorfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\UnitController;

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
//     return view('frontend.index');
// });

Route::get('/login', function () {
    return view('auth.login')->name('login');
});

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)
        ->middleware(['auth', 'verified'])
        ->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.dashboard');

            // Profile
            Route::get('/admin/profile', 'profile')->name('admin.profile');
            Route::post('/admin/profile/store', 'store')->name('admin.profile.store');

            // Change Password
            Route::get('/admin/change-password', 'changePass')->name('admin.change-password');
            Route::post('/admin/change-password', 'updatePass')->name('admin.update-password');
        });
});

// Home Slider Routes
Route::controller(HomeSliderController::class)
    ->group(function () {

        // FrontEnd
        Route::get('/organizatory', 'home')->name('organizatory');

        // Configuration Admin

        // Home Slide Route
        Route::middleware(['auth'])->group(function () {
            Route::get('/admin/home-slide', 'index')->name('admin.page.home-slide');
            Route::post('/admin/home-slide/update', 'updateHome')->name('admin.page.home-slide.update');

            // Multi Image Route
            Route::get('/admin/add-multi-image', 'multiImage')->name('admin.page.add-multi-image.add');
            Route::post('/admin/add-multi-image/store', 'storeMultiImage')->name('admin.page.add-multi-image.store');
            Route::get('/admin/all-multi-image', 'multiImageAll')->name('admin.page.all-multi-image');
            Route::get('/admin/all-multi-image/edit/{id}', 'multiImageEdit')->name('admin.page.all-multi-image.edit');
            Route::post('/admin/all-multi-image/update', 'multiImageUpdate')->name('admin.page.all-multi-image.update');
            Route::get('/admin/all-multi-image/destroy/{id}', 'multiImageDelete')->name('admin.page.all-multi-image.destroy');
        });
    });

// About Routes
Route::controller(AboutController::class)
    ->group(function () {

        // FrontEnd
        Route::get('/organizatory/about', 'index')->name('organizatory.about');

        // Configuration Admin
        Route::middleware(['auth'])->group(function () {
            Route::get('/admin/about', 'about')->name('admin.page.about');
            Route::post('/admin/about/update', 'update')->name('admin.page.about.update');
        });
    });


// Porfolio Route
Route::controller(PorfolioController::class)
    ->group(function () {
        // Frontend
        Route::get('/organizatory/portfolio', 'home')->name('organizatory.portfolio');
        Route::get('/organizatory/portfolio-details/{id}', 'show')->name('organizatory.portfolio-details');

        Route::middleware(['auth'])->group(function () {
            Route::get('/admin/all-portfolio', 'index')->name('admin.page.all-portfolio');
            Route::get('/admin/add-portfolio', 'create')->name('admin.page.add-portfolio');
            Route::post('/admin/add-portfolio/store', 'store')->name('admin.page.add-portfolio.store');
            Route::get('/admin/edit-portfolio/edit/{id}', 'edit')->name('admin.page.edit-portfolio.edit');
            Route::post('/admin/update-portfolio/update/{id}', 'update')->name('admin.page.update-portfolio.update');
            Route::get('/admin/delete-portfolio/delete/{id}', 'destroy')->name('admin.page.delete-portfolio.delete');
        });
    });

// Blog Category Route
Route::middleware(['auth'])->group(function () {
    Route::controller(BlogCategoryController::class)
        ->group(function () {
            Route::get('/admin/all-blog-category', 'index')->name('admin.page.all-blog-category');
            Route::get('/admin/create-blog-category', 'create')->name('admin.page.create-blog-category');
            Route::post('/admin/store-blog-category', 'store')->name('admin.page.store-blog-category');
            Route::get('/admin/edit-blog-category/{id}', 'edit')->name('admin.page.edit-blog-category');
            Route::post('/admin/update-blog-category/{id}', 'update')->name('admin.page.update-blog-category');
            Route::get('/admin/delete-blog-category/{id}', 'destroy')->name('admin.page.delete-blog-category');
        });
});

// Blog Route
Route::controller(BlogController::class)
    ->group(function () {
        // Frontend
        Route::get('/organizatory/all-blogs', 'showAllBlogs')->name('organizatory.all-blogs');
        Route::get('/organizatory/blog-details/{id}', 'show')->name('organizatory.blog-details');
        Route::get('/organizatory/blog-category/{id}', 'showCategoryBlog')->name('organizatory.blog-category');

        // Admin Configuration
        Route::middleware(['auth'])->group(function () {
            Route::get('/admin/all-blogs', 'index')->name('admin.page.all-blogs');
            Route::get('/admin/add-blogs', 'create')->name('admin.page.add-blogs');
            Route::post('/admin/store-blogs', 'store')->name('admin.page.store-blogs');
            Route::get('/admin/edit-blogs/{id}', 'edit')->name('admin.page.edit-blogs');
            Route::post('/admin/update-blogs/{id}', 'update')->name('admin.page.update-blogs');
            Route::get('/admin/delete-blogs/{id}', 'destroy')->name('admin.page.delete-blogs');
        });
    });

Route::middleware(['auth'])->group(function () {
    Route::controller(FooterController::class)
        ->group(function () {
            Route::get('/admin/edit-footer', 'edit')->name('admin.page.edit-footer');
            Route::post('/admin/update-footer/{id}', 'update')->name('admin.page.update-footer');
        });
});

Route::controller(ContactController::class)
    ->group(function () {
        // Frontend
        Route::get('organizatory/contact', 'index')->name('organizatory.contact');
        Route::post('organizatory/store-contact', 'store')->name('organizatory.store-contact');

        // Admin Configuration
        Route::middleware(['auth'])->group(function () {
            Route::get('admin/all-contact', 'show')->name('admin.page.all-contact');
            Route::get('admin/delete-contact/{id}', 'destroy')->name('admin.page.delete-contact');
        });
    });


// Inventory Management

// Supplier Route
Route::middleware(['auth'])->group(function () {
    Route::controller(SupplierController::class)
        ->group(function () {
            // Admin Configuration
            Route::get('admin/supplier/all', 'index')->name('admin.supplier.all');
            Route::get('admin/supplier/add', 'create')->name('admin.supplier.add');
            Route::post('admin/supplier/store', 'store')->name('admin.supplier.store');
            Route::get('admin/supplier/edit/{id}', 'edit')->name('admin.supplier.edit');
            Route::post('admin/supplier/update', 'update')->name('admin.supplier.update');
            Route::get('admin/supplier/delete/{id}', 'destroy')->name('admin.supplier.delete');
        });
});

// Customer Route
Route::middleware(['auth'])->group(function () {
    Route::controller(CustomerController::class)
        ->group(function () {
            // Admin Configuration
            Route::get('admin/customer/all', 'index')->name('admin.customer.all');
            Route::get('admin/customer/add', 'create')->name('admin.customer.add');
            Route::post('admin/customer/store', 'store')->name('admin.customer.store');
            Route::get('admin/customer/edit/{id}', 'edit')->name('admin.customer.edit');
            Route::post('admin/customer/update', 'update')->name('admin.customer.update');
            Route::get('admin/customer/delete/{id}', 'destroy')->name('admin.customer.delete');
        });
});


// Unit Route
Route::middleware(['auth'])->group(function () {
    Route::controller(UnitController::class)
        ->group(function () {
            // Admin Configuration
            Route::get('admin/unit/all', 'index')->name('admin.unit.all');
            Route::get('admin/unit/add', 'create')->name('admin.unit.add');
            Route::post('admin/unit/store', 'store')->name('admin.unit.store');
            Route::get('admin/unit/edit/{id}', 'edit')->name('admin.unit.edit');
            Route::post('admin/unit/update', 'update')->name('admin.unit.update');
            Route::get('admin/unit/delete/{id}', 'destroy')->name('admin.unit.delete');
        });
});

// Category Route
Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)
        ->group(function () {
            // Admin Configuration
            Route::get('admin/category/all', 'index')->name('admin.category.all');
            Route::get('admin/category/add', 'create')->name('admin.category.add');
            Route::post('admin/category/store', 'store')->name('admin.category.store');
            Route::get('admin/category/edit/{id}', 'edit')->name('admin.category.edit');
            Route::post('admin/category/update', 'update')->name('admin.category.update');
            Route::get('admin/category/delete/{id}', 'destroy')->name('admin.category.delete');
        });
});

require __DIR__ . '/auth.php';
