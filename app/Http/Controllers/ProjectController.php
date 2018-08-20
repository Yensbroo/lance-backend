<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Validator;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::with('category')->paginate(7);
       // $projects->load('category');
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date('c');
        $todayFormat = substr($today, 0, 16);
        
        return view('projects.create', compact('todayFormat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'category_id' => 'required',
            'project_start' => 'required',
            'project_end' => 'required',
            'title' => 'required|min:5',
            'body' => 'required|min:20',
            'budget' => 'required',
        ];

        $messages = [
            'category_id.required' => 'Een categorie is verplicht',
            'project_start.required' => 'Een begin datum is verplicht',
            'project_end.required' => 'Een eind datum is verplicht',
            'title.required' => 'Een titel is verplicht',
            'body.required' => 'Een beschrijving is verplicht',
            'budget.required' => 'Een budget is verplicht',
        ];


        $project = Project::create([
            'user_id' => auth()->id(),
            'body' => request('body'),
            'category_id' => request('category_id'),
            'project_end' => request('project_end'),
            'project_start' => request('project_start'),
            'title' => request('title'),
            'budget' => request('budget')
        ]);
        $checked = $request->has('publised') ? 1 : 0;
        $id = ['user_id' => auth()->id()];

        
        
        

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  $channelId
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update([
            'project_start' => request('project_start'),
            'category_id' => request('category_id'),
            'published' => request('published'),
            'budget' => request('budget'),
            'project_end' => request('project_end'),
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => request('user_id')
        ]);

        return redirect('/projects')->with('flash', 'Het project is bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        
        $project->update(['deleted_at' => date('Y-m-d H:i:s')]);

        return redirect('/projects')->with('flash', 'Project is verwijderd!');

    }
}
