<?php

namespace App\Http\Controllers;

use App\Http\Requests\projectsRequest;
use App\Models\projects;
  use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function createProject(projectsRequest $request)
    {
        // $user_id = User::find($idUser);
        $user_id = Auth::user()->id;
        $validate = $request->validated();
        $validate['user_id'] = $user_id;
        $project = projects::create($validate);
        return response()->json(["message" => "created successfully", $project], 200);
    }
    public function showAllProjects()
    {
        $allProjects=projects::all();
        return response()->json($allProjects);
    }


}
