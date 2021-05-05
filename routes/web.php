<?php

use App\Http\Controllers\categoryController;
use App\product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::prefix('admin')->group(function () {
    Route::get('/', 'homeController@index')->name('home');
    route::get('login', 'loginController@index')->name('login');
    route::get('/auth/logout', 'loginController@getLogout');
    route::post('logins', 'loginController@login')->name('addlogin');
    route::get('register', 'loginController@register')->name('register');
    route::post('registers', 'loginController@registers');
    Route::get('/trang-chu', 'homeController@home');
    //router accessori
  
    route::prefix('dashboard')->group(function () {
        route::get('danh-sach', 'dashboardController@index')->name('dashboard');
        route::get('softdate', 'dashboardController@softdate');
    });
    route::prefix('search')->group(function () {
        Route::get('/search', 'productController@search');
    });

    //attribute
    route::prefix('attribute')->group(function () {
        route::get('danh-sach', 'attributeController@index')->name('astributeindex');
        Route::get('add', 'attributeController@create')->name('astributeadd');
        Route::post('add', 'attributeController@store')->name('astributestore');
    });

    Route::resource('category', 'categoryController');
    Route::resource('producttype', 'producttypeController');
    Route::resource('product', 'productController');
    Route::resource('spetification', 'spetificationController');
    Route::resource('user', 'userController');
    Route::resource('roles', 'roleController');

    
    route::post('/loaisp', 'productController@loaisp');
    route::post('/product/updateqty/{id}', 'productController@updateqty');
    route::post('/getsize', 'productController@getsize');
    route::post('/addspe', 'productController@addspe');
    route::get('/getspe', 'productController@getspe');
    route::get('/productattribute/delete/{id}', 'productController@deletes')->name('proattribute-delete');
    route::get('/databar', 'dashboardController@getdata');
    route::get('/deleteattribute/{id}', 'productController@deletes');
    


    //dơn hang
    route::prefix('don-hang')->group(function () {
        route::get('danh-sach', 'orderController@index');
        route::post('cap-nhat/{id}', 'orderController@update');
        route::post('add', 'orderController@createorder');
        route::get('danh-sach/{id}', 'orderController@getorder')->name('donhang');
        Route::get('tao-don-hang', 'orderController@create');
        route::post('create/{id}', 'orderController@addorder');
        route::post('searchaccout', 'orderController@searchaccout');
        //mailler
        Route::get('laravel-send-email', 'EmailController@sendEMail');
    });
});




route::get('/search', 'searchController@search');
route::get('/', 'homeClientController@index')->name('home');
route::get('/dang-nhap', 'accountController@index')->name('dang-nhap');
route::post('/login', 'accountController@login')->name('logins');
route::post('/register', 'accountController@register');
route::get('/san-pham/{slug}', 'productClientController@index');
Route::get('/dtdd/{slug}', 'productcateController@index');
Route::get('/pk/{slug}', 'productcateController@index');
route::get('/tim-kiem', 'searchController@searchByName');
route::get('/quen-mat-khau','Auth\ForgotPasswordController@getForgotPassword');
route::post('/verify','Auth\ForgotPasswordController@SendCodeResetPass');
route::get('/password/resets','Auth\ForgotPasswordController@resetPassword')->name('resetpass');
route::post('/password/resets','Auth\ForgotPasswordController@savePassword')->name('resetpass');
Route::group(['middleware' => 'auth:custommer'], function () {
    route::post('/thanh-toan', 'cardController@checkout');
    route::get('/checkout', 'cardController@index');
    route::post('/carts/{id}', 'cardController@addToCards');
    route::get('/gio-hang', 'cardController@cart');
    route::get('/dang-xuat', 'accountController@logout');
    route::post('/card/{id}', 'cardController@addToCard')->name('addcard');
    route::get('/cart/remove/{id}', 'cardController@delete');

    route::post('/update-users', 'accountController@update');
});


Route::get('/home', 'HomeController@index')->name('home');
