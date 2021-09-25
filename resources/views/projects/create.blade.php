@extends('layouts.app')

@section('content')
<br>
    <h1>Create Project</h1>
    <br>
    {!! Form::open(['action' => 'App\Http\Controllers\ProjectController@store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-sm">
    <div class = "form-group">
        {{Form::label('projectName', 'Project Name')}}
        {{Form::text('projectName', '', ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
    </div>
</div>
<div class="col-sm">
    <div class = "form-group">
        {{Form::label('start_date', 'Start Date')}}
        {{Form::date('start_date', '', ['class' => 'form-control', 'min'=>"2015-01-01",  'max'=> "2021-12-31", 'placeholder' => 'Start Date'])}}
    </div>
</div>
<div class="col-sm">
    <div class = "form-group">
        {{Form::label('end_date', 'End Date')}}
        {{Form::date('end_date', '', ['class' => 'form-control', 'min'=>"2020-01-01",  'max'=> "2025-12-31", 'placeholder' => 'End Date'])}}
    </div> 
</div> 
</div> 
    <div class = "form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['id' => 'summary-ckeditor', 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
     
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection