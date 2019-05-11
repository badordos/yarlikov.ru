@extends('layouts.app')

@section('content')
    <div id="colorlib-blog">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Блог</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Блог</span>
                    <h2>Записи и статьи</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="rotate">
                        <h2 class="heading">Блог</h2>
                    </div>
                </div>
            </div>

            @foreach($articles as $article)
                <div class="card">
                    <div class="card-header">
                        <h2>{{$article->title}}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$article->short_desc}}</p>
                        <a href="{{route('article.frontend.show', $article)}}" class="btn btn-primary">Читать</a>
                    </div>
                </div>
                <hr>
            @endforeach

            {{ $articles->links('components.pagination')}}

        </div>
    </div>
@endsection
