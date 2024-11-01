<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;

class MonthlyReportController extends Controller
{
    public function index()
    {
        return view('admin.monthly_report.index');
    }
}