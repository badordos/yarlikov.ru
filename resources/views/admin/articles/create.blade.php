@extends('layouts.admin')

@section('content')
    <div class="container">

        <h4>Создать Статью</h4>
        <hr>

        @include('components.errors')

        <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Краткое описание</label>
                <textarea class="form-control" name="short_desc" rows="3">{{old('short_desc')}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Контент</label>
                <textarea class="form-control" name="desc" id="desc" rows="3">{{old('desc')}}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Сохранить</button>
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
