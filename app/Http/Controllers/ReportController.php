<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $start = $request->start_date;
        $end =   $request->end_date;


        $finances = Finance::query();

        if ($start && $end) {
            $finances->whereBetween('created_at', [$start, $end]);
        }

        $totalIncome = (clone $finances)->where('type', 'income')->sum('amount');
        $totalExpenses = (clone $finances)->where('type', 'expense')->sum('amount');

        return view('pages.reports.index', compact(
            'totalIncome',
            'totalExpenses',
            'start',
            'end'
        ));
    }
}
