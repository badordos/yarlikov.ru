@extends('layouts.admin')

@section('content')
    <div class="container">

        <h4>Создать Проект</h4>
        <hr>

        @include('components.errors')

        <form method="post" action="{{route('projects.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Ссылка</label>
                <input type="text" class="form-control" name="link" value="{{old('link')}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea class="form-control" name="desc" id="desc" rows="3">{{old('desc')}}</textarea>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="is_favorite">
                <label class="form-check-label">Избранный</label>
            </div>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection

@section('js')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var editor = CKEDITOR.replace('desc');
    </script>

@endsection
