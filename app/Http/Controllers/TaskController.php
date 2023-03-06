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

    // Update task
    public function update(Request $request)
    {
        $task = Task::where('id',$request->task_id)->firstOrFail();

        $task->task_name = $request->has('task_name') ? $request->input('task_name') : $task->task_name;
        $task->task_description = $request->has('task_description') ? $request->input('task_description') : $task->task_description;
        $task->task_start_date = $request->has('task_start_date') ? $request->input('task_start_date') : $task->task_start_date;
        $task->task_end_date = $request->has('task_end_date') ? $request->input('task_end_date') : $task->task_end_date;
        $task->task_priority = $request->has('task_priority') ? $request->input('task_priority') : $task->task_priority;
        $task->task_status = $request->has('task_status') ? $request->input('task_status') : $task->task_status;

        $task->save();

        return response()->json([
            'success_msg' => 'Task_updated',
        ]);
    }

   

    // Task Delete
    public function destroy(Request $request)
    {
        Task::where('id','=',$request->task_id)->delete();

        return response()->json([
            'success_msg' => 'Task_deleted',
        ]);
    }
}
