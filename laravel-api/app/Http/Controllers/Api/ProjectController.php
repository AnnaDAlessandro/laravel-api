<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index (){

        $projects = Project::all();

      return response()->json([
        'success'=> true,
        'projects'=>$projects
    ]);   
    }


    public function show($slug){
      $project = Project::where('slug', $slug)->first();

    if($project) {
        return response()->json([
            'success' => true,
            'project' => $project // Restituisci il singolo progetto trovato
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => "Non c'è il Progetto che hai cercato"
        ]);
    }

    }


    
   
}
