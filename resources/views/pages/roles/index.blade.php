@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Role</h3>
        </div>

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('roles.create') }}" class="btn btn-primary rounded-pill">
                    + Create Role
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name Role</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>

                                    <td>
                                        @if ($role->permissions->isEmpty())
                                            <span class="badge bg-secondary">No Permissions</span>
                                        @else
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge bg-info text-dark">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        @endif
                                    </td>

                                    <td>
                                        @can('edit role')
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                        @endcan
                                        @can('delete role')
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin ingin menghapus role ini?')"
                                                    class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
