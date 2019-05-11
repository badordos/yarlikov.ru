<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string',
            'link' => 'required | string',
            'desc' => 'required | string',
            'image' => 'mimes:jpeg, | max:5000 | required',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->desc = $request->desc;
        $project->link = $request->link;
        if(isset($request->is_favorite)){
            $project->is_favorite = 1;
        }

        $project->save();

        $project->addMediaFromRequest('image')->usingFileName(str_slug($request->image->getClientOriginalName()))->preservingOriginal()->toMediaCollection('images');

        return redirect(route('projects.index'))->with('message', 'Проект ' . $project->title . ' успешно добавлен.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $image = $project->getFirstMedia('images');
        return view('admin.projects.show', compact('project', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $image = $project->getFirstMedia('images');
        return view('admin.projects.edit', compact('project', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required | string',
            'link' => 'required | string',
            'desc' => 'required | string',
            'image' => 'mimes:jpeg, | max:5000 |',
        ]);

        $project->title = $request->title;
        $project->desc = $request->desc;
        $project->link = $request->link;
        if(isset($request->is_favorite)){
            $project->is_favorite = 1;
        }else{
            $project->is_favorite = 0;
        }
        $project->update();

        if (isset($request->image)) {
            $project->clearMediaCollection('images');
            $project->addMediaFromRequest('image')->preservingOriginal()->toMediaCollection('images');
        }

        return redirect(route('projects.index'))->with('message', 'Проект ' . $project->title . ' успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route('projects.index'))->with('message', 'Проект успешно удален.');
    }
}
