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

Auth::routes();
Route::get('phpinfo', 'PhpinfoController@index');
Route::get('/', function () {
    return view('topPage');
});
//FIXME:ログイン後の画面を考える
Route::get('/home', function () {
    return view('topPage');
})->name('home');
// Route::get('/home', 'HomeController@index')
// ->name('home');

Route::get('articles', 'ArticleController@listIndex')
->name('articles');
Route::get('article/{userName}/{title}', 'ArticleController@index', function ($userName, $title) {
})->name('article');
Route::get('article/{userName}/{title}/edit', 'ArticleController@edit', function ($userName, $title) {
})->name('edit.article');
Route::patch('article/{userName}/{title}', 'ArticleController@update', function ($userName, $title) {
})->name('update.article');
Route::get('{userName}', 'UserController@index', function ($userName) {
})->name('user');


// ログイン必須ページ
Route::middleware('auth')->group(function () {

    Route::get('post/create', 'ArticleController@create' , function() {
    })->name('create');
    Route::post('post', 'ArticleController@store');
    Route::post('/fav', 'ArticleController@addFavorite');
    Route::post('/delFav', 'ArticleController@deleteFavorite');
    Route::post('/comment', 'ArticleController@addComment');

});

