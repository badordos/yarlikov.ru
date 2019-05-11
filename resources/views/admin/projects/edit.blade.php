@extends('layouts.admin')

@section('content')
    <div class="container">

        <h4>Обновить Проект</h4>
        <hr>

        @include('components.errors')

        <form method="post" action="{{route('projects.update', $project)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PATCH')
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{$project->title}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Ссылка</label>
                <input type="text" class="form-control" name="link" value="{{$project->link}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea class="form-control" name="desc" id="desc" rows="3">{{$project->desc}}</textarea>
            </div>
            @if(isset($image))
                <img src="{{$image->getUrl()}}" alt="..." class="img-thumbnail">
            @endif
            <div class="form-group">
                <label>Заменить изображение</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="is_favorite" @if($project->is_favorite == 1) checked @endif >
                <label class="form-check-label">Избранный</label>
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
