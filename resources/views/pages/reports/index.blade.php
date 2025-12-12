@extends('layout.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Finance Reports</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Reports</a></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <form action="{{ route('reports.index') }}" method="GET" class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $start }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $end }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary w-100">
                            Filter
                        </button>
                    </div>

                </form>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="card bg-success text-white p-4 rounded-3">
                            <h4>Total Income</h4>
                            <h2 class="fw-bold">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h2>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-danger text-white p-4 rounded-3">
                            <h4>Total Expenses</h4>
                            <h2 class="fw-bold">Rp {{ number_format($totalExpenses, 0, ',', '.') }}</h2>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
