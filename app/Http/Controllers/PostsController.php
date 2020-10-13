<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function show($slug)
    {
        /*
         * The code below is replaced by the use of Eloquent model
         * after this code
         * $post = DB::table('post')->where('slug', $slug)->first();
         * */

        /*
         * Using the Eloquent Model
         * Later can be cleaned furthermore
         * by the use of RouteModelBinding
         * */
        $post = Post::where('slug', $slug)->firstOrFail();

        /*
            The code below is not needed
            becase the use of firstOrFail()
            so it is already taken care of
        */
//        if ( $post == null ) {
//            abort(404);
//        }

        return view('posts', [
            'post' => $post
        ]);
    }
}
