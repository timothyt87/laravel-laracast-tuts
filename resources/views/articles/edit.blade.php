@extends('layout/layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>

{{--            Commented to show the use of named routes --}}
{{--            <form action="/articles/{{ $article->id }}" method="post">--}}
            <form action="{{ $article->path() }}" method="POST">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input type="text" name="title" id="title" class="input" value="{{ $article->title }}">
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt">Excerpt</label>
                    <div class="control">
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10"
                                  class="textarea">{{ $article->excerpt }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="body">Body</label>
                    <div class="control">
                        <textarea name="body" id="body" cols="30" rows="10"
                                  class="textarea">{{ $article->body }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
