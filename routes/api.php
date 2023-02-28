<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\TaskTeamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// project
// Create a project
Route::post('/project/create', [ProjectController::class, 'projectCreate']);

// Milestone
// Create a milestone
Route::post('/milestone/create', [MilestoneController::class, 'milestoneCreate']);

// Task
// Create a task
Route::post('/task/create', [TaskController::class, 'taskCreate']);

// project Team_member add
// add a member
Route::post('/project/addMember', [ProjectTeamController::class, 'projectAddMember']);

// task Team_member add
// add a member
Route::post('/task/addMember', [TaskTeamController::class, 'taskAddMember']);