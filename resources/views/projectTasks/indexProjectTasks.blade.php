@extends('layouts.app')

@section('content')
    <h1>Project Tasks</h1>
    @if (count($projectTasks) > 0)
    @foreach ($projectTasks as $projectTask)
        <div class = "well">
            <h3><a href = "/project/public/projectTasks/{{$projectTask->id}}">{{$projectTask->nameTask}}</a></h3>
            <small>Written on {{$projectTask->created_at}}  by {{$projectTask->user->name}}</small>
        </div>
    @endforeach
    {{$projectTasks->links()}}
    @else
        <p>No Project Tasks found</p>
    @endif
@endsection