@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Finance</h3>
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
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <a href="{{ route('finances.create') }}" class="btn btn-primary rounded-pill">
                            Create Finance
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th> Type </th>
                                        <th> Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($finances as $finance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $finance->type }}</td>
                                            <td>{{ $finance->amount }}</td>
                                            <td>{{ $finance->date }}</td>
                                            <td>
                                                @can('edit finance')
                                                    <a href="{{ route('finances.edit', $finance->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                @endcan
                                                @can('delete finance')
                                                    <form action="{{ route('finances.destroy', $finance->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

        </div>
    </div>
@endsection
