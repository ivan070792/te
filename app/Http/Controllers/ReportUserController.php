<?php

namespace App\Http\Controllers;

use App\Models\ReportUser;
use Illuminate\Http\Request;

class ReportUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportUser  $reportUser
     * @return \Illuminate\Http\Response
     */
    public function show(ReportUser $reportUser)
    {
        //
    }

    /**
     * Display the all reports from user.
     *
     * @param  \App\Models\ReportUser  $reportUser
     * @return \Illuminate\Http\Response
     */
    public function showReports(ReportUser $reportUser, $user_id)
    {
        $data = [
            'user_data' => ReportUser::find($user_id),
        ];
        return view('page.user_show_reports', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportUser  $reportUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportUser $reportUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportUser  $reportUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportUser $reportUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportUser  $reportUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportUser $reportUser)
    {
        //
    }
}
