@extends('layouts.app')

@section('content')
<a href = "/project/public/projects" class ="btn btn-default">Go Back</a>
    <h1>{{$projectTask->nameTask}}</h1>
    <div> Priroity: {{$projectTask->priority}} </div>
    <div> {{$projectTask->summary}} </div>
    <hr>
    <small>Written on {{$projectTask->start_date}}</small>
    <hr>
    @if (!Auth::guest())
    <a href = "/project/public/projectTasks/{{$projectTask->id}}/edit" class="btn btn-default">Edit</a>
 
    {!! Form::open(['action' => ['App\Http\Controllers\ProjectTaskController@destroy', $projectTask->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    @endif
@endsection