@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create Project</h3>
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
                    <a href="#">project</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Create</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">project Form</div>
                    </div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form action="{{ route('project.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 col-lg-8">

                                    {{-- NAME --}}
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter project title" value="{{ old('title') }}">
                                    </div>



                                    {{-- Description --}}
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"
                                            value="{{ old('description') }}"></textarea>
                                    </div>

                                    {{-- {{ Manager }} --}}

                                    <div class="form-group mb-3">
                                        <label for="manager">Manager</label>
                                        <select name="manager_id" id="manager" class="form-control">
                                            @foreach ($staff as $staf)
                                                <option value="{{ $staf->id }}"
                                                    {{ old('manager_id') == $staf->id ? 'selected' : '' }}>
                                                    {{ $staf->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="card-action text-end">
                                <button class="btn btn-success">Submit</button>
                                <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                        {{-- END FORM --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
