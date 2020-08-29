@extends('layouts.managerial.index')

@section('content')
    @if(session('successUpdate'))
        @include('helpers.updateSuccess')
    @endif
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>Название проекта</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('project.edit', $project->id)}}" class="btn btn-info">Изменить</a>
                        {{Form::open(['route'=>['project.destroy', $project->id], 'style' => 'width: 35px;', 'method'=>'delete'])}}
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                        {{Form::close()}}
                    </div>
                </td>
            @endforeach
            </tbody>
        </table>
        {{$projects->render()}}
    </div>
@endsection
