<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    private $user;


    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $projects = $user->projects;
        $createdProjects = $user->createdProjects;
        return view('project.index')->with(compact('user','createdProjects','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create')->with(compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:projects|max:100',
            'description' => 'max:255',
        ]);

        $project = new Project;
        $project->creator_id = Auth::user()->id;
        $project->name = $request->name;
        $project->description = $request->description;

        if($project->save()){
            return redirect(route('project.show', $project));
        }
        return redirect(route('project.create'))->withErrors('An error occured, please try again later');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show')->with(compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit')->with(compact('project'));
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

        $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
        ]);


        $project = Project::find($project->id);
        $project->name = $request->name;
        $project->description;

        if($project->update()){
            return redirect(route('project.show', $project));
        }
        return redirect(route('project.create'))->withErrors('An error occured, please try again later');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('project.index'));
    }
}
