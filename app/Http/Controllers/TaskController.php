<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Create Task
    public function create(Request $request)
    {
        $newTask = $request->validate([
            'task_name' => 'required|max:255',
        ]);

        $user = Task::create([
            'task_name' => $newTask['task_name'],
            'task_description' => $request->task_description,
            'task_start_date' => $request->task_start_date,
            'task_end_date' => $request->task_end_date,
            'task_priority' => $request->task_priority,
            'task_status' => $request->task_status,
            'milestone_id' => $request->milestone_id,
        ]);

        return response()->json([
            'success_msg' => 'Task_saved',
        ]);
    }


    // Show all tasks
    public function show()
    {
        $tasks = Task::all();
        return response()->json(['tasks'=>$tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        //
    }
}
