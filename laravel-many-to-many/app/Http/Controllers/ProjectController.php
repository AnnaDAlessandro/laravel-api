<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage; 


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $technologies = Technology::all();
        return view('pages.projects.create', compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        
    
        $slug= Project::generateSlug($request->title);
        $val_data['slug']= $slug;

        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('project_image', $request->cover_image);
            $val_data['cover_image']= $path;

        }





        $new_project=Project::create($val_data);

        if($request->has('technologies')){
            $new_project->technologies()->attach($request->technologies);

        }

        return redirect()->route('dashboard.project.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)

    {
        $categories = Category::all();
        $technologies = Technology::all();

        return view('pages.projects.edit',compact('project', 'categories','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        
        $slug= Project::generateSlug($request->title);
        $val_data['slug']= $slug;
        $project->update($val_data);
        
        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);

        }


        return redirect()->route('dashboard.project.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);


       $project->delete();
       return redirect()->route('dashboard.project.index');

    }
}
