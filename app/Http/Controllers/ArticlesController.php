<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    //

    // All Articles

    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.home', [
            'articles' => $articles
        ]);
    }

    /*
     * The basic method of receiving
     * data from the controller
     *
     * */
//    public function show($id)
//    {
//        $article = Article::find($id);
//
//        return view('articles.show', [
//            'article' => $article
//        ]);
//    }

    /*
     * A more cleaner Laravel syntactic sugar
     * that do the same things as the code above
     * */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    /*
     * Commented to show another way to
     * input the data to the database,
     * see the method below this method.
     * */

//    public function store()
//    {
//        request()->validate([
//            'title' => ['required', 'min:3', 'max:255'],
//            'excerpt' => ['required', 'max:255'],
//            'body' => ['required'],
//        ]);
//
//        /*
//         * The default method ( the old way )
//         * */
////        $article = new Article();
////        $article->title = \request('title');
////        $article->excerpt = \request('excerpt');
////        $article->body = \request('body');
////
////        $article->save();
//
//        /*
//         * The more cleaner Laravel style
//         *
//         * */
//
//        Article::create([
//            'title' => \request('title'),
//            'excerpt' => \request('excerpt'),
//            'body' => \request('body')
//        ]);
//
//        return redirect('/articles');
//
//    }

    /*
     * This is another way to store
     * the data ( A cleaner Laravel Way )
     * */

    public function store()
    {
        Article::create($this->validateArticle());
        return redirect(route('article.index'));
    }


//    public function edit($id)
    public function edit(Article $article)
    {
//        $article =  Article::find($id);
        return view('articles.edit', compact('article'));
    }

//    public function update($id)
    public function update(Article $article)
    {
        /*
         * using the similar method from the store method
         * */

//        request()->validate([
//            'title' => ['required', 'min:3', 'max:255'],
//            'excerpt' => ['required', 'max:255'],
//            'body' => ['required'],
//        ]);
//
////        $article = Article::find($id);
//        $article->title = \request('title');
//        $article->excerpt = \request('excerpt');
//        $article->body = \request('body');
//
//        $article->save();

        /*
         * the code below is referencing the
         * validateArticle() method
         * because of repetition ( in this case )
         * */
        $article->update($this->validateArticle());

        /*
         * Commented to show the uses of named routes.
         *
         * the second parameter of the route() method
         * can be filled with either the $article or the $article->id
         * this is because Laravel is capable to determine the right
         * key ( as defined in the Article model ( getRouteKeyName() )
         * */
//        return redirect('/articles/' . $article->id );
//        return redirect(route('article.show', $article));

        // using the $article->path() method
        return redirect( $article->path() );
    }


    /**
     * @return array
     * update and store share the same validation ( in this case )
     * so we refactor the code to prevent repetitions
     * thus this method is created
     */
    public function validateArticle(): array
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => ['required', 'max:255'],
            'body' => ['required'],
        ]);
    }
}
