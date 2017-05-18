<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\TravelReports;
use App\User;
use DateTime;


class AdminController extends Controller
{
    /**
     * Return view for admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('transport.admin', ['users' => User::all()]);
    }

    /**
     * Return reports of selected month and user for admin
     *
     * @param AdminRequest $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReports(AdminRequest $request, $id)
    {
        $start =(DateTime::createFromFormat('m/Y', $request->month))->modify('first day of this month');
        $end = (DateTime::createFromFormat('m/Y', $request->month))->modify('last day of this month');

        return view('transport.user_reports', ['reports' => TravelReports::where('created_at', '>', $start)->where('created_at', '<', $end)->get()]);

    }
}
