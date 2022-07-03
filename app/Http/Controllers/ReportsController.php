<?php

namespace App\Http\Controllers;

use App\Notifications\Report;
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

    public function reportsPost()
    {
        echo 'dfgdf';
    }

    public function reportsSend()
    {
        auth()->user()->notify(new Report(request()->all()));
//        \App\Jobs\FinalReport::dispatch();

        return redirect('/admin/reports/total');
    }
}
