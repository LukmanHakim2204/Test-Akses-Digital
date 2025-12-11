@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create Customer</h3>
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
                    <a href="#">Customer</a>
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
                        <div class="card-title">Customer Form</div>
                    </div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 col-lg-8">

                                    {{-- NAME --}}
                                    <div class="form-group mb-3">
                                        <label for="name">Customer Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter customer name" value="{{ old('name') }}">
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="form-group mb-3">
                                        <label for="email2">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email2"
                                            placeholder="Enter Email" value="{{ old('email') }}">
                                        <small class="form-text text-muted">We'll never share your email with anyone
                                            else.</small>
                                    </div>

                                    {{-- Description --}}
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" class="form-control" id="description"
                                            placeholder="Description" value="{{ old('description') }}">
                                    </div>

                                </div>
                            </div>

                            <div class="card-action text-end">
                                <button class="btn btn-success">Submit</button>
                                <a href="{{ route('customer.index') }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                        {{-- END FORM --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
