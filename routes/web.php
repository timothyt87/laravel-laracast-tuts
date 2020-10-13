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

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/{slug}', [\App\Http\Controllers\PostsController::class, 'show']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('about', function () {

    /*
     * Use the following code if you only have a small
     * amount of data
     *
     * */
//    $article = App\Models\Article::all();

    /*
     * Take exactly 2 data from the databse
     *
     * */
//    $article = App\Models\Article::take(2)->get();

    /*
     * Use Paginate
     * */
//    $article = App\Models\Article::paginate(2);

//    $article = App\Models\Article::latest()->get();

//    return $article;

    return view('about', [
        'articles' => App\Models\Article::take(3)->latest()->get() // take the first 3
        // sort the latest post ( sort the order )
        // and get it
    ]);
});

Route::get('/articles/{article}', [App\Http\Controllers\ArticlesController::class, 'show']);