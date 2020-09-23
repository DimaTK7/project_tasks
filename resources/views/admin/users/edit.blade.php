@extends('layouts.admin.index')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Настройки пользователя</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('user.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Имя пользователя" name="name" value="{{$user->name}}">
                    </div>
                    @error('name')
                    <p class="text-danger p-error">{{$message}}</p>
                    @enderror
                </div>
                <div class="card-body">
                    <label>Роль</label>
                    <select class="form-control" name="role">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="{{$permission->id}}" name="permissions[]" type="checkbox"
                                    @foreach($user->permissions as $value)
                                    @if ($value->name === $permission->name) checked @endif
                                    @endforeach
                                    >
                                    <label class="form-check-label">{{$permission->name}}</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
