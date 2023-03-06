<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Create a new project
    public function store(Request $request)
    {
        $newProject = $request->validate([
            'project_name' => 'required|max:255',
            'project_start_date' => 'max:255',
            'project_end_date' => 'max:255',
            'project_budget' => 'max:255',
            'project_priority' => 'max:255',
            'project_manager' => 'max:255',
        ]);

        $user = Project::create([
            'project_name' => $newProject['project_name'],
            'project_description' => $request->project_description,
            'project_start_date' => $request->project_start_date,
            'project_end_date' => $request->project_end_date,
            'project_budget' => $request->project_budget,
            'project_priority' => $request->project_priority,
            'project_manager' => $request->project_manager,
        ]);

        return response()->json(['success_msg' => 'Project_saved'], 200);
    }

    // Show all projects
    public function show()
    {
        $projects = Project::all();
        return response()->json(['projects'=>$projects], 200);
    }

    // Update a Project
    public function update(Request $request)
    {

        $project = Project::where('id',$request->project_id)->firstOrFail();

        $project->project_name = $request->has('project_name') ? $request->input('project_name') : $project->project_name;
        $project->project_description = $request->has('project_description') ? $request->input('project_description') : $project->project_description;
        $project->project_start_date = $request->has('project_start_date') ? $request->input('project_start_date') : $project->project_start_date;
        $project->project_end_date = $request->has('project_end_date') ? $request->input('project_end_date') : $project->project_end_date;
        $project->project_budget = $request->has('project_budget') ? $request->input('project_budget') : $project->project_budget;
        $project->project_priority = $request->has('project_priority') ? $request->input('project_priority') : $project->project_priority;
        $project->project_manager = $request->has('project_manager') ? $request->input('project_manager') : $project->project_manager;

        $project->save();

        return response()->json([
            'success_msg' => 'Project_updated',
        ]);
    }

    // Delete a project
    public function destroy(Request $request)
    {
        Project::where('id','=',$request->project_id)->delete();

        return response()->json([
            'success_msg' => 'Project_deleted',
        ]);
    }

  
}
