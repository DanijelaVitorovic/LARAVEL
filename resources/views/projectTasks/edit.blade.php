@extends('layouts.app')

@section('content')
<br>
    <h1>Edit Project Task</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\ProjectTaskController@update', $projectTask->id], 'method' => 'PUT']) !!}
    <div class = "form-group">
        {{Form::label('nameTask', 'Project Task Name')}}
        {{Form::text('nameTask',  $projectTask->nameTask, ['class' => 'form-control', 'placeholder' => 'Project Task Name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('priority', 'Project Prirority')}}
        {{Form::text('priority',  $projectTask->priority, ['class' => 'form-control', 'placeholder' => 'Project Prirority'])}}
    </div>
    <div class = "form-group">
        {{Form::label('start_date', 'Start Date')}}
        {{Form::date('start_date',  $projectTask->start_date, ['class' => 'form-control', 'min'=>"2015-01-01",  'max'=> "2021-12-31", 'placeholder' => 'Start Date'])}}
    </div> 
    <div class = "form-group">
        {{Form::label('summary', 'Summary')}}
        {{Form::textarea('summary',  $projectTask->summary, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Summary'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection