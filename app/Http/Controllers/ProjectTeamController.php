<?php

namespace App\Http\Controllers;

use App\Models\ProjectTeam;
use Illuminate\Http\Request;

class ProjectTeamController extends Controller
{
    // Add a member to project
    public function projectAddMember(Request $request)
    {
        $user = ProjectTeam::create([
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'success_msg' => 'Project_Member_Added',
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
    public function show(project_team $project_team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project_team $project_team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project_team $project_team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project_team $project_team)
    {
        //
    }
}
