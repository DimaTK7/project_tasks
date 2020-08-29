@extends('layouts.managerial.index')

@section('content')
    @if(session('successSave'))
        @include('helpers.saveSuccess')
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Создать проект</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{Form::open(['route' => 'project.store', 'method'=>'post'])}}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName">Название</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Название проекта" name="name" value="{{old('name')}}">
                </div>
                @error('name')
                <p class="text-danger p-error">{{$message}}</p>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            {{Form::close()}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
