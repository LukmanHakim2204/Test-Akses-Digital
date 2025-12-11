@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Update Project</h3>
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
                    <a href="#">Project</a>
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
                        <div class="card-title">Project Form</div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('project.update', $project->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    {{-- Title --}}
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter project title" value="{{ old('title', $project->title) }}">
                                    </div>

                                    {{-- Description --}}
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" placeholder="Description">{{ old('description', $project->description) }}</textarea>
                                    </div>

                                    {{-- Manager --}}
                                    <div class="form-group mb-3">
                                        <label for="manager">Manager</label>
                                        <select name="manager_id" id="manager" class="form-control">
                                            @foreach ($staff as $staf)
                                                <option value="{{ $staf->id }}"
                                                    {{ $project->manager->pluck('id')->contains($staf->id) ? 'selected' : '' }}>
                                                    {{ $staf->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="card-action text-end">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
