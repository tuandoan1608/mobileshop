<?php

use App\Http\Controllers\categoryController;
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
    Route::get('/','homeController@index')->name('home');
    route::get('login','loginController@index')->name('login');
    route::get('/auth/logout','loginController@getLogout');
    route::post('logins','loginController@login')->name('addlogin');
    route::get('register','loginController@register')->name('register');
    route::post('registers','loginController@registers');

    //router accessori
   route::prefix('phu-kien')->group(function(){
    route::get('danh-sach','accessoriesController@index');
   });
   route::prefix('dashboard')->group(function(){
    route::get('danh-sach','dashboardController@index')->name('dashboard');
   });
   route::prefix('search')->group(function(){
    Route::get('/search', 'productController@search');
   });

   //attribute
   route::prefix('attribute')->group(function(){
    route::get('danh-sach','attributeController@index')->name('astributeindex');
    Route::get('add', 'attributeController@create')->name('astributeadd');
    Route::post('add', 'attributeController@store')->name('astributestore');
   });
  
   Route::resource('category', 'categoryController');
   Route::resource('producttype', 'producttypeController');
   Route::resource('product', 'productController');
   route::post('/loaisp','productController@loaisp');
   route::post('/getsize','productController@getsize');
   route::get('/productattribute/delete/{id}','productController@deletes')->name('proattribute-delete');
   route::get('/databar','dashboardController@getdata');

   //dơn hang
   route::prefix('don-hang')->group(function(){
    route::get('danh-sach','orderController@index');
    route::post('cap-nhat/{id}','orderController@update');
    route::get('danh-sach/{id}','orderController@getorder');
    Route::get('tao-don-hang', 'orderController@create');
    
   });


});




route::get('/search','searchController@search');
route::get('/','homeClientController@index')->name('home');
route::get('/dang-nhap','accountController@index')->name('dang-nhap');
route::post('/login','accountController@login')->name('logins');
route::get('/register','accountController@register');
route::get('/san-pham/{slug}','productClientController@index');
Route::get('/dtdd/{slug}','productcateController@index');
Route::get('/pk/{slug}','productcateController@indexs');

route::post('/update-users','accountController@update');
Route::group(['middleware' => 'auth:custommer'], function () {
    route::post('/thanh-toan','cardController@checkout');
    route::get('/gio-hang','cardController@index');
    route::get('/dang-xuat','accountController@logout');
    route::post('/card/{id}','cardController@addToCard')->name('addcard');
});