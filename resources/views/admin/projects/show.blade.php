@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="card text-center">
            <div class="card-header">
                Заголовок: {{$project->title}}
            </div>
            <div class="card-body">
                <p>Описание:</p>
                {!! $project->desc !!}
            </div>
            <div class="card-footer text-muted">
                Ссылка: <a class="btn btn-link" href="{{$project->link}}">{{$project->link}}</a>
            </div>
        </div>

        <label>Изображение</label>
        <div class="card" style="width: 18rem;">
            <img class="card-img" src="{{$image->getUrl()}}">
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
