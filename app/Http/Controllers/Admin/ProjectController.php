<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.projects.projects');
    }
    public function getProjectList(){
        $project=Project::orderBy('id','DESC')->get();
        return response()->json(['projects' => $project], 200);
    }
    public function saveProject(Request $request){
        $this->validate($request, [
            'project_name' => 'required|unique:projects',
            'project_code' => 'unique:projects'],
            [
                'project_name.required' => ' The Name field is required.',
                'project_name.unique' => ' The  Name must be unique ,Find other Name.',
                'project_code.unique' => ' The  Project Code must be unique ,Find other Project Code.',
            ]);

        $project=new Project();
        $project->project_name=$request->input('project_name');
        $project->project_code=$request->input('project_code');
        $project->client_name=$request->input('client_name');
        $project->client_email=$request->input('client_email');
        $project->sample_size=$request->input('sample_size');
        $project->objective=$request->input('objective');
        $project->description=$request->input('description');
        $project->budget=$request->input('budget');
        $project->size=$request->input('size');
        $project->save();
        return response()->json(['project' => "ok"], 201);

    }
}
