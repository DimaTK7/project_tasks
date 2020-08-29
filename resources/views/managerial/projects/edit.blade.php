@extends('layouts.managerial.index')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Создать проект</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{Form::open(['route' => ['project.update', $project->id], 'method'=>'put'])}}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName">Название</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Название проекта" name="name" value="{{$project->name}}">
                </div>
                @error('name')
                <p class="text-danger p-error">{{$message}}</p>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
            {{Form::close()}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
