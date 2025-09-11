<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Admin\AccountsController;

use App\Http\Controllers\Admin\AjaxController;

use App\Http\Controllers\Admin\UsersController;

use App\Http\Controllers\Admin\AdminsController;

use App\Http\Controllers\Admin\InnerPagesController;

use App\Http\Controllers\Admin\EnquiriesController;

use App\Http\Controllers\Admin\CategoriesController;

use App\Http\Controllers\Admin\ProductsController;

use App\Http\Controllers\Admin\CouponCodesController;

use App\Http\Controllers\Admin\OrdersController;

use App\Http\Controllers\Admin\BiddingProductsController;

use App\Http\Controllers\Admin\TestimonialsController;

use App\Http\Controllers\Admin\BannersController;

use App\Http\Controllers\Admin\BrandsController;

use App\Http\Controllers\Admin\FaqsController;

use App\Http\Controllers\Admin\UserBiddingsController;

use App\Http\Controllers\Admin\BiddingHistoryController;





/*



|--------------------------------------------------------------------------



| API Routes



|--------------------------------------------------------------------------



|



| Here is where you can register API routes for your application. These



| routes are loaded by the RouteServiceProvider within a group which



| is assigned the "api" middleware group. Enjoy building your API!



|



*/







Route::prefix('admin')->group(function(){

	

    #account setup

    Route::get('/',[AdminController::class, 'login'])->name('admin.login');

    Route::get('/login',[AdminController::class, 'login'])->name('admin.login');



    #dashboard setup

    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/admin-login',[AdminController::class, 'admin_login'])->name('admin.admin_login');

    Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');	

	

    #discounts
    Route::get('/faqs',[FaqsController::class, 'getList'])->name('admin.faqs');
    Route::any('/faqs_paginate',[FaqsController::class, 'listPaginate'])->name('admin.faqs_paginate');
    Route::any('/add-faq',[FaqsController::class, 'addPage'])->name('admin.add-faq');
    Route::any('/edit-faq/{row_id}',[FaqsController::class, 'editPage'])->name('admin.edit-faq');

    #enquiries
    Route::get('/user-biddings',[UserBiddingsController::class, 'getList'])->name('admin.user-biddings');
    Route::any('/user_biddings_paginate',[UserBiddingsController::class, 'listPaginate'])->name('admin.user_biddings_paginate');
    Route::any('/view-user-bidding/{row_id}',[UserBiddingsController::class, 'viewPage'])->name('admin.view-user-bidding');    


	#accounts

    Route::get('/accounts',[AccountsController::class, 'getList'])->name('admin.accounts');

    Route::any('/accounts_paginate',[AccountsController::class, 'listPaginate'])->name('admin.accounts_paginate');

	Route::any('/edit-account/{row_id}',[AccountsController::class, 'editPage'])->name('admin.edit-account');

	Route::any('/add-account',[AccountsController::class, 'addPage'])->name('admin.add-accounts');


    #accounts

    Route::get('/banners',[BannersController::class, 'getList'])->name('admin.banners');

    Route::any('/banners_paginate',[BannersController::class, 'listPaginate'])->name('admin.banners_paginate');

	Route::any('/edit-banner/{row_id}',[BannersController::class, 'editPage'])->name('admin.edit-banner');

	Route::any('/add-banner',[BannersController::class, 'addPage'])->name('admin.add-banner');

    
    
    

	#super admins

    Route::get('/testimonials',[TestimonialsController::class, 'getList'])->name('admin.testimonials');

    Route::any('/testimonials_paginate',[TestimonialsController::class, 'listPaginate'])->name('admin.testimonials_paginate');

	Route::any('/edit-testimonial/{row_id}',[TestimonialsController::class, 'editPage'])->name('admin.edit-testimonial');

	Route::any('/add-testimonial',[TestimonialsController::class, 'addPage'])->name('admin.add-testimonial');



    #super admins

    Route::get('/brands',[BrandsController::class, 'getList'])->name('admin.brands');

    Route::any('/brands_paginate',[BrandsController::class, 'listPaginate'])->name('admin.brands_paginate');

	Route::any('/edit-brand/{row_id}',[BrandsController::class, 'editPage'])->name('admin.edit-brand');

	Route::any('/add-brand',[BrandsController::class, 'addPage'])->name('admin.add-brand');


    #super admins

    Route::get('/admins',[AdminsController::class, 'getList'])->name('admin.admins');

    Route::any('/admins_paginate',[AdminsController::class, 'listPaginate'])->name('admin.admins_paginate');

	Route::any('/edit-admin/{row_id}',[AdminsController::class, 'editPage'])->name('admin.edit-admins');

	Route::any('/add-admin',[AdminsController::class, 'addPage'])->name('admin.add-admins');
	

	#super admins

    Route::get('/bidding-products',[BiddingProductsController::class, 'getList'])->name('admin.bidding-products');

    Route::any('/bidding_products_paginate',[BiddingProductsController::class, 'listPaginate'])->name('admin.bidding_products_paginate');

	Route::any('/edit-bidding-product/{row_id}',[BiddingProductsController::class, 'editPage'])->name('admin.edit-bidding-product');

	Route::any('/add-bidding-product',[BiddingProductsController::class, 'addPage'])->name('admin.add-bidding-product');



	#ajax

	Route::post('/change-status',[AjaxController::class, 'changeStatus'])->name('admin.change-status');

    Route::post('/delete-record',[AjaxController::class, 'deleteRecord'])->name('admin.delete-record');

	Route::post('/update-new-order',[AjaxController::class, 'updateNewOrder'])->name('admin.update-new-order');

	Route::any('/apply-coupon-code',[AjaxController::class, 'applyCouponCode'])->name('pages.apply-coupn-code');

    Route::any('/delete-coupon-code',[AjaxController::class, 'deleteSessionCoupon'])->name('pages.delete-coupn-code');

    Route::post('/update-order',[AjaxController::class, 'updateOrder'])->name('admin.update-order');
    

	#inner pages

    Route::get('/inner-pages',[InnerPagesController::class, 'getList'])->name('admin.inner-pages');

    Route::any('/inner_pages_paginate',[InnerPagesController::class, 'listPaginate'])->name('admin.inner_pages_paginate');

	Route::any('/edit-inner-page/{row_id}',[InnerPagesController::class, 'editPage'])->name('admin.edit-inner-page');



	#enquiries

    Route::get('/enquiries',[EnquiriesController::class, 'getList'])->name('admin.enquiries');

    Route::any('/enquiries_paginate',[EnquiriesController::class, 'listPaginate'])->name('admin.enquiries_paginate');

    Route::any('/view-enquiry/{row_id}',[EnquiriesController::class, 'viewPage'])->name('admin.view-enquiry');

	

	#settings

    Route::get('/settings',[ProfileController::class, 'settings'])->name('admin.settings');

	Route::post('/save-setting',[ProfileController::class, 'saveSetting'])->name('admin.save-setting');



    #update profile

    Route::get('/update-profile',[ProfileController::class, 'updateProfile'])->name('admin.update-profile');

    Route::post('/save-profile',[ProfileController::class, 'saveProfile'])->name('admin.save-profile');



    #change password

    Route::get('/change-password',[ProfileController::class, 'changePassword'])->name('admin.change-password');

    Route::post('/update-password',[ProfileController::class, 'updatePassword'])->name('admin.dashboard');

	

	#Users

    Route::get('/users',[UsersController::class, 'getList'])->name('admin.users');

    Route::any('/users_paginate',[UsersController::class, 'listPaginate'])->name('admin.users_paginate');

    Route::any('/add-user',[UsersController::class, 'addPage'])->name('admin.add-user');

    Route::any('/edit-user/{row_id}',[UsersController::class, 'editPage'])->name('admin.edit-user');

    Route::post('/change-bidder-status',[UsersController::class, 'changeBidderStatus'])->name('admin.change-bidder-status');

	

	#categories

    Route::get('/categories',[CategoriesController::class, 'getList'])->name('admin.categories');

    Route::any('/categories_paginate',[CategoriesController::class, 'listPaginate'])->name('admin.categories_paginate');

	Route::any('/edit-category/{row_id}',[CategoriesController::class, 'editPage'])->name('admin.edit-category');

	Route::any('/add-category',[CategoriesController::class, 'addPage'])->name('admin.add-category');	

		

	#reports

    Route::get('/products',[ProductsController::class, 'getList'])->name('admin.products');

    Route::any('/products_paginate',[ProductsController::class, 'listPaginate'])->name('admin.products_paginate');

	Route::any('/edit-product/{row_id}',[ProductsController::class, 'editPage'])->name('admin.edit-product');

	Route::any('/add-product',[ProductsController::class, 'addPage'])->name('admin.add-product');

    Route::any('/upload-product-images',[ProductsController::class, 'uploadProductImages'])->name('admin.upload-product-images');

	

	#couponcode

    Route::get('/coupon-codes',[CouponCodesController::class, 'getList'])->name('admin.coupon-codes');

    Route::any('/coupon_codes_paginate',[CouponCodesController::class, 'listPaginate'])->name('admin.coupon_codes_paginate');

    Route::any('/add-coupon-code',[CouponCodesController::class, 'addPage'])->name('admin.add-coupon-code');

    Route::any('/edit-coupon-code/{row_id}',[CouponCodesController::class, 'editPage'])->name('admin.edit-coupon-code');



    #bookings

	Route::get('/orders',[OrdersController::class, 'getList'])->name('admin.orders');

    Route::any('/orders_paginate',[OrdersController::class, 'listPaginate'])->name('admin.orders_paginate');

    Route::any('/view-order/{row_id}',[OrdersController::class, 'viewPage'])->name('admin.view-order');

    Route::any('/update-order-status',[OrdersController::class, 'updateOrderStatus'])->name('admin.update-order-status');

	Route::any('/set-payment-status',[OrdersController::class, 'setPaymentStatus'])->name('admin.set-payment-status');

    Route::any('/update-traking-no',[OrdersController::class, 'updateTrakingNo'])->name('admin.update-traking-no');

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});