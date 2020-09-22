@extends('layouts.admin.index')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Изменить роль</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('role.update', $role->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Название роли" name="name" value="{{$role->name}}">
                    </div>
                    @error('name')
                    <p class="text-danger p-error">{{$message}}</p>
                    @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
