<?php

namespace App\Http\Controllers;

// USED MODEL

use App\Charts\TotalUser;
use App\Charts\TotalVisitor;
use App\Models\User;
use App\Models\mStaff;
use App\Models\mCustomer;
use App\Models\tVisit;
use App\Models\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(Request $request, TotalUser $totalUserChart, TotalVisitor $totalVisitorChart){
        $date = date('Y-m-d');
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();
        $numCust = mCustomer::get()->count();
        $numStaff = mStaff::get()->count();
        $numVisit = tVisit::whereDate('date', $date)->where('timeOut', '!=', NULL)->get()->count();
        return view('home', compact('dataStaff', 'numCust', 'numStaff', 'numVisit'), [
            'totalUserChart' => $totalUserChart->build(),
            'totalVisitorChart' => $totalVisitorChart->build()
        ]);
    }
}
