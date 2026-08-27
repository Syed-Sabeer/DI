<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPrivacyPolicyController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCareerController;

use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminNewsbarController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminWebsiteController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminNewsletterSubmissionController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminServicePageController;

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Common\DashboardController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Frontend\SitemapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;


Route::group(['middleware' => ['guest']], function () {

    //User Login Authentication Routes
    Route::get('admin/login', [LoginController::class, 'login'])->name('login');
    Route::post('login-attempt', [LoginController::class, 'loginAttempt'])->name('login.attempt');
    Route::get('login', [LoginController::class, 'userlogin'])->name('user.login');

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('registration-attempt', [RegisterController::class, 'registerAttempt'])->name('register.attempt');
Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');



});


Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'store'])->middleware('throttle:3,1')->name('contact.submit');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::get('/service', [WebsiteController::class, 'service'])->name('service');
Route::get('/portfolio', [WebsiteController::class, 'portfolio'])->name('portfolio');
Route::get('/service-detail/{slug?}', [WebsiteController::class, 'serviceDetail'])->name('service.detail');




Route::group(['middleware' => ['auth']], function () {
    Route::get('login-verification', [AuthController::class, 'login_verification'])->name('login.verification');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('verify-account', [AuthController::class, 'verify_account'])->name('verify.account');
    Route::post('resend-code', [AuthController::class, 'resend_code'])->name('resend.code');


    Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verification_verify'])->middleware(['signed'])->name('verification.verify');
    Route::get('email/verify', [AuthController::class, 'verification_notice'])->name('verification.notice');
    Route::post('email/verification-notification', [AuthController::class, 'verification_send'])->middleware(['throttle:2,1'])->name('verification.send');

});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // FAQ Routes
    Route::get('faq', [AdminFaqController::class, 'index'])->name('faq.index');
    Route::get('faq/add', [AdminFaqController::class, 'add'])->name('faq.add');




    Route::post('faq/store', [AdminFaqController::class, 'store'])->name('faq.store');
    Route::get('faq/{id}/edit', [AdminFaqController::class, 'edit'])->name('faq.edit');
    Route::put('faq/{id}', [AdminFaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{id}', [AdminFaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('faq/{id}/toggle-visibility', [AdminFaqController::class, 'toggleVisibility'])->name('faq.toggleVisibility');

    // Privacy Policy Routes
    Route::get('privacy-policy', [AdminPrivacyPolicyController::class, 'index'])->name('privacy-policy.index');
    Route::get('privacy-policy/add', [AdminPrivacyPolicyController::class, 'add'])->name('privacy-policy.add');
    Route::post('privacy-policy/store', [AdminPrivacyPolicyController::class, 'store'])->name('privacy-policy.store');
    Route::get('privacy-policy/{id}/edit', [AdminPrivacyPolicyController::class, 'edit'])->name('privacy-policy.edit');
    Route::put('privacy-policy/{id}', [AdminPrivacyPolicyController::class, 'update'])->name('privacy-policy.update');
    Route::delete('privacy-policy/{id}', [AdminPrivacyPolicyController::class, 'destroy'])->name('privacy-policy.destroy');
    Route::post('privacy-policy/{id}/toggle-visibility', [AdminPrivacyPolicyController::class, 'toggleVisibility'])->name('privacy-policy.toggleVisibility');

    // Service Routes
    Route::get('service', [AdminServiceController::class, 'index'])->name('service.index');
    Route::get('service/add', [AdminServiceController::class, 'add'])->name('service.add');
    Route::post('service/store', [AdminServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [AdminServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{id}', [AdminServiceController::class, 'update'])->name('service.update');
    Route::delete('service/{id}', [AdminServiceController::class, 'destroy'])->name('service.destroy');
    Route::post('service/{id}/toggle-visibility', [AdminServiceController::class, 'toggleVisibility'])->name('service.toggleVisibility');

 
    // Testimonials Routes
    Route::get('testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('testimonials/add', [AdminTestimonialController::class, 'add'])->name('testimonials.add');
    Route::post('testimonials/store', [AdminTestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('testimonials/{id}/edit', [AdminTestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('testimonials/{id}', [AdminTestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonials/{id}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::post('testimonials/{id}/toggle-visibility', [AdminTestimonialController::class, 'toggleVisibility'])->name('testimonials.toggleVisibility');



    // Blog Routes
    Route::get('blog', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('blog/add', [AdminBlogController::class, 'add'])->name('blog.add');
    Route::post('blog/store', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{id}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');
    Route::post('blog/{id}/toggle-visibility', [AdminBlogController::class, 'toggleVisibility'])->name('blog.toggleVisibility');
    Route::post('blog/categories', [AdminBlogController::class, 'categoryStore'])->name('blog.categories.store');
    Route::delete('blog/categories/{id}', [AdminBlogController::class, 'categoryDestroy'])->name('blog.categories.destroy');

    Route::get('careers', [AdminCareerController::class, 'index'])->name('careers.index');
    Route::get('careers/add', [AdminCareerController::class, 'create'])->name('careers.create');
    Route::post('careers', [AdminCareerController::class, 'store'])->name('careers.store');
    Route::get('careers/{career}/edit', [AdminCareerController::class, 'edit'])->name('careers.edit');
    Route::put('careers/{career}', [AdminCareerController::class, 'update'])->name('careers.update');
    Route::delete('careers/{career}', [AdminCareerController::class, 'destroy'])->name('careers.destroy');
    Route::post('careers/{career}/toggle-visibility', [AdminCareerController::class, 'toggleVisibility'])->name('careers.toggle-visibility');




    // About Section Routes

        Route::get('newsbar', [AdminNewsbarController::class, 'index'])->name('newsbar.index');
    Route::get('newsbar/add', [AdminNewsbarController::class, 'add'])->name('newsbar.add');
    Route::post('newsbar/store', [AdminNewsbarController::class, 'store'])->name('newsbar.store');
    Route::get('newsbar/{id}/edit', [AdminNewsbarController::class, 'edit'])->name('newsbar.edit');
    Route::put('newsbar/{id}', [AdminNewsbarController::class, 'update'])->name('newsbar.update');
    Route::delete('newsbar/{id}', [AdminNewsbarController::class, 'destroy'])->name('newsbar.destroy');


    // Company Settings
    Route::get('company-settings', [AdminSettingController::class, 'index'])->name('company.settings');
    Route::put('business-settings/update', [AdminSettingController::class, 'updateBusinessSettings'])->name('business.settings.update');

    // Website CMS sections
    Route::get('website', [AdminWebsiteController::class, 'index'])->name('website.index');
    Route::get('ourcompany-cms', [AdminWebsiteController::class, 'OurCompanyCms'])->name('ourcompany.cms');
    Route::put('ourcompany-cms/update', [AdminWebsiteController::class, 'updateOurCompanyCms'])->name('ourcompany.cms.update');
    Route::get('contact', [AdminContactPageController::class, 'index'])->name('contact.index');
    Route::get('home', [AdminHomePageController::class, 'index'])->name('home.index');
    Route::get('service-page', [AdminServicePageController::class, 'index'])->name('service-page.index');
    Route::get('company-welcome', [AdminWebsiteController::class, 'companyWelcome'])->name('company.welcome');
    Route::put('company-welcome/update', [AdminWebsiteController::class, 'companyWelcomeUpdate'])->name('company.welcome.update');

    Route::get('about', [AdminAboutController::class, 'index'])->name('about.index');

    Route::put('website/sections/update', [AdminWebsiteController::class, 'updateAllSections'])->name('website.sections.update');
    Route::put('contact/sections/update', [AdminContactPageController::class, 'updateContact'])->name('contact.update');
    Route::put('home/update', [AdminHomePageController::class, 'updateHomePage'])->name('home.update');
    Route::put('service-page/update', [AdminServicePageController::class, 'updateServicePage'])->name('service-page.update');
    Route::put('about/update', [AdminAboutController::class, 'update'])->name('about.update');
    Route::put('royalty/update', [AdminWebsiteController::class, 'updateRoyaltyCms'])->name('royalty.update');

    Route::get('contacts', [AdminContactPageController::class, 'index'])->name('contactsubmission.index');
    Route::get('contactlist', [AdminContactController::class, 'index'])->name('contactlist');
    Route::get('newsletterlist', [AdminNewsletterSubmissionController::class, 'index'])->name('newsletterlist');
    Route::delete('newsletterlist/{id}', [AdminNewsletterSubmissionController::class, 'destroy'])->name('newsletterlist.destroy');
Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contact.destroy');



});
