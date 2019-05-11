@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="card text-center">
            <div class="card-header">
                Заголовок: {{$article->title}}
            </div>
            <div class="card-body">

                {!! $article->content !!}
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
