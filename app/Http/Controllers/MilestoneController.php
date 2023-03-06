<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    // Create Milestone
    public function create(Request $request)
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


    // Show Milestone
    public function show()
    {
        $milestones = Milestone::all();
        return response()->json(['milestones'=>$milestones]);
    }

    // Update Milestone
    public function update(Request $request)
    {
        $milestone = Milestone::where('id',$request->milestone_id)->firstOrFail();

        $milestone->milestone_name = $request->has('milestone_name') ? $request->input('milestone_name') : $milestone->milestone_name;
        $milestone->milestone_description = $request->has('milestone_description') ? $request->input('milestone_description') : $milestone->milestone_description;
        $milestone->milestone_start_date = $request->has('milestone_start_date') ? $request->input('milestone_start_date') : $milestone->milestone_start_date;
        $milestone->milestone_end_date = $request->has('milestone_end_date') ? $request->input('milestone_end_date') : $milestone->milestone_end_date;
        $milestone->milestone_budget = $request->has('milestone_budget') ? $request->input('milestone_budget') : $milestone->milestone_budget;
        $milestone->milestone_percentage = $request->has('milestone_percentage') ? $request->input('milestone_percentage') : $milestone->milestone_percentage;
        $milestone->milestone_priority = $request->has('milestone_priority') ? $request->input('milestone_priority') : $milestone->milestone_priority;
        $milestone->milestone_status = $request->has('milestone_status') ? $request->input('milestone_status') : $milestone->milestone_status;

        $milestone->save();

        return response()->json([
            'success_msg' => 'Milestone_updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(milestone $milestone)
    {
        //
    }
}
