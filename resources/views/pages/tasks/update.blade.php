@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Update task</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">task</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">task Form</div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <div class="form-group mb-3">
                                        <label for="project">project</label>
                                        <select name="project_id" id="project" class="form-control">
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}"
                                                    {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                                    {{ $project->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    {{-- {{ Asigned to User }} --}}

                                    <div class="form-group mb-3">
                                        <label for="Asigned to User">Assign To User</label>
                                        <select name="assigned_to_user_id" id="manager" class="form-control">
                                            @foreach ($asignedUsers as $asignedUser)
                                                <option value="{{ $asignedUser->id }}"
                                                    {{ old('assigned_to_user_id') == $asignedUser->id ? 'selected' : '' }}>
                                                    {{ $asignedUser->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- NAME --}}
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter task title" value="{{ old('title', $task->title) }}">
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="in_progress"
                                                {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress
                                            </option>
                                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-action text-end">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('task.index') }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
