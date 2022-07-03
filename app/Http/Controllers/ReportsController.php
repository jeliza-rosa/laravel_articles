<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{


    public function show()
    {
        return view('reports_show');
    }

    public function reports()
    {
        return view('reports_show_total');
    }
}
