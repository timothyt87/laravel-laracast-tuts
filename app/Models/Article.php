<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /*
     * See file ArticleController on the show(Article $article) method,
     * by default, laravel find the id from the wildcard in the database
     * to override the default behavior, uncommnent the code below.
     *
     * The code will tell Laravel to search based on the keyword from
     * the provided method below.
     *
     * */
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    /*
     * this var tells laravel what column that can be changed
     * */
    protected $fillable = [
        'title',
        'excerpt',
        'body'
    ];

    /*
     * to tell Laravel to not guard anything
     * uncomment the code below
     * protected $guarded = [];
     * */

    /*
     * we can create a method that specifically handle the URL.
     *
     * public function path()
     * {
     *      return route('article.show', $this);
     * }
     *
     * then it can be accessed from the ArticleController as
     * $article->path();
     *
     * then we can use the $article->path() method on:
     *      1. Blade Templates
     *      2. ArticleController
     *      3. and other
     *  and it returned the URL path
     * */

    public function path()
    {
        return route('article.show', $this);
    }


    /*
     * Basic Eloquent Relationships
     * https://laracasts.com/series/laravel-6-from-scratch/episodes/29?autoplay=true
     * */

    public function author()
    {
        /*
         * the second arguments is used to override the default
         * setting laravel use ( asuming the method name is the foreign key)
         * */
        return $this->belongsTo(User::class, 'user_id');
    }
}
