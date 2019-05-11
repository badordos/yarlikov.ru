@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <a class="btn btn-success" href="{{route('albums.create')}}">Создать альбом</a>

        <hr>

        @include('components.message')

        <table class="table table-striped" id="dataTable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Заголовок</th>
                <th scope="col">Дата</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($albums as $album)
            <tr>
                <td>{{$album->title}}</td>
                <td>{{Carbon\Carbon::parse($album->date)->format('Y-m-d')}}</td>
                <td>
                    <a href="{{route('albums.edit', $album)}}" class="badge badge-primary">Редактировать</a>
                    <a href="{{route('albums.show', $album)}}" class="badge badge-info">Просмотр</a>
                    <form class="d-inline-block" method="post" action="{{route('albums.destroy', $album)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge badge-danger del">Удалить</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center"><h5>Альбомов нет</h5></td>
            </tr>
            @endforelse
            </tbody>
        </table>

    </div>
    <!-- /.container-fluid -->


@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready( function () {

            $('#dataTable').DataTable();

            $(".del").click(function(){
                if (!confirm("Уверены, что хотите удалить?")){
                    return false;
                }
            });

        } );
    </script>

@endsection
