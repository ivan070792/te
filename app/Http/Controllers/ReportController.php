<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportUser;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Report $report)
    {
        $data = ['report' => $report->latest()->get()];
        return view('page.report_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Report $report)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone,
            'report_category' => $request->report_category,
            'report_text' => $request->report_text

        ];
        $report->insert();
        return view('welcome', $data);
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
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report, $report_id)
    {
        $data = ['report' => $report->find($report_id)];
        return view('page.report_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    /**
     * Show form app.
     *
     * @param  \App\Models\ReportCategoty  $reportCategory
     * @return \Illuminate\Http\Response
     */
    public function swow_form(ReportCategory $reportCategory, Hospital $hospital){

        $data = [
            'report_categories' => $reportCategory->latest()->get(),
            'hospitals' => $hospital->latest()->get(),
        ];
        return view('page.report_form', $data);
    }
}
