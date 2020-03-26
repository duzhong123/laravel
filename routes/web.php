<?php

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
//     return view('welcome');
// });

// Route::get('/index','IndexController@index');




// 添加商品的方法
Route::prefix('brand')->middleware('islogin')->group(function(){
    Route::get('create','BrandController@create');
    Route::post('store','BrandController@store');
    Route::get('index','BrandController@index');
    Route::get('edit/{id}','BrandController@edit');
    Route::post('update/{id}','BrandController@update');
    Route::get('destroy/{id}','BrandController@destroy');
});
//添加学生的方法
// Route::get('/student/create','StudentController@create');
// Route::post('/student/store','StudentController@store');
// Route::get('/student/index','StudentController@index');
//商品的分类
Route::prefix('creagory')->middleware('islogin')->group(function(){
Route::get('create','creagoryController@create');
Route::post('store','creagoryController@store');
Route::get('index','creagoryController@index');
Route::get('edit/{id}','creagoryController@edit');
Route::get('update/{id}','creagoryController@update');
Route::get('destroy/{id}','creagoryController@destroy');
});
// //售楼的方法
Route::get('/office/create','OfficeController@create');
Route::post('/office/store','OfficeController@store');
Route::get('/office/index','OfficeController@index');
//商品表的添加
Route::prefix('goods')->middleware('islogin')->group(function(){
    Route::get('create','GoodsController@create');
    Route::post('store','GoodsController@store')->name('goodsstore');
    Route::get('index','GoodsController@index');
    Route::get('edit/{id}','GoodsController@edit');
    Route::post('update/{id}','GoodsController@update')->name('goodsupdate');
    Route::get('destroy/{id}','GoodsController@destroy');
});
//图书添加
Route::prefix('book')->group(function(){
    Route::get('create','BookController@create');
    Route::post('store','BookController@store');
    Route::get('index','BookController@index');
});
//管理员添加
Route::prefix('admin')->middleware('islogin')->group(function(){
    Route::get('create','AdminController@create');
    Route::post('store','AdminController@store');
    Route::get('index','AdminController@index');
    Route::get('edit/{id}','AdminController@edit');
    Route::post('update/{id}','AdminController@update');
    Route::get('destroy/{id}','AdminController@destroy');
});
//登录的方法
Route::get('login','LoginController@login');
Route::post('logindo','LoginController@logindo');
//首页展示
Route::get('indexs','indexsController@indexs')->middleware('islogin');
//文章添加
Route::prefix('wenzhang')->middleware('islogin')->group(function(){
    Route::get('create','WenzhangController@create');
    Route::post('store','WenzhangController@store')->name('goodsstore');
    Route::get('index','WenzhangController@index');
    Route::get('edit/{id}','WenzhangController@edit');
    Route::post('update/{id}','WenzhangController@update')->name('goodsupdate');
    Route::get('destroy/{id}','WenzhangController@destroy');
    Route::get('checkOnly','WenzhangController@checkOnly');
});

//前台
Route::get('/','Index\IndexController@index');
Route::get('/log','Index\LoginController@log');
Route::get('/reg','Index\LoginController@reg');
Route::get('/reg/sendReg','Index\LoginController@sendReg');
Route::post('/reg/regDo','Index\LoginController@regDo');
Route::post('/log/loginDo','Index\LoginController@loginDo');
Route::get('/index/index','Index\IndexController@index');
Route::get('/reg/sendEmai','Index\LoginController@sendEmai');
Route::get('/index/pid/{id}','Index\IndexController@pid');
Route::get('/index/prolist','Index\IndexController@prolist');
Route::get('/index/proinfo/{id}','Index\GoodsController@proinfo');
Route::get('/addcart','Index\GoodsController@addcart');
Route::get('/car','Index\GoodsController@car');

Route::get('/getTotall','Index\GoodsController@getTotall');
Route::get('/getRxiaoji','Index\GoodsController@getRxiaoji');
Route::get('/rexiaoji','Index\GoodsController@rexiaoji');
Route::get('/buy/{id}','Index\GoodsController@buy');
Route::get('/successe','Index\GoodsController@successe');
Route::get('/suc/{id}','Index\GoodsController@suc');
Route::get('/pay/{code}','Index\PayController@pay');
Route::get('/return_url','Index\PayController@return_url');
Route::get('/notify_url','Index\PayController@notify_url');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//新闻添加
Route::prefix('news')->group(function(){
    Route::get('create','NewController@create');
    Route::post('store','NewController@store');
    Route::get('index','NewController@index');
});