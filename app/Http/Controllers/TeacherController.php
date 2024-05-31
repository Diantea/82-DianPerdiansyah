<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct(User $user, Company $company) {
        $this->user = $user;
        $this->company = $company;
    }
    
    public function index()
    {
        $teachers = $this->user->orderBy('name', 'asc')->where('role', 'teacher')->get();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show($teacher_id)
    {
        $teacher = $this->user->find($teacher_id);

        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add_student(Request $request, $teacher_id) {
        $teacher = $this->user->find($teacher_id);

        $teacher->students()->attach($request->student_id);

        return redirect()->back()->with('msg', 'Mahasiswa berhasil ditambahkan');
    }
}
