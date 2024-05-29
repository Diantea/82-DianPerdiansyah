<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct(User $user)
    {
        $this->user = $user;
        // Menerapkan middleware adminke semua metode dalam controller, kecuali metode update dan profile
        $this->middleware('admin')->except(['update', 'profile']);
    }

    public function index()
    {
        $data = [];
        // mengambil semua data pengguna
        $data['all'] = $this->user->orderBy('role', 'asc')->orderBy('name', 'asc')->get();$data['admins'] = $this->user->where('role', 'admin')->orderBy('name', 'asc')->get();
        $data['teachers'] = $this->user->where('role', 'teacher')->orderBy('name', 'asc')->get();
        $data['students'] = $this->user->where('role', 'student')->orderBy('name', 'asc')->get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = null;
        return view('user.form', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mendapatkan URL halaman sebelumnya
        $previous = app('url')->previous();

        // validasi data
        $validation = \Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required',
            'gender' => 'required',
        ]);

        // validasi data yang diterima gagal
        if ($validation->fails()) return redirect()->to($previous . '?' . http_build_query(['role' => $request->role]))->withInput($request->all())->withErrors($validation->errors());

        $params = $request->only(['role', 'name', 'nisn', 'major_id', 'semester', 'email', 'phone', 'gender', 'address']);
        $params = collect($params)->merge(['status' => 'active', 'password' => bcrypt($request->password)])->all();
        $user = $this->user->create($params);
        return redirect()->to($previous . '?' . http_build_query(['role' => $user->role]))->with('msg', 'Pengguna berhasil dibuat');
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
}
