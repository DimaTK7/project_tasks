@extends('layouts.site.index')

@section('content')
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>Название проекта</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
            @endforeach
            </tbody>
        </table>
        {{$projects->render()}}
    </div>
@endsection
