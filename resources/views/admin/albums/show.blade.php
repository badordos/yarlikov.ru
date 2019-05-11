@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="card text-center">
            <div class="card-header">
                {{$album->title}}

            </div>
            <div class="card-body">
                {!! $album->desc !!}
            </div>
            <div class="card-footer text-muted">
                <p>{{Carbon\Carbon::parse($album->date)->format('Y-m-d')}}</p>
            </div>
        </div>

        <label>Главное изображение</label>
        <div class="card" style="width: 18rem;">
            <img class="card-img" src="{{$main_image->getUrl()}}">
        </div>

        <label>Другие изображения:</label>
        <div class="row">
            @forelse($images as $image)
                <div class="col-4" style="width: 18rem;">
                    <img class="card-img" src="{{$image->getUrl()}}">
                </div>
            @empty
                <p>Доп. фото нет</p>
            @endforelse
        </div>


    </div>
    <!-- /.container-fluid -->


@endsection
