@extends('layout.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Role</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Role Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $role->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Assign Permission</label>

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Update Role</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
