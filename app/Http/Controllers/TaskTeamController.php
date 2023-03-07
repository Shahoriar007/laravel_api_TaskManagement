<?php

namespace App\Http\Controllers;

use App\Models\TaskTeam;
use Illuminate\Http\Request;

class TaskTeamController extends Controller
{
    // Add member to task
    public function taskAddMember(Request $request)
    {
        

        if ($request->has('task_id') && $request->has('user_id'))
        {
            $user = TaskTeam::create([
                'task_id' => $request->task_id,
                'user_id' => $request->user_id,
            ]);
    
            return response()->json([
                'success_msg' => 'Task_Member_Added',
            ]);

        }else{

            return response()->json([
                'Error_msg' => 'Error',
            ]);
        }
    }

    // Remove a member from the project
    public function taskDeleteMember(Request $request)
    {
        TaskTeam::where('task_id','=',$request->task_id)
                ->where('user_id','=',$request->user_id)
                ->delete();

        return response()->json([
            'success_msg' => 'Task_member_deleted',
        ]);
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
    public function show(TaskTeam $taskTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskTeam $taskTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskTeam $taskTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskTeam $taskTeam)
    {
        //
    }
}
