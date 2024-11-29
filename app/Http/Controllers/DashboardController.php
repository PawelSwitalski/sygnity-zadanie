<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $currencies = Currency::all();

        $actual_date =  date('Y-m-d');

        return view('dashboard', [
            'currencies' => $currencies,
            'actual_date' => $actual_date
        ]);
    }
}
