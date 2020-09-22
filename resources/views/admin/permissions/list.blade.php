@extends('layouts.admin.index')

@section('content')
    @if(session('successUpdate'))
        @include('helpers.updateSuccess')
    @endif
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>Название правела</th>
                <th>Slug</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->slug}}</td>
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('permission.edit', $permission->id)}}" class="btn btn-info">Изменить</a>
                        <form action="{{route('permission.destroy', $permission->id)}}" style="width: 35px" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                        </form>
                    </div>
                </td>
            @endforeach
            </tbody>
        </table>
        {{$permissions->render()}}
    </div>
@endsection
