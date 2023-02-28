<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    // Create Milestone
    public function milestoneCreate(Request $request)
    {
        $newMilestone = $request->validate([
            'milestone_name' => 'required|max:255',
        ]);

        $user = Milestone::create([
            'milestone_name' => $newMilestone['milestone_name'],
            'milestone_description' => $request->milestone_description,
            'milestone_start_date' => $request->milestone_start_date,
            'milestone_end_date' => $request->milestone_end_date,
            'milestone_budget' => $request->milestone_budget,
            'milestone_percentage' => $request->milestone_percentage,
            'milestone_priority' => $request->milestone_priority,
            'milestone_status' => $request->milestone_status,
            'project_id' => $request->project_id,
        ]);

        return response()->json([
            'success_msg' => 'Milestone_saved',
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
    public function show(milestone $milestone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(milestone $milestone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, milestone $milestone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(milestone $milestone)
    {
        //
    }
}
