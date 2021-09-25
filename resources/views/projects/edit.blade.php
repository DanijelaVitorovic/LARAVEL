@extends('layouts.app')

@section('content')
<br>
    <h1>Edit Project</h1> 
    {!! Form::open(['action' => ['App\Http\Controllers\ProjectController@update', $project->id], 'method' => 'PUT']) !!}
    <div class = "form-group">
        {{Form::label('projectName', 'Project Name')}}
        {{Form::text('projectName', $project->projectName, ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $project->description, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class = "form-group">
        {{Form::label('start_date', 'Start Date')}}
        {{Form::date('start_date', $project->start_date, ['class' => 'form-control', 'min'=>"2015-01-01",  'max'=> "2021-12-31", 'placeholder' => 'Start Date'])}}
    </div>
    <div class = "form-group">
        {{Form::label('end_date', 'End Date')}}
        {{Form::date('end_date', $project->end_date, ['class' => 'form-control', 'min'=>"2020-01-01",  'max'=> "2025-12-31", 'placeholder' => 'End Date'])}}
    </div>   
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection