<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('Projects/index')
            ->with('projects', $projects)->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('projects.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('Projects.index')->with('succes', 'Project is aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Project $Project){

        $search = $request->search;
        $projects =Project::where(function($query) use ($search){

            $query->where('title','like',"%$search%")
            ->orWhere('description','like',"%$search%");

            })
            ->orWhereHas('category',function($query) use($search){
                $query->where('name','like',"%$search%");
            })
            ->get();
            
            return view('Projects.index')->with('projects', $projects)->with('search', $search)->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $Project)
    {
        $categories = Category::all();
        return view('Projects.edit', compact('Project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $Project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $Project->fill($request->post())->save();

        return redirect()->route('Projects.index')->with('succes', 'Project is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $Project)
    {
        $Project->delete();
        return redirect()->route('Projects.index')->with('succes', 'Project is verwijderd');
    }
}
