@extends('layouts.admin.index')

@section('content')
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->render()}}
    </div>
@endsection
