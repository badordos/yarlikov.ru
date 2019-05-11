@extends('layouts.admin')

@section('js')
    <script src="{{asset('js/dropzone.js')}}"></script>
@endsection

@section('content')
    <div class="container">

        <h4>Обновить Альбом</h4>
        <hr>

        @include('components.errors')

        <form method="post" action="{{route('albums.update',$album)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PATCH')
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{$album->title}}">
            </div>
            <div class="form-group">
                <label for="example-date-input">Дата</label>
                <input class="form-control" type="date" name="date" value="{{Carbon\Carbon::parse($album->date)->format('Y-m-d')}}" id="example-date-input">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea class="form-control" name="desc" id="desc" rows="3">{{$album->desc}}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Обновить</button>
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
