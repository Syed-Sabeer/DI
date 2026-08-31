<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCareerController;
use App\Http\Controllers\Admin\AdminCareerApplicationController;


use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminNewsletterSubmissionController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminHomePageController;

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\CareerApplicationController;
use App\Http\Controllers\Frontend\NewsletterSubscriptionController;

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
Route::get('/llms.txt', [SitemapController::class, 'llms'])->name('llms');

Route::middleware('track.visitor')->group(function () {
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/career', [CareerController::class, 'index'])->name('careers');
Route::get('/career/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::get('/service', [WebsiteController::class, 'service'])->name('service');
Route::get('/portfolio', [WebsiteController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [WebsiteController::class, 'portfolioDetail'])->name('portfolio.detail');
Route::get('/service-detail/{slug?}', [WebsiteController::class, 'serviceDetail'])->name('service.detail');
Route::get('/privacy-policy', [WebsiteController::class, 'privacyPolicy'])->name('privacy');
Route::get('/terms-conditions', [WebsiteController::class, 'termsConditions'])->name('terms');
Route::get('/legal', [WebsiteController::class, 'legal'])->name('legal');
});

Route::post('/contact/submit', [ContactController::class, 'store'])->middleware('throttle:3,1')->name('contact.submit');
Route::post('/newsletter/subscribe', [NewsletterSubscriptionController::class, 'store'])->middleware('throttle:5,1')->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{subscriber}', [NewsletterSubscriptionController::class, 'destroy'])->middleware(['signed', 'throttle:10,1'])->name('newsletter.unsubscribe');
Route::post('/newsletter/unsubscribe/{subscriber}', [NewsletterSubscriptionController::class, 'destroy'])->middleware(['signed', 'throttle:10,1'])->name('newsletter.unsubscribe.one-click');
Route::post('/career/{career}/apply', [CareerApplicationController::class, 'store'])->middleware('throttle:3,10')->name('careers.apply');




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
    Route::get('dashboard/location-breakdown', [AdminDashboardController::class, 'locationBreakdown'])->name('dashboard.location-breakdown');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

  


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




    Route::get('contact', [AdminContactPageController::class, 'index'])->name('contact.index');
    Route::get('home', [AdminHomePageController::class, 'index'])->name('home.index');


    Route::put('contact/sections/update', [AdminContactPageController::class, 'updateContact'])->name('contact.update');
    Route::put('home/update', [AdminHomePageController::class, 'updateHomePage'])->name('home.update');

    Route::get('contacts', [AdminContactPageController::class, 'index'])->name('contactsubmission.index');
    Route::get('contactlist', [AdminContactController::class, 'index'])->name('contactlist');
    Route::get('newsletterlist', [AdminNewsletterSubmissionController::class, 'index'])->name('newsletterlist');
    Route::delete('newsletterlist/{id}', [AdminNewsletterSubmissionController::class, 'destroy'])->name('newsletterlist.destroy');
    Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('career-applications', [AdminCareerApplicationController::class, 'index'])->name('career-applications.index');
    Route::get('career-applications/{application}/documents/{document}', [AdminCareerApplicationController::class, 'download'])->name('career-applications.download');
    Route::delete('career-applications/{application}', [AdminCareerApplicationController::class, 'destroy'])->name('career-applications.destroy');



});
