@extends('layouts.app')

@section('content')
<br>
    <h1>Create Project Task</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\ProjectTaskController@store', 'method' => 'POST']) !!}
    <div class = "form-group">
        {{Form::label('nameTask', 'Project TaskName')}}
        {{Form::text('nameTask', '', ['class' => 'form-control', 'placeholder' => 'Project Task Name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('priority', 'Project Prirority')}}
        {{Form::text('priority', '', ['class' => 'form-control', 'placeholder' => 'Project Prirority'])}}
    </div>
    <div class = "form-group">
        {{Form::label('start_date', 'Start Date')}}
        {{Form::date('start_date', '', ['class' => 'form-control', 'min'=>"2015-01-01",  'max'=> "2021-12-31", 'placeholder' => 'Start Date'])}}
    </div> 
    <div class = "form-group">
        {{Form::label('summary', 'Summary')}}
        {{Form::textarea('summary', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Summary'])}}
    </div>
   
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection