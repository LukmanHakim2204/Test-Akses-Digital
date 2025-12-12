<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Requests\FinanceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finances = Finance::all();
        return view('pages.finance.index', compact('finances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.finance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinanceRequest $request)
    {
        Finance::create($request->validated());
        Alert::toast('Finance record created successfully', 'success');
        return redirect()->route('finances.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finance = Finance::findOrFail($id);
        return view('pages.finance.update', compact('finance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinanceRequest $request, string $id)
    {
        $finance = Finance::findOrFail($id);
        $finance->update($request->validated());
        Alert::toast('Finance record updated successfully', 'success');
        return redirect()->route('finances.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $finance = Finance::findOrFail($id);
        $finance->delete();
        Alert::toast('Finance record deleted successfully', 'success');
        return redirect()->route('finances.index');
    }
}
