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

        if($user){
            $user = $reportUser::find($user->id);

            $user->report()->create([
                'report_user_id'=>$user->id,
                'report_category_id' => $request->report_category,
                'text' => $request->report_text,
                'hospital_id' => $request->hospital,
                'status' => 0,
            ]);
            return redirect()->route('report_index');
        }else{
            $user = $reportUser->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'phone' => $request->phone,
            ]);
            $user->report()->create([
                'report_user_id'=>$user->id,
                'report_category_id' => $request->report_category,
                'text' => $request->report_text,
                'hospital_id' => $request->hospital,
                'status' => 0,
            ]);
            return redirect()->route('report_index');
        }


        $data = [
            // 'first_name' => $request->first_name,
            // 'last_name' => $request->last_name,
            // 'middle_name' => $request->middle_name,
            // 'phone' => $request->phone,
            // 'report_category' => $request->report_category,
            // 'report_text' => $request->report_text,
            // 'hospital' => $request->hospital,
            'user' => $user->id
        ];

        //$reportUser->where('phone', '=', $request->phone)->first();

        // $user = $reportUser::find(1);

        // $user->report()->create([
        //     'first_name' => $request->first_name,
        //     // 'last_name' => $request->last_name,
        //     // 'middle_name' => $request->middle_name,
        //     // 'phone' => $request->phone,
        //     'report_category_id' => $request->report_category,
        //     'text' => $request->report_text,
        //     'hospital_id' => $request->hospital,
        //     'status' => 0,
        // ]);

        //$report->insert();
        return view('welcome', $data);
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

    // public function swow_form(ReportCategory $reportCategory, Hospital $hospital){

    //     $data = [
    //         'report_categories' => $reportCategory->latest()->get(),
    //         'hospitals' => $hospital->latest()->get(),
    //     ];
    //     return view('page.report_form', $data);
    // }
}
