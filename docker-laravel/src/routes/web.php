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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/department', 'PagesController@getDepartment');
// Route::get('/departmentpost', 'PagesController@getDepartmentpost')->name('学科投稿・編集');
Route::group(['middleware' => 'auth'],function(){
    // Route::resource('/department', 'DepartmentController', ['only' => ['index', 'create', 'edit', 'store', 'destroy', 'update']]);
    // Route::resource('/gakko', 'GakkoController', ['only' => ['index', 'create', 'store']]);
    // Route::get('/gakko/edit', 'GakkoController@edit');
    // Route::put('/gakko/edit', 'GakkoController@update');

});
/*
|--------------------------------------------------------------------------
| Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin/auth'],function(){
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/register', 'Admin\Auth\RegisterController@create')->name('admin.register');
    Route::get('/register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
});
/*
|--------------------------------------------------------------------------
| Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:admin'], function() {
    // Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    // Route::get('/admin/home',  'HomeController@index')->name('admin.home');
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::resource('/department', 'DepartmentController', ['only' => ['index', 'create', 'edit', 'store', 'destroy', 'update', 'delete']]);
    Route::get('/department', 'DepartmentController@index')->name('department.index');
    Route::post('/department/create', 'DepartmentController@store')->name('department.store');
    Route::get('/department/create', 'DepartmentController@create')->name('department.create');
    Route::get('/department/{id}/edit', 'DepartmentController@edit')->name('department.edit');
    Route::put('/department/{id}/edit', 'DepartmentController@update')->name('department.update');
    Route::delete('/department/{id}', 'DepartmentController@destroy')->name('department.destroy');
    // Route::post('/department/{id}/edit', 'DepartmentController@upload');
    Route::post('/department', 'DepartmentController@delete')->name('department.delete');
    Route::get('/gakko/edit', 'GakkoController@edit');
    Route::put('/gakko/edit', 'GakkoController@update');
    Route::post('/register', 'Admin\Auth\RegisterController@create')->name('admin.register');
    Route::get('/gakko/create', 'GakkoController@create')->name('gakko.create');
    Route::post('/gakko/create', 'GakkoController@store');
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // Route::resource('/gakko', 'GakkoController', ['only' => ['index', 'create', 'store']]);
});
Route::get('/post',function(){
    return view('post');
});
