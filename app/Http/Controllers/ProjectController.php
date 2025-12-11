<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('manager')->get();
        return view('pages.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil user yang memiliki role "Staff" dari Spatie
        $staff = User::role('Staff')->get();

        return view('pages.project.create', compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->validated());

        $project->manager()->attach($request->manager_id, [
            'role_in_project' => $request->role_in_project ?? 'Staff',
        ]);
        Alert::toast('Project created successfully', 'success');

        return redirect()->route('project.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::with('manager')->findOrFail($id);
        $staff   = User::role('Staff')->get();

        return view('pages.project.update', compact('project', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);

        // Update data project
        $project->update($request->validated());

        // Update pivot (sync lebih aman)
        $project->manager()->sync([
            $request->manager_id => [
                'role_in_project' => $request->role_in_project ?? 'Staff'
            ]
        ]);
        Alert::toast('Project updated successfully', 'success');

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Hapus relasi pivot
        $project->manager()->detach();

        // Hapus project
        $project->delete();
        Alert::toast('Project deleted successfully', 'success');
        return redirect()->route('project.index');
    }
}
