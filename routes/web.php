<?php

use Illuminate\Support\Facades\Route;
//Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoriesController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\EditorUploadsController;
use App\Http\Controllers\Admin\brandsController;
use App\Http\Controllers\Admin\colorController;
use App\Http\Controllers\Admin\sizeController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\FrontendController;




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
Route::get('/', [FrontendController::class,"index"])->name('frontend.home');

Route::get('/invitation', [FrontendController::class,"invitation"])->name('frontend.invitation');
Route::get('/service', [FrontendController::class,"service"])->name('frontend.service');
Route::get('/more-info/{id?}', [FrontendController::class,"more_info"])->name('frontend.more-info');
Route::get('/vendor', [FrontendController::class,"vendor"])->name('frontend.vendor');
Route::get('/venue', [FrontendController::class,"venue"])->name('frontend.venue');
Route::get('/contactus', [FrontendController::class,"contactus"])->name('frontend.contactus');
Route::POST('/contact-us', [FrontendController::class,"contactusForm"])->name('frontend.contact.data');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Account
    Route::get('/account/{id}', [UserController::class, 'edit'])->name('admin.account');
    Route::post('/account/{id}', [UserController::class, 'update'])->name('admin.account.update');

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::post('/category/tabledata', [CategoryController::class, 'tabledata'])->name('admin.category.tabledata');
    Route::get('/category/add-new-category', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/category/update-category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('/category/update-category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // Subcategories
    Route::get('/Subcategories', [SubcategoriesController::class, 'index'])->name('admin.Subcategories.index');
    Route::post('/Subcategories/tabledata', [SubcategoriesController::class, 'tabledata'])->name('admin.Subcategories.tabledata');
    Route::get('/Subcategories/add-new-Subcategories', [SubcategoriesController::class, 'create'])->name('admin.Subcategories.create');
    Route::get('/Subcategories/update-Subcategories/{id}', [SubcategoriesController::class, 'edit'])->name('admin.Subcategories.edit');
    Route::post('/Subcategories/store', [SubcategoriesController::class, 'store'])->name('admin.Subcategories.store');
    Route::post('/Subcategories/update-Subcategories/{id}', [SubcategoriesController::class, 'update'])->name('admin.Subcategories.update');
    Route::delete('/Subcategories/delete/{id}', [SubcategoriesController::class, 'destroy'])->name('admin.Subcategories.destroy');

    // Page
    Route::get('/page', [PageController::class, 'index'])->name('admin.page.index');
    Route::post('/page/tabledata', [PageController::class, 'tabledata'])->name('admin.page.tabledata');
    Route::get('/page/add-new-page', [PageController::class, 'create'])->name('admin.page.create');
    Route::get('/page/update-page/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
    Route::post('/page/store', [PageController::class, 'store'])->name('admin.page.store');
    Route::post('/page/update-page/{id}', [PageController::class, 'update'])->name('admin.page.update');
    Route::delete('/page/delete/{id}', [PageController::class, 'destroy'])->name('admin.page.destroy');

    // Section
    Route::get('/section', [SectionController::class, 'index'])->name('admin.section.index');
    Route::post('/section/tabledata', [SectionController::class, 'tabledata'])->name('admin.section.tabledata');
    Route::get('/section/update-section/{id}', [SectionController::class, 'edit'])->name('admin.section.edit');
    Route::post('/section/store', [SectionController::class, 'store'])->name('admin.section.store');
    Route::post('/section/update-section/{id}', [SectionController::class, 'update'])->name('admin.section.update');

    // Service
    Route::get('/service', [ServiceController::class, 'index'])->name('admin.service.index');
    Route::post('/service/tabledata', [ServiceController::class, 'tabledata'])->name('admin.service.tabledata');
    Route::get('/service/add-service', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/service/update-service/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/service/update-service/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');


    Route::get('/service', [ServiceController::class, 'index'])->name('admin.service.index');
    Route::post('/service/tabledata', [ServiceController::class, 'tabledata'])->name('admin.service.tabledata');
    Route::get('/service/add-service', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/service/update-service/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/service/update-service/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    // Portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio.index');
    Route::post('/portfolio/tabledata', [PortfolioController::class, 'tabledata'])->name('admin.portfolio.tabledata');
    Route::get('/portfolio/add-new-portfolio/{portfolio?}', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::get('/portfolio/update-portfolio/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::post('/portfolio/update-portfolio/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');
    Route::get('/portfolio/removeimage/{id}/{slug}', [PortfolioController::class, 'removeimage'])->name('admin.portfolio.removeimage');

    // Faq
    Route::post('/faq/tabledata', [FaqController::class, 'tabledata'])->name('admin.faq.tabledata');
    Route::get('/faq/add-new-faq', [FaqController::class, 'create'])->name('admin.faq.create');
    Route::get('/faq/update-faq/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::post('/faq/update-faq/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');
    Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');

    // Testimonial
    Route::get('/review', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::post('/review/tabledata', [TestimonialController::class, 'tabledata'])->name('admin.testimonial.tabledata');
    Route::get('/review/add-new-review', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
    Route::get('/review/update-review/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
    Route::post('/review/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::post('/review/update-review/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::delete('/review/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');

    // Setting
    Route::get('/settings/update-settings/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::post('/settings/update-settings/{id}', [SettingController::class, 'update'])->name('admin.setting.update');

    // Lead
    Route::get('/lead', [LeadController::class, 'index'])->name('admin.lead.index');
    Route::post('/lead/tabledata', [LeadController::class, 'tabledata'])->name('admin.lead.tabledata');
    Route::get('/lead/lead-details/{id}', [LeadController::class, 'show'])->name('admin.lead.show');
    Route::delete('/lead/delete/{id}', [LeadController::class, 'destroy'])->name('admin.lead.destroy');


    // Tinymce image upload handler
    Route::post('/handleeditoruploads', [EditorUploadsController::class, 'upload'])->name('admin.editoruploads.upload');

    //Brands
    Route::get('/brand', [brandsController::class, 'index'])->name('admin.brand.index');
    Route::post('/brand/tabledata', [brandsController::class, 'tabledata'])->name('admin.brand.tabledata');
    Route::get('/brand/add-new-brand', [brandsController::class, 'create'])->name('admin.brand.create');
    Route::get('/brand/update-brand/{id}', [brandsController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/brand/store', [brandsController::class, 'store'])->name('admin.brand.store');
    Route::post('/brand/update-brand/{id}', [brandsController::class, 'update'])->name('admin.brand.update');
    Route::delete('/brand/delete/{id}', [brandsController::class, 'destroy'])->name('admin.brand.destroy');

    //colors
    Route::get('/color', [colorController::class, 'index'])->name('admin.color.index');
    Route::post('/color/tabledata', [colorController::class, 'tabledata'])->name('admin.color.tabledata');
    Route::get('/color/add-new-color', [colorController::class, 'create'])->name('admin.color.create');
    Route::get('/color/update-color/{id}', [colorController::class, 'edit'])->name('admin.color.edit');
    Route::post('/color/store', [colorController::class, 'store'])->name('admin.color.store');
    Route::post('/color/update-color/{id}', [colorController::class, 'update'])->name('admin.color.update');
    Route::delete('/color/delete/{id}', [colorController::class, 'destroy'])->name('admin.color.destroy');

    //size
    Route::get('/size', [sizeController::class, 'index'])->name('admin.size.index');
    Route::post('/size/tabledata', [sizeController::class, 'tabledata'])->name('admin.size.tabledata');
    Route::get('/size/add-new-size', [sizeController::class, 'create'])->name('admin.size.create');
    Route::get('/size/update-size/{id}', [sizeController::class, 'edit'])->name('admin.size.edit');
    Route::post('/size/store', [sizeController::class, 'store'])->name('admin.size.store');
    Route::post('/size/update-size/{id}', [sizeController::class, 'update'])->name('admin.size.update');
    Route::delete('/size/delete/{id}', [sizeController::class, 'destroy'])->name('admin.size.destroy');

     //product
       Route::get('/product', [productController::class, 'index'])->name('admin.product.index');
       Route::post('/product/tabledata', [productController::class, 'tabledata'])->name('admin.product.tabledata');
       Route::get('/product/add-new-product', [productController::class, 'create'])->name('admin.product.create');
       Route::get('/product/update-product/{id}', [productController::class, 'edit'])->name('admin.product.edit');
       Route::post('/product/store', [productController::class, 'store'])->name('admin.product.store');
       Route::post('/product/update-product/{id}', [productController::class, 'update'])->name('admin.product.update');
       Route::delete('/product/delete/{id}', [productController::class, 'destroy'])->name('admin.product.destroy');


});


require __DIR__.'/auth.php';
