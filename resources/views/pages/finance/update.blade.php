@extends('layout.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Update Finances</h3>
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
                    <a href="#">Finances</a>
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
                        <div class="card-title">Finances Form</div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('finances.update', $finance->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    {{-- Type --}}
                                    <div class="form-group mb-3">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="income"
                                                {{ old('type') == 'income' ? 'selected' : '' . $finance->type }}>Income
                                            </option>
                                            <option value="expense"
                                                {{ old('type') == 'expense' ? 'selected' : '' . $finance->type }}>Expense
                                            </option>
                                        </select>
                                    </div>

                                    {{-- Amount --}}
                                    <div class="form-group mb-3">
                                        <label for="amount"> Amount</label>
                                        <input type="number" name="amount" id="amount" class="form-control"
                                            placeholder="Enter finances total amount"
                                            value="{{ old('amount') ?? $finance->amount }}">
                                    </div>


                                    {{-- Description --}}
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" placeholder="Description">{{ old('description', $finance->description) }}</textarea>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ old('date') ?? $finance->date }}">
                                    </div>

                                </div>
                            </div>

                            <div class="card-action text-end">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('finances.index') }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
