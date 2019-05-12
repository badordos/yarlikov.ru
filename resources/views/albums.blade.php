@extends('layouts.app')

@section('content')
    <div id="colorlib-work">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Альбомы</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Портфолио</span>
                    <h2>Мои фотосессии и фотопроекты</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="rotate">
                        <h2 class="heading">Портфолио</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($albums as $album)
                    <div class="col-md-12">
                        <div class="work-entry animate-box">
                            <a href="{{route('album.frontend.show', $album)}}" class="work-img"
                               style="background-image: url({{$album->getFirstMedia('main_image')->getUrl('small')}});">
                                <div class="display-t">
                                    <div class="work-name">
                                        <h2>{{$album->title}}</h2>
                                    </div>
                                </div>
                            </a>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="desc">
                                    {{$album->desc }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $albums->links('components.pagination')}}

        </div>
    </div>
@endsection
