<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('project')->get();
        return view('pages.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $asignedUsers = User::all();
        return view('pages.tasks.create', compact('projects', 'asignedUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());

        Alert::toast('Task created successfully.', 'success');
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all();
        $asignedUsers = User::all();
        return view('pages.tasks.update', compact('task', 'projects', 'asignedUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        Alert::toast('Task updated successfully.', 'success');
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        Alert::toast('Task deleted successfully.', 'success');
        return redirect()->route('task.index');
    }
}
