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

use Illuminate\Routing\Router;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/news', 'ArticleController@index')->name('news');
Route::get('/gallery', 'ImageController@index')->name('gallery');
Route::get('/news/{article}', 'ArticleController@show')->name('news.show');

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => config('admin.namespace'),
    'middleware' => 'auth',
], function (Router $router) {
    $router->get('/news', 'ArticleController@index')->name('admin.news');
    $router->get('/news/create', 'ArticleController@create')->name('admin.news.create');
    $router->post('/news', 'ArticleController@store')->name('admin.news.store');
    $router->get('/news/edit/{id}', 'ArticleController@edit')->name('admin.news.edit');
    $router->post('/news/update/{id}', 'ArticleController@update')->name('admin.news.update');
    $router->get('/news/delete/{id}', 'ArticleController@destroy')->name('admin.news.destroy');

    $router->get('/images', 'ImageController@index')->name('admin.images');
    $router->get('/images/create', 'ImageController@create')->name('admin.images.create');
    $router->post('/images', 'ImageController@store')->name('admin.images.store');
    $router->get('/images/delete/{id}', 'ImageController@destroy')->name('admin.images.destroy');

});
