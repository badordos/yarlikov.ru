@extends('layouts.admin')

@section('css')
    <link href="{{asset('css/dropzone.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">

        <h4>Добавьте в альбом изображения</h4>
        <hr>

        <form id="dropzone" class="dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->


@endsection

@section('js')
    <script src="{{asset('js/dropzone.js')}}"></script>
    <script type="text/javascript">
        $("#dropzone").dropzone({ url: "/file/post" });
    </script>
@endsection
