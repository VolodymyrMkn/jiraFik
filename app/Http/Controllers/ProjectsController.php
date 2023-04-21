<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\Projects;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Models\Status;
use App\Models\Tasks;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Projects::orderBy('id', 'desc')->get();
        return view('projects.index', compact(['projects']));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $project = new Projects();
        return view('projects.create', compact(['project']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProjectsRequest $request
     */
    public function store(StoreProjectsRequest $request)
    {
        $data = $request->validated();
        $data["slug"] = (string)str($data["title"])->slug();
        $project = Projects::create($data);
        if ($file = $request->file("image"))
            $project->update(["image" => File::upLoadImage($file, "projects", $project)]);
        Tasks::tasks($request, $project);
        return to_route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Projects $project)
    {
        $project = $project->with('tasks.status')->where('id', $project->id)->first();
        return view('projects.show', compact(['project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Projects $projects
     */
    public function edit(Projects $project)
    {
        $project = $project->with('tasks.status')->where('id', $project->id)->first();
        $statuses = Status::all();
        return view('projects.edit', compact(['project', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProjectsRequest $request
     * @param \App\Models\Projects $projects
     */
    public function update(Projects $project, UpdateProjectsRequest $request)
    {
        $project->update($request->validated());
        $project->update(["image" => File::upLoadImage($request->file('image'), "projects", $project)]);
        foreach ($request->status ?? [] as $element) {
            foreach ($element as $id => $key) {
                Tasks::find($id)->update([
                    'status_id' => $key,
                ]);
            }
        }
        Tasks::tasks($request, $project);
        return to_route('projects.show', compact(['project']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Projects $projects
     */
    public function destroy(Projects $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
