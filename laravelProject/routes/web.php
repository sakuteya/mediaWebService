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
    return view('topPage');
});

Route::get('testSak', 'testSakController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('post/create', 'PostController@create');

Route::post('/', 'PostController@store');
Route::get('post/post', 'PostController@store');

Route::get('phpinfo', 'PhpinfoController@index');

Route::get('article/{userName}/{title}', 'ArticleController@index', function ($userName, $title) {
    //
})->name('article');
Route::get('articles', 'ArticleController@listIndex')->name('articles');

Route::get('{userName}', 'UserController@index', function ($userName) {
    //
})->name('user');

Route::post('/fav', 'ArticleController@addFavorite');
Route::post('/delFav', 'ArticleController@deleteFavorite');
Route::post('/comment', 'ArticleController@addComment');
