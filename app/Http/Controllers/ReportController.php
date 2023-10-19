<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Controllers\Controller;
use Faker\Core\Number;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($schedule_id)
    {

        $report = Report::where('schedule_id', $schedule_id)->first();
        return view('dashboard.report.index', compact('report'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $report_id)
    {
         $report =  Report::find($report_id);

         if(!$report){
            return back()->with('error', 'Relatório nao pode ser encontrado');
        }

        $report->report = $request->report;

        if(!$report->save()){
            return back()->with('error', 'Relatório nao pode ser atualizado');
         }

         return back()->with('success', 'Atualizado com sucesso');
        //  return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
