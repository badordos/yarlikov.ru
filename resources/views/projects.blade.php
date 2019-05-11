@extends('layouts.app')

@section('content')
    <div id="colorlib-work">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Проекты</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Портфолио</span>
                    <h2>Последние проекты</h2>
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
                @foreach($projects as $project)
                    <div class="col-md-12">
                        <div class="work-entry animate-box">
                            <a href="{{$project->link}}" class="work-img"
                               style="background-image: url({{$project->getFirstMedia('images')->getUrl()}});" target="_blank">
                                <div class="display-t">
                                    <div class="work-name">
                                        <h2>{{$project->title}}</h2>
                                    </div>
                                </div>
                            </a>
                            <div class="col-md-4 col-md-offset-4">
                                <div class="desc">
                                    {!! $project->desc !!}
                                    {{--<p class="read"><a href="#">View details</a></p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $projects->links('components.pagination')}}

        </div>
    </div>
@endsection
