@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create Orders</h3>
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
                    <a href="#">Orders</a>
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
                        <div class="card-title">orders Form</div>
                    </div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 col-lg-8">

                                    {{-- {{ Customer }} --}}

                                    <div class="form-group mb-3">
                                        <label for="customer">Customer</label>
                                        <select name="customer_id" id="customer" class="form-control">
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"
                                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- NAME --}}
                                    <div class="form-group mb-3">
                                        <label for="total_amount">Total Amount</label>
                                        <input type="number" name="total_amount" id="total_amount" class="form-control"
                                            placeholder="Enter orders total amount" value="{{ old('total_amount') }}">
                                    </div>


                                    {{-- {{ Status }} --}}
                                    <div class="form-group mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>
                                                Canceled</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="card-action text-end">
                                    <button class="btn btn-success">Submit</button>
                                    <a href="{{ route('orders.index') }}" class="btn btn-danger">Cancel</a>
                                </div>

                        </form>
                        {{-- END FORM --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
