@extends('layouts.admin.index')

@section('content')
    @if(session('successSave'))
        @include('helpers.saveSuccess')
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Создать задачу</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{Form::open(['route' => 'task.store', 'method'=>'post', 'files' => true])}}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputTitle">Название</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputTitle" placeholder="Название задачи" name="title" value="{{old('title')}}">
                </div>
                @error('title')
                <p class="text-danger p-error">{{$message}}</p>
                @enderror
            </div>
            <div class="card-body">
                <label>Статус</label>
                <select class="form-control" name="status">
                    @foreach($status as $key => $value)
                        <option value="{{$value}}">{{$key}}</option>"
                    @endforeach
                </select>
            </div>
            <div class="card-body">
                <label>Проект</label>
                <select class="form-control" name="project_id">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="card-body">
                <label>Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Описание товара ..." name="description">{{old('description')}}</textarea>
            </div>
            @error('description')
            <p class="text-danger p-error">{{$message}}</p>
            @enderror

            <div class="card-body">
                <label for="exampleInputFile">Загрузить файл</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="exampleInputFile" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                    </div>
                </div>
            </div>
            @error('file')
            <p class="text-danger p-error">{{$message}}</p>
            @enderror
            @can('admin-panel')
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            @endcan
            {{Form::close()}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
