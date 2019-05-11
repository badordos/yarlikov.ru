@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <a class="btn btn-success" href="{{route('projects.create')}}">Создать проект</a>

        <hr>

        @include('components.message')

        <table class="table table-striped" id="dataTable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Заголовок</th>
                <th scope="col">Ссылка</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{$project->title}}</td>
                <td><a class="btn btn-link" href="{{$project->link}}">{{$project->link}}</a></td>
                <td>
                    <a href="{{route('projects.edit', $project)}}" class="badge badge-primary">Редактировать</a>
                    <a href="{{route('projects.show', $project)}}" class="badge badge-info">Просмотр</a>
                    <form class="d-inline-block" method="post" action="{{route('projects.destroy', $project)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge badge-danger del">Удалить</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center"><h5>Проектов нет</h5></td>
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
