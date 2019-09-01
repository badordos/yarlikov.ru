@extends('layouts.app')

@section('content')
    <div id="colorlib-work">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Фотоальбом</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <h2>{{$album->title}}</h2>
                    <p>{{$album->desc}}</p>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="work-entry animate-box">
                        <div class="work-img">
                            <img style="max-height: 700px;" src="{{$album->getFirstMedia('main_image')->getUrl('small')}}" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                </div>

                @foreach($media as $photo)
                    <div class="col-md-12">
                        <div class="work-entry animate-box justify-content-center">
                            <div class="work-img">
                                <img style="max-height: 700px;" src="{{$photo->getUrl('small')}}" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('components.comments', ['comments' => $album->comments])

            @include('components.comment', ['model' => $album])

            <p class="text-center">Больше фотографий в моем <a  href="https://www.instagram.com/v_ordoss/"><i class="fab fa-instagram"></i>Instagram</a></p>

        </div>
    </div>
@endsection
