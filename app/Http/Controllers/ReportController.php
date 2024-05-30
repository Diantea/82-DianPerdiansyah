<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyReportRequest;
use App\Models\User;
use App\Models\DailyReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct(DailyReport $dailyReport) {
        $this->dailyReport = $dailyReport;
    }
    
    public function index()
    {
        $students = [];
        $reports = [];

        // cek role
        if (in_array(auth()->user()->role, ['admin'])) {
            $students = User::where('role', 'student')->orderBy('name', 'asc')->get();
        } else if (auth()->user()->role === 'student') {
            $reports = auth()->user()->daily_reports()->orderBy('date', 'desc')->get();
        } else {
            $students = auth()->user()->students()->orderBy('name', 'asc')->get();
        }
        return view ('report.index', compact('students', 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = null;
        return view('report.form', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DailyReportRequest $request)
    {
        $path = 'reports/';
        $photo = null;
        if ($request->file('photo')) {
            // untuk memberi nama file yang akan disimpan setelah diunggah ke server.
            $filename = 'photo_' . uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $photo = $path . $filename;
            $request->file('photo')->storeAs('public/reports', $filename);
        }

        auth()->user()->daily_reports()->create([
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description,
            'photo' => $photo,
        ]);

        return redirect()->back()->with('msg', 'Laporan harian berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show_student($student_id, $report_id)
    {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $report = $student->daily_reports()->find($report_id);

        return view('report.show_student', compact('student', 'report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $item = $this->dailyReport->find($id);
        return view('report.form', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DailyReportRequest $request, $id)
    {
        $report = $this->dailyReport->find($id);

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
            }
        }
        $report->update($params);

        return redirect()->back()->with('msg', 'Laporan harian berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyReport $report)
    {
        $report->delete();
        return redirect()->back()->with('msg', 'Laporah harian berhasil dihapus');
    }

    public function index_student($student_id) {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $reports = $student->daily_reports()->orderBy('start', 'desc')->get();

        return view('report.index_student', compact('student', 'reports'));
    }

}
