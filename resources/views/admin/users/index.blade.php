@extends('layouts.admin.index')

@section('content')
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Статус</th>
                <th>Роль</th>
                <th>Доступ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->status == 'wait')
                        <span class="badge bg-danger">{{$user->status}}</span>
                    @else
                        <span class="badge bg-success">{{$user->status}}</span></td>
                @endif
                <td>
                    @foreach($user->roles as $role)
                        {{$role->name}}
                    @endforeach
                </td>
                <td>
                    @foreach($user->permissions as $permission)
                        {{$permission->name}}
                    @endforeach
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-info">Изменить</a>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->render()}}
    </div>
@endsection
