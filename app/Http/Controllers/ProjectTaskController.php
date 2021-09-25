<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTask;

class ProjectTaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectTasks = ProjectTask::orderBy('nameTask', 'desc')->paginate(10);
        return view('projectTasks.indexProjectTasks')->with(
            'projectTasks',
            $projectTasks
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projectTasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nameTask' => 'required',
        ]);

        $projectTask = new ProjectTask();
        $projectTask->nameTask = $request->input('nameTask');
        $projectTask->priority = $request->input('priority');
        $projectTask->summary = $request->input('summary');
        $projectTask->start_date = $request->input('start_date');
        $projectTask->user_id = auth()->user()->id;
        $projectTask->save();

        return redirect('/projectTasks')->with(
            'success',
            'Project Task Created'
        );
    }

    public function storeWithProject(Request $request)
    {
        $this->validate($request, [
            'nameTask' => 'required',
        ]);
        $projectTask = new ProjectTask();
        $projectTask->nameTask = $request->input('nameTask');
        $projectTask->priority = $request->input('priority');
        $projectTask->summary = $request->input('summary');
        $projectTask->start_date = $request->input('start_date');
        $projectTask->user_id = auth()->user()->id;
        $projectTask->project_id = auth()->user()->id;
        $projectTask->save();

        $route = request()->route('id');
        console . log('aaaaa', $projectTask);
        return redirect(`/projects`)->with('success', 'Project Task Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectTask = ProjectTask::find($id);
        return view('projectTasks.show')->with('projectTask', $projectTask);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectTask = ProjectTask::find($id);
        return view('projectTasks.edit')->with('projectTask', $projectTask);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projectTask = ProjectTask::find($id);
        $projectTask->nameTask = $request->input('nameTask');
        $projectTask->priority = $request->input('priority');
        $projectTask->summary = $request->input('summary');
        $projectTask->start_date = $request->input('start_date');
        // $projectTask->user_id = auth()->user()->id;
        $projectTask->save();

        return redirect('/projectTasks')->with(
            'success',
            'Project Task Updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectTask = ProjectTask::find($id);
        $projectTask->delete();
        return redirect('/projectTasks')->wiht(
            'success',
            'Project Task Deleted'
        );
    }
}
