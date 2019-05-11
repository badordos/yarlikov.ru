@extends('layouts.admin')

@section('content')
    <div class="container">

        <h4>Обновить Статью</h4>
        <hr>

        @include('components.errors')

        <form method="post" action="{{route('articles.update', $article)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PATCH')
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{$article->title}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Контент</label>
                <textarea class="form-control" name="desc" id="desc" rows="3">{{$article->content}}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Обновить</button>
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection

@section('js')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var editor = CKEDITOR.replace('desc',{
            height: '500px',
        });
    </script>

@endsection
