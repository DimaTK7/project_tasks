@extends('layouts.site.index')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                    <div class="col-12">
                        <div class="post">
                            <div><b>{{$task->title}}</b><br>
                                <b>Статус: {{$task->status}}</b><br>
                                <span class="description">{{$task->created_at}}</span>
                            </div>
                            <br>
                            <p>{{$task->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                @if($task->file)
                <h5 class="mt-5 text-muted">Файл</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('downloadFile', $task->file)}}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{$task->file}}</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
