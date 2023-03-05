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

    // Delete a project
    public function destroy($project_id)
    {
        Project::where('project_id','=',$project_id)->delete();

        return response()->json([
            'success_msg' => 'Project_deleted',
        ]);
    }

    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

  
}
