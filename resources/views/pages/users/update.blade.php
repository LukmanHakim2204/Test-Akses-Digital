@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit User</h3>
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
                    <a href="#">Users</a>
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
                        <div class="card-title">Edit User Form</div>
                    </div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 col-lg-8">

                                    {{-- NAME --}}
                                    <div class="form-group mb-3">
                                        <label for="name">User Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $user->name) }}">
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="form-group mb-3">
                                        <label for="email2">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email2"
                                            value="{{ old('email', $user->email) }}">
                                    </div>

                                    {{-- PASSWORD (opsional) --}}
                                    <div class="form-group mb-3">
                                        <label for="password">Password (optional)</label>

                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Leave blank if not changing">

                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="togglePassword('password', this)">
                                                <i class="icon-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- CONFIRM PASSWORD --}}
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation">Confirm Password</label>

                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control" placeholder="Confirm password">

                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="togglePassword('password_confirmation', this)">
                                                <i class="icon-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- ROLE --}}
                                    <div class="form-group mb-3">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">-- Select Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $user->roles->first()->name == $role->name ? 'selected' : '' }}>
                                                    {{ ucfirst($role->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="card-action text-end">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                        {{-- END FORM --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
