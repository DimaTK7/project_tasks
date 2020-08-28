@extends('layouts.index')

@section('content')
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
                        <a href="{{route('project.edit', $project->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        {{Form::open(['route'=>['project.destroy', $project->id],'method'=>'delete'])}}
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        {{Form::close()}}
                    </div>
                </td>
            @endforeach
            </tbody>
        </table>
        {{$projects->render()}}
    </div>
@endsection
