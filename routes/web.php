<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\ProductsController;

use App\Http\Controllers\AjaxController;

use App\Http\Controllers\CustomersController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\BiddingProductsController;


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



/*Route::get('/', function () {

    return view('welcome');

});*/



#### pages ####
Route::get('/',[PagesController::class, 'index'])->name('pages.index');
Route::get('/my-cart',[PagesController::class, 'myCart'])->name('pages.my-cart');
Route::get('/privacy-policy',[PagesController::class, 'privacyPolicy'])->name('pages.privacy-policy');
Route::get('/shipping-and-return',[PagesController::class, 'shippingAndReturn'])->name('pages.shipping-and-return');
Route::get('/terms-and-conditions',[PagesController::class, 'termsAndConditions'])->name('pages.terms-and-conditions');
Route::get('/about-us',[PagesController::class, 'aboutUs'])->name('pages.about-us');
Route::get('/met-wholesale',[PagesController::class, 'metWholesale'])->name('pages.met-wholesale');
Route::get('/store-events',[PagesController::class, 'storeEvents'])->name('pages.store-events');
Route::get('/licensees',[PagesController::class, 'licensees'])->name('pages.licensees');
Route::get('/contact-us',[PagesController::class, 'contactUs'])->name('pages.contact-us');
Route::get('/faqs',[PagesController::class, 'faqs'])->name('pages.faqs');

### ProductsController ######
Route::get('/products/{slug?}',[ProductsController::class, 'products'])->name('products.products');
Route::any('/products_filter',[ProductsController::class, 'productsFilter'])->name('products.products_filter');
Route::get('/product-details/{slug?}',[ProductsController::class, 'productDetails'])->name('pages.product-details');
Route::get('/search-products/{slug?}',[ProductsController::class, 'searchProducts'])->name('pages.search-products');
Route::any('/get_products_image',[ProductsController::class, 'getProductImage'])->name('products.get_products_image');

### BiddingProductsController ######
Route::get('/bidding-products/{slug?}',[BiddingProductsController::class, 'products'])->name('biddingproducts.bidding-products');
Route::any('/bidding_products_filter',[BiddingProductsController::class, 'productsFilter'])->name('biddingproducts.bidding_products_filter');
Route::get('/search-bidding-products/{slug?}',[BiddingProductsController::class, 'searchProducts'])->name('biddingproducts.search-bidding-products');

### CustomersController ######
Route::get('/customer-registration',[CustomersController::class, 'customerSignup'])->name('cutomers.customer-registration');

Route::get('/customer-login',[CustomersController::class, 'login'])->name('cutomers.customer-login');

Route::get('/logout',[CustomersController::class, 'logout'])->name('cutomers.customer-logout');

Route::post('/add-to-cart',[CustomersController::class, 'addToCart'])->name('addToCart');

Route::post('/remove-cart',[CustomersController::class, 'removeCart'])->name('removeCart');

Route::any('/my-account',[CustomersController::class, 'myAccount'])->name('my-account');

Route::any('/change-password',[CustomersController::class, 'changePassword'])->name('change-password');

Route::get('/my-orders',[CustomersController::class, 'myOrders'])->name('myOrders');

Route::get('/forgot-password',[CustomersController::class, 'forgotPassword'])->name('forgotPassword');

Route::get('/reset-password/{email}/{sec_pass}',[CustomersController::class, 'resetPassword'])->name('resetPassword');

Route::any('/reset-password-change',[CustomersController::class, 'resetPasswordChange'])->name('resetPasswordChange');

Route::any('/search-order',[CustomersController::class, 'searchOrder'])->name('searchOrder');

Route::get('/my-biddings',[CustomersController::class, 'myBiddings'])->name('myBiddings');



######### checkout ##########
Route::get('/checkout',[CheckoutController::class, 'checkout'])->name('checkout.checkout');
Route::post('/create-order',[CheckoutController::class, 'createOrder'])->name('createOrder');
Route::post('/save-address-info',[CheckoutController::class, 'saveAddressInfo'])->name('saveAddressInfo');
Route::post('/update-order-status',[CheckoutController::class, 'updateOrderStatus'])->name('updateOrderStatus');
Route::any('/order-success',[CheckoutController::class, 'orderSuccess'])->name('orderSuccess');
Route::any('/order-failed',[CheckoutController::class, 'orderFailed'])->name('orderFailed');


### AjaxController ######
Route::any('/check-login',[AjaxController::class, 'checkLogin'])->name('ajax.check-login');
Route::any('/add-newsletter',[AjaxController::class, 'addNewsletter'])->name('ajax.add-newsletter');
Route::any('/apply-coupon-code',[AjaxController::class, 'applyCouponCode'])->name('ajax.apply-coupon-code');
Route::any('/delete-coupon-code',[AjaxController::class, 'deleteSessionCoupon'])->name('ajax.delete-coupon-code');
Route::any('/save-enquiry',[AjaxController::class, 'saveEnquiry'])->name('ajax.save-enquiry');
Route::get('/get-bidding-product-details',[AjaxController::class, 'getBiddingProductDetails'])->name('pages.get-bidding-product-details');
Route::get('/add-new-bid',[AjaxController::class, 'addNewBid'])->name('pages.add-new-bid');





require "api.php";

require "admin.php";

require "export.php";

require "import.php";

require "vendor.php";

require "report.php";