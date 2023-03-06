<?php

namespace App\Http\Controllers;

use App\Models\ProjectTeam;
use Illuminate\Http\Request;

class ProjectTeamController extends Controller
{
    // Add a member to project
    public function projectAddMember(Request $request)
    {

        if ($request->has('project_id') && $request->has('user_id'))
        {
            $user = ProjectTeam::create([
                'project_id' => $request->project_id,
                'user_id' => $request->user_id,
            ]);
    
            return response()->json([
                'success_msg' => 'Project_Member_Added',
            ]);

        }else{

            return response()->json([
                'Error_msg' => 'Error',
            ]);
        }

        
    }

    // Remove a member from the project
    public function projectDeleteMember(Request $request)
    {
        ProjectTeam::where('project_id','=',$request->project_id)
                ->where('user_id','=',$request->user_id)
                ->delete();

        return response()->json([
            'success_msg' => 'Project_member_deleted',
        ]);
    }
}
