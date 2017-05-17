<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\TravelReports;
use App\Models\Vehicles;
use App\User;
use Carbon\Carbon;
use DateTime;


class AdminController extends Controller
{
    public function index()
    {
        return view('transport.admin', ['users' => User::all()->toArray()]);
    }

    public function showReports(AdminRequest $request, $id)
    {
//        $reports = [];
//        foreach (TravelReports::all() as $report)
//            if($report->created_at->format('m,Y') <= $request->month && $report->getUser->first()->id == $id)
//                $reports[] = $report;
        //        dd(date('Y-m-d H:i:s'), strtotime($request->month));

        $start =(DateTime::createFromFormat('m/Y', $request->month))->modify('first day of this month');
        $end = (DateTime::createFromFormat('m/Y', $request->month))->modify('last day of this month');

        return view('transport.user_reports', ['reports' => TravelReports::where('created_at', '>', $start)->where('created_at', '<', $end)->get()]);

    }
}
