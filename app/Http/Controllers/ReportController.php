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
    public function create(Request $request, Report $report, ReportCategory $reportCategory, Hospital $hospital)
    {
    
        $data = [
            'report_categories' => $reportCategory->latest()->get(),
            'hospitals' => $hospital->latest()->get(),
        ];
        return view('page.report_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ReportUser $reportUser)
    {
        $user = $reportUser->where('phone', '=', $request->phone)->get()->first();
        $validatedData = $request->validate([
            'report_category' => 'required|integer|gt:0',
            'report_text' => 'max:255|required',
            'hospital' => 'required|integer|gt:0',
            'first_name' => 'max:50|required',
            'last_name' => 'max:50|required',
            'middle_name' => 'max:50|required',
            'phone' => 'required|numeric|digits:10'
        ]);
        if($user){
            $user = $reportUser::find($user->id);
            
            $report = $user->report()->create([
                'report_user_id'=>$user->id,
                'report_category_id' => $request->report_category,
                'text' => $request->report_text,
                'hospital_id' => $request->hospital,
                'status' => 0,
            ]);
            return redirect()->route('report_success')->with('report_id', $report->id);
        }else{
            $user = $reportUser->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'phone' => $request->phone,
            ]);
            $report = $user->report()->create([
                'report_user_id'=>$user->id,
                'report_category_id' => $request->report_category,
                'text' => $request->report_text,
                'hospital_id' => $request->hospital,
                'status' => 0,
            ]);
            return redirect()->route('report_success')->with('report_id', $report->id);
        }
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
     * Shange status report.
     *
     * @param  \App\Models\Report  $report
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_status(Report $report, Request $request){
        $status = $request->status;
        $item = $report->find($request->report_id)->update(['status'=> $status]);
        $data = ['report' => $report->find($request->report_id)];
        return redirect()->route('show_report', ['report_id' => $request->report_id]);
        // return view('page.report_show', $data);
    }

}
