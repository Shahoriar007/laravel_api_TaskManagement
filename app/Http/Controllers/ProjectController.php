<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Create a new project
    public function projectCreate()
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

        return response()->json([
            'success_msg' => 'Project_saved',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
