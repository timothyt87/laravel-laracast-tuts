@extends('layout.layout');

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Articles</h2>
                    <span class="byline">Mauris vulputate dolor sit amet nibh</span></div>
                <p><img src="images/banner.jpg" alt="" class="image image-full"/></p>
                @foreach ($articles as $article)
                    {{--                    Commented to showcase the uses of named routes--}}
                    {{--                <a href="/articles/{{ $article->id }}">--}}
                    <a href="{{ route('article.show', $article->id) }}">
                        <h3>{{ $article->title }}</h3>
                    </a>
                    <span class="byline">{{ $article->excerpt }}</span>
                    <br>
                    <br>
                    <br>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
