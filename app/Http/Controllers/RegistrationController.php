<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $students_active = $this->user->where('role', 'student')->where('status', 'active')->orderBy('created_at', 'asc')->get();
        $students_inactive = $this->user->where('role', 'student')->where('status', 'inactive')->orderBy('updated_at', 'desc')->get();

        return view('registration.index', compact('students_active', 'students_inactive'));
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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $student_id)
    {
        $student = $this->user->find($student_id);

        $msg = '';
        $data = [];

        foreach($request->all() as $key => $value) {
            if($value) {
                $data[$key] = $value;
            }
            if($key === 'status' && $value === 'active') {
                $msg = 'Akun Berhasil diaktifkan';
            }else if ( $key === 'status' && $value === 'inactive') {
                $msg = 'Akun Berhasil dinonaktifkan';
            }
        }

        $student->update($data);
        return redirect()->back()->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
