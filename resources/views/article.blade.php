@extends('layouts.app')

@section('content')
    <div id="colorlib-blog">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Статья</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>{{$article->title}}</span>
                    <h2>{{$article->short_desc}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="rotate">
                        <h2 class="heading">Статья</h2>
                    </div>
                </div>
            </div>

            <div>
                {!!  $article->content !!}
            </div>

        </div>
    </div>
@endsection
