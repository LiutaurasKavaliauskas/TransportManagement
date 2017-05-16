<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\TravelReports;
use App\Models\Vehicles;
use App\User;


class AdminController extends Controller
{
    public function index()
    {
        return view('transport.admin', ['users' => User::all()->toArray()]);
    }

    public function showReports(AdminRequest $request, $id)
    {
        $reports = [];
        foreach (TravelReports::all() as $report)
            if($report->created_at->format('m,Y') <= $request->month && $report->getUser->first()->id == $id)
                $reports[] = $report;


        return view('transport.user_reports', ['reports' => $reports]);

    }
}
