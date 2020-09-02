@extends('layouts.admin.index')

@section('content')
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>Название проекта</th>
                <th>Статус</th>
                <th>Файл</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td class="project-state">
                        <span class="badge badge-success">{{\App\Enums\TasksStatus::getKey($task->status)}}</span>
                    </td>
                    <td @if($task->file)
                        сlass="project-state">
                        <span class="badge badge-success">✓</span>
                        @endif
                    </td>
                    <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('task.edit', $task->id)}}" class="btn btn-info">Изменить</a>
                            {{Form::open(['route'=>['task.destroy', $task->id], 'style' => 'width: 35px;', 'method'=>'delete'])}}
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$tasks->render()}}
    </div>
@endsection
