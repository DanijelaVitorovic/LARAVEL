@extends('layouts.app')

@section('content')
<br>
<a href = "/project/public/projects" class ="btn btn-primary">Go Back</a>
<br>
    <h1>{{$project->projectName}}</h1>
    <div class="row">
        <div class="col-sm">
            {{Form::label('start_date', 'Start Date')}}
            {{Form::date('start_date', $project->start_date, ['class' => 'form-control', 'min'=>"2015-01-01",  'max'=> "2021-12-31", 'placeholder' => 'Start Date', 'disabled'=>'true'])}}
    </div>
    <div class="col-sm">
        {{Form::label('end_date', 'End Date')}}
        {{Form::date('end_date', $project->end_date, ['class' => 'form-control', 'min'=>"2020-01-01",  'max'=> "2025-12-31", 'placeholder' => 'End Date', 'disabled'=>'true'])}}
    </div>
</div>
   <div>
    {{Form::label('description', 'Description')}}
    {{Form::textarea('description', $project->description, ['class' => 'form-control', 'disabled'=>'true', 'class' => 'form-control', 'placeholder' => 'Description'])}}
   </div>
   <hr>
   <small>Written on {{$project->created_at}} by {{$project->user->name}}</small>
   <hr>
   @if (!Auth::guest())
   <div class="row">
    <div class="col col-lg-4">
   <a href = "/project/public/projects/{{$project->id}}/edit" class="btn btn-primary">Edit</a>
</div>
<div class="col col-lg-2">
   {!! Form::open(['action' => ['App\Http\Controllers\ProjectController@destroy', $project->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
   {{Form::hidden('_method', 'DELETE')}}
   {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}   
</div>

</div>
   @endif
  
<br>
<br>

<div class="row"> <div class="col col-lg-4">
   <h1>Project Tasks</h1> 
   </div>
  
</div>
   <hr>
   @if (count($project->projectTasks) > 0)
   @foreach ($project->projectTasks as $projectTask)
   <div class = "card">
    <div class="card-body">
           <h3 class="card-title"><a href = "/project/public/projectTasks/{{$projectTask->id}}">{{$projectTask->nameTask}}</a></h3>
           <small>Written on {{$projectTask->created_at}}  by {{$projectTask->user->name}}</small>
        </div>
    </div>
    <br>
   @endforeach
   @endif

   <br>
    <h1>Add Project Task</h1>
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
</form>

<br>

<br>
<br>
    
       {{-- <h2 class="underline" style="margin-left: 14%; margin-top:0.5%; margin-bottom:1%">Comments</h2> --}}
  
       {{-- @include('projects.indexProjectTasks', ['projectTasks' => $project->projectTasks ])

       <hr style="margin-left:14%;margin-right: 14%;margin-top:1%">
       <h4 class="underline" style="margin-left:14%;margin-top:0.6%">Add comment</h4> --}}
           {{-- <form method="post" action="{{route('comments.store')}}">
               @csrf
               <div class="form-group">
                       <textarea class="form-control text-black" name="body" style="margin-left:14%;margin-top:0.6%; width:71.9%" placeholder="Want to join the conversation?"></textarea>
                       <input type="hidden" name="post_id" value="{{ $post->id }}" />
               </div>
               <div class="form-group">
                       <input placeholder="Want to join the conversation?" type="submit" class="btn btn-success px-2 py-1 bg-red-400" value="Add Comment" style="margin-left: 14%" />
               </div>
           </form> --}}

@endsection