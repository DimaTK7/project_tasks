@extends('layouts.site.index')

@section('content')
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>@lang('app.Projects_name')</th>
                <th>@lang('app.New_tasks')</th>
                <th>@lang('app.Tasks_in_work')</th>
                <th>@lang('app.Completed_tasks')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td><a>{{$project->name}}</a></td>
                    <td><a href="{{route('taskList',['id' => $project->id, 'status' => 'new'])}}" class="btn btn-sm btn-primary">@lang('app.Watch_the_list')</a></td>
                    <td><a href="{{route('taskList',['id' => $project->id, 'status' => 'progress'])}}" class="btn btn-sm btn-warning">@lang('app.Watch_the_list')</a></td>
                    <td><a href="{{route('taskList',['id' => $project->id, 'status' => 'done'])}}" class="btn btn-sm btn-danger">@lang('app.Watch_the_list')</a></td>
            @endforeach
            </tbody>
        </table>
        <div>
            <br><p> ! ! Переводы присутствуют только на одной странице, на "<a href="{{route('main')}}">Главной</a>"</p>
        </div>
        {{$projects->render()}}
    </div>
@endsection
