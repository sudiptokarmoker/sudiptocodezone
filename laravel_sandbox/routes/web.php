<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/welcome', function () {
    return ['foo' => 'bar'];
});
*/

/*
Route::get('/post/{post}', function($post){
    $posts = [
        'my-first-post' => 'Hello this is my first blog post',
        'my-second-post' => 'Hello this is my second blog post'
    ];

    if(! array_key_exists($post, $posts)){
        abort(404, 'Sorry this post does not exist');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);
});
*/

Route::get('/post/{post}', 'PostsController@show');

// this is example of prefix router
/*
Route::prefix('testprefix')->group(function(){
    Route::get('/about', function () {
        return view('welcome');
    });
});*/

/*
Route::get('home', function(){
    echo "this is home page";
});
*/

/*
Route::get('/contact', function () {
    return view('contact');
})->middleware('age');
*/

Route::get('/', function () {
    return view('page.home');
});

Route::get('/about', function () {
    return view('about', [
        'channel' => 'solveArray'
    ]);
});

Route::get('/service', 'ServiceController@index');
Route::get('/contact-us', 'ContactController@index')->name('contact');

Route::get('/write/post', 'SiteController@writePost')->name('write.post');

Route::get('/category/add', 'SiteController@addCategory')->name('category.add');
Route::get('/category/all', 'SiteController@allCategory')->name('category.all');

Route::post('/category/store', 'SiteController@storeCategory')->name('store.category');