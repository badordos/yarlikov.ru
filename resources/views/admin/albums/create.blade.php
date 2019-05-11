@extends('layouts.admin')

@section('js')
    <script src="{{asset('js/dropzone.js')}}"></script>
@endsection

@section('content')
    <div class="container">

        <h4>Создать Альбом</h4>
        <hr>

        @include('components.errors')

        <form method="post" action="{{route('albums.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="example-date-input">Дата</label>
                <input class="form-control" type="date" name="date" value="{{$date}}" id="example-date-input">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea class="form-control" name="desc" id="desc" rows="3">{{old('desc')}}</textarea>
            </div>
            <div class="form-group">
                <label>Заглавное изображение</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <label>Остальные изображения</label>
                <input type="file" class="form-control-file" name="files[]" multiple>
            </div>
            <br>
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
