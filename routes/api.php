<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\TaskTeamController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// project

// Create a project
Route::post('/project/create', [ProjectController::class, 'store']);
// View all projects
Route::get('/project/all', [ProjectController::class, 'show']);
// Update Project
Route::post('/project/update', [ProjectController::class, 'update']);
// Delete a project
Route::post('/project/delete', [ProjectController::class, 'destroy']);


// project Team_member

// Add a member
Route::post('/project/addMember', [ProjectTeamController::class, 'projectAddMember']);
// Delete project team_member
Route::post('/project/deleteMember', [ProjectTeamController::class, 'projectDeleteMember']);


// Milestone

// Create a milestone
Route::post('/milestone/create', [MilestoneController::class, 'create']);
// View all milestone
Route::get('/milestone/all', [MilestoneController::class, 'show']);
// Update milestone
Route::post('/milestone/update', [MilestoneController::class, 'update']);
// Delete milestone
Route::post('/milestone/delete', [MilestoneController::class, 'destroy']);


// Task

// Create a task
Route::post('/task/create', [TaskController::class, 'create']);
// View all task
Route::get('/task/all', [TaskController::class, 'show']);
// Update task
Route::post('/task/update', [TaskController::class, 'update']);
// Delete task
Route::post('/task/delete', [TaskController::class, 'destroy']);

// task Team_member add

// add a member
Route::post('/task/addMember', [TaskTeamController::class, 'taskAddMember']);
// Remove a member
Route::post('/task/deleteMember', [TaskTeamController::class, 'taskDeleteMember']);