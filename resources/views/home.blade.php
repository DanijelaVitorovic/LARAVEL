@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/project/public/posts/create" class="btn btn-primary">Create Post</a>
                    <br>
                    <h3>Your Posts</h3>
                    @if (count($projects) > 0) 
                    <table class="table table-striped">
                        <tr>
                            <th>Project Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($projects as $project)
                            <tr>
                                <th>{{$project->projectName}}</th>
                                <th>{{$project->start_date}}</th>
                                <th>{{$project->end_date}}</th>
                                <th><a href="/project/public/projects/{{$project->id}}/edit" class="btn btn-default">Edit</th>
                                <th>   {!! Form::open(['action' => ['App\Http\Controllers\ProjectController@destroy', $project->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                </th>
                         </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
