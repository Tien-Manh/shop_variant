<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Fronts\HomeController;
use App\Http\Controllers\Fronts\PaypalController;
use App\Http\Controllers\Fronts\ProductShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('language/{lang}', [Controller::class, 'swichLanguage'])->name('swich.language');
Route::group(['middleware' => 'lang'], function () {
    Route::get('admin-cp/login', [AuthController::class, 'login'])->name('login');
    Route::post('admin-cp/login', [AuthController::class, 'postLogin']);
    Route::any('admin-cp/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('rspassword', [AuthController::class, 'rsPassword'])->name('reset');
    Route::post('rspassword', [AuthController::class, 'postRsPassword']);
    Route::get('rspassword/{token}', [AuthController::class, 'rsToken'])->name('rs-token');
    Route::post('rs-pwd', [AuthController::class, 'rsPwd'])->name('rs-pws');

    Route::group(['middleware' => ['auth', 'auth.role:0,1,2'], 'prefix' => 'admin-cp'], function () {
        Route::get('', [Controller::class, 'main'])->name('admin.cp');
        Route::get('users-list', [UserController::class, 'index'])->name('index-users');
        Route::get('users-list/status-active/{id}', [UserController::class, 'switchAjax'])->middleware('role:0,1');
        Route::get('user-add', [UserController::class, 'add'])->middleware('role:0,1')->name('user-add');
        Route::post('user-add/save', [UserController::class, 'saveAdd'])->middleware('role:0,1')->name('user-add-save');
        Route::get('user-update/{id}', [UserController::class, 'update'])->middleware('role:0, 1')->name('user-update');
        Route::post('user-update/save', [UserController::class, 'saveUpdate'])->middleware('role:0,1')->name('user-update-save');
        Route::get('user-delete/{id}', [UserController::class, 'delete'])->middleware('role:0,1')->name('user-delete');
        Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');
        Route::post('save-image-user', [UserController::class, 'saveImageUser'])->name('save.image.user');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('change.password');

        Route::get('cates-list', [CateController::class, 'index'])->name('index-cates');
        Route::get('cates-list/status-active/{id}', [CateController::class, 'switchAjax']);
        Route::get('cate-add', [CateController::class, 'add'])->name('cate-add');
        Route::post('cate-add/save', [CateController::class, 'saveAdd'])->name('cate-add-save');
        Route::get('cate-update/{id}', [CateController::class, 'update'])->name('cate-update');
        Route::post('cate-update/save', [CateController::class, 'saveUpdate'])->name('cate-save-update');
        Route::get('cate-delete/{id}', [CateController::class, 'delete'])->name('cate-delete');

        Route::get('brands-list', [BrandController::class, 'index'])->name('index-brands');
        Route::get('brands-list/status-active/{id}', [BrandController::class, 'switchAjax']);
        Route::get('brand-add', [BrandController::class, 'add'])->name('brand-add');
        Route::post('brand-add/save', [BrandController::class, 'saveAdd'])->name('brand-add-save');
        Route::get('brand-update/{id}', [BrandController::class, 'update'])->name('brand-update');
        Route::post('brand-update/save', [BrandController::class, 'saveUpdate'])->name('brand-save-update');
        Route::get('brand-delete/{id}', [BrandController::class, 'delete'])->name('brand-delete');

        Route::get('products-list', [ProductController::class, 'index'])->name('index-products');
        Route::get('products-list/status-active/{id}', [ProductController::class, 'switchAjax']);
        Route::get('product-add', [ProductController::class, 'add'])->name('product-add');
        Route::get('product/attribute-value-list', [ProductController::class, 'allAjaxAttributeValue']);
        Route::post('product-add/save', [ProductController::class, 'saveAdd'])->name('product-add-save');
        Route::get('product-update/{id}', [ProductController::class, 'update'])->name('product-update');
        Route::post('product-update/save', [ProductController::class, 'saveUpdate'])->name('product-save-update');
        Route::get('product-delete/{id}', [ProductController::class, 'delete'])->name('product-delete');

        Route::get('posts-list', [PostController::class, 'index'])->name('index-posts');
        Route::get('posts-list/status-active/{id}', [PostController::class, 'switchAjax']);
        Route::get('post-add', [PostController::class, 'add'])->name('post-add');
        Route::post('post-add/save', [PostController::class, 'saveAdd'])->name('post-add-save');
        Route::get('post-update/{id}', [PostController::class, 'update'])->name('post-update');
        Route::post('post-update/save', [PostController::class, 'saveUpdate'])->name('post-save-update');
        Route::get('post-delete/{id}', [PostController::class, 'delete'])->name('post-delete');

        Route::get('orders-list', [OrderController::class, 'index'])->name('index-orders');
        Route::get('order-add', [OrderController::class, 'add'])->name('order-add');
        Route::post('order-add/save', [OrderController::class, 'saveAdd'])->name('order-add-save');
//    Route::get('order-update/{id}', [OrderController::class, 'update'])->name('order-update');
//    Route::post('order-update/save', [OrderController::class, 'saveUpdate'])->name('order-save-update');
        Route::get('order-delete/{id}', [OrderController::class, 'delete'])->name('order-delete');
        Route::post('order-status-methods', [OrderController::class, 'updateStatus'])->name('payment.status');
        Route::post('order-total', [OrderController::class, 'handleTotal'])->name('total.order');

        Route::get('coupons-list', [CouponController::class, 'index'])->name('index-coupons');
        Route::get('coupon-add', [CouponController::class, 'add'])->name('coupon-add');
        Route::get('coupons-list/status-active/{id}', [CouponController::class, 'switchAjax']);
        Route::post('coupon-add/save', [CouponController::class, 'saveAdd'])->name('coupon-add-save');
        Route::get('coupon-update/{id}', [CouponController::class, 'update'])->name('coupon-update');
        Route::post('coupon-update/save', [CouponController::class, 'saveUpdate'])->name('coupon-save-update');
        Route::get('coupon-delete/{id}', [CouponController::class, 'delete'])->name('coupon-delete');

        Route::get('banners-list', [BannerController::class, 'index'])->name('index-banners');
        Route::get('banners-list/status-active/{id}', [BannerController::class, 'switchAjax']);
        Route::get('banner-add', [BannerController::class, 'add'])->name('banner-add');
        Route::post('banner-add/save', [BannerController::class, 'saveAdd'])->name('banner-add-save');
        Route::get('banner-update/{id}', [BannerController::class, 'update'])->name('banner-update');
        Route::post('banner-update/save', [BannerController::class, 'saveUpdate'])->name('banner-save-update');
        Route::get('banner-delete/{id}', [BannerController::class, 'delete'])->name('banner-delete');

        Route::get('settings-list', [SettingController::class, 'index'])->name('index-settings');
//        Route::get('settings-list/status-active/{id}', [SettingController::class, 'switchAjax']);
        Route::post('settings-list/save', [SettingController::class, 'save'])->name('setting-save');
//    Route::post('setting-add/save', [\App\Http\Controllers\SettingController::class, 'saveAdd'])->name('setting-add-save');
        Route::get('setting-update/{id}', [SettingController::class, 'update'])->name('setting-update');
        Route::post('setting-update/save', [SettingController::class, 'saveUpdate'])->name('setting-save-update');
//    Route::get('setting-delete/{id}', [\App\Http\Controllers\SettingController::class, 'delete'])->name('setting-delete');

        Route::get('attribute-add', [AttributeController::class, 'add'])->name('attribute-add');
        Route::post('attribute-add/save', [AttributeController::class, 'saveAdd'])->name('attribute-add-save');

        Route::get('attribute-value-add', [AttributeValueController::class, 'add'])->name('attribute-value-add');
        Route::post('attribute-value-add/save', [AttributeValueController::class, 'saveAdd'])->name('attribute-value-add-save');
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/shop', [ProductShopController::class, 'index'])->name('shop');
    Route::get('/shop/{slug}', [ProductShopController::class, 'productDetail'])->name('product.detail');
    Route::get('/category/{slug}', [ProductShopController::class, 'cateProducts'])->name('cate.product');
    Route::get('/branding/{slug}', [ProductShopController::class, 'brandProducts'])->name('brand.product');
    Route::get('/blogs', [ProductShopController::class, 'blogs'])->name('blogs');
    Route::get('/blogs/{slug}', [ProductShopController::class, 'blogDetail'])->name('blog.detail');
    Route::get('/pick/chooze',  [ProductShopController::class, 'pickChoze'])->name('choze.detail');
    Route::get('/cart/{id}',  [ProductShopController::class, 'addCart'])->name('add.cart');
    Route::get('/cart',  [ProductShopController::class, 'showCart'])->name('show.cart');
    Route::post('/cart-update',  [ProductShopController::class, 'updateCart'])->name('update.cart');
    Route::get('/delete-one-cart/{id}',  [ProductShopController::class, 'deleteOnecart'])->name('delete.one.cart');
    Route::get('/checkout',  [ProductShopController::class, 'checkOut'])->name('checkout');
    Route::post('/checkout/save',  [ProductShopController::class, 'checkOutSave'])->name('checkoutSave');
    Route::get('/faq/{slug}', [ProductShopController::class, 'postFaq'])->name('faq');
    Route::get('/contact-us', [ProductShopController::class, 'contactUs'])->name('contact');
    Route::post('/contact-save', [ProductShopController::class, 'sendContact'])->name('contact.save');
    Route::post('/commen-save', [ProductShopController::class, 'commentSave'])->name('comment.save');
    Route::get('wishlist/{id}', [ProductShopController::class, 'saveWishList'])->name('wishlist.save');
    Route::get('wishlist/', [ProductShopController::class, 'showWishList'])->name('wishlist');

    Route::post('/ship-address/save',  [ProductShopController::class, 'addShipAddress'])->name('add.ship.adress');
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/save', [UserController::class, 'userProfileChangePassword'])->name('user.password.save');
    Route::post('/user/profile/img', [UserController::class, 'userProfileImg'])->name('user.update.img');
    Route::post('/user/profile/infomation', [UserController::class, 'userProfileInfo'])->name('user.update.info');
    Route::get('/user/orders', [ProductShopController::class, 'userOrder'])->name('user.order');

    Route::get('user/password', [AuthController::class, 'rsPasswordUser'])->name('reset.user');
    Route::post('user/password', [AuthController::class, 'postRsPassword']);
    Route::get('user/password/{token}', [AuthController::class, 'rsToken'])->name('rs-token.user');
    Route::post('user/rs-pwd', [AuthController::class, 'rsPwd'])->name('rs-pws.user');

    Route::get('/login', [AuthController::class, 'userLogin'])->name('user.login');
    Route::post('/login', [AuthController::class, 'userPostLogin']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/resign', [AuthController::class, 'resignUser'])->name('user.resign');
    Route::post('/resign/save', [AuthController::class, 'resignSaveUser'])->name('user.save.resign');
});
