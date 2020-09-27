@extends('layouts.site.index')

@section('content')
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>Название проекта</th>
                <th>Новые задачи</th>
                <th>Задачи в работе</th>
                <th>Завершенные задачи</th>
            </tr>
            </thead>
            <tbody>

            @foreach($projects as $project)
                <tr>
                    <td><a>{{$project->name}}</a></td>
                    <td><a href="{{route('taskList',['id' => $project->id, 'status' => 'new'])}}" class="btn btn-sm btn-primary">Смотреть список</a></td>
                    <td><a href="{{route('taskList',['id' => $project->id, 'status' => 'progress'])}}" class="btn btn-sm btn-warning">Смотреть список</a></td>
                    <td><a href="{{route('taskList',['id' => $project->id, 'status' => 'done'])}}" class="btn btn-sm btn-danger">Смотреть список</a></td>
            @endforeach

            </tbody>
        </table>
        {{$projects->render()}}
    </div>
@endsection
