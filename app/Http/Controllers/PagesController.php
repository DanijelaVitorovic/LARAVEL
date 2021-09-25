<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = [
            'title' => 'Services',
            'services' => ['AAA', 'BBB', 'CCC'],
        ];
        return view('pages.services')->with($data);
    }

    public function home()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('projects', $user->project);
    }

    public function createProject()
    {
        return view('projects.create');
    }
}
