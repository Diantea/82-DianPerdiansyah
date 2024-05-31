<?php

namespace App\Http\Controllers;

use Validator;
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

        $params = $request->only(['role', 'name', 'nisn', 'major_id', 'class', 'email', 'phone', 'gender', 'address']);
        $params = collect($params)->merge(['status' => 'active', 'password' => bcrypt($request->password)])->all();
        $user = $this->user->create($params);
        return redirect()->to($previous . '?' . http_build_query(['role' => $user->role]))->with('msg', 'Pengguna berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = $this->user->find($id);
        return view('user.form', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = $this->user->find($id);
        $previous = app('url')->previous();

        // memvalidasi bahwa password dikonfirmasi dengan benar
        $validation = Validator::make($request->all(), [
            'password' => 'confirmed',
            'email' => 'email|unique:users,email,' . $user->id,
        ]);

        // validasi data yang diterima gagal
        if ($validation->fails()) return redirect()->to($previous . '?' . http_build_query(['role' => $request->role]))->withInput($request->all())->withErrors($validation->errors());

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value && $key !== 'password_confirmation') {
                if ($key === 'password') {
                    $params[$key] = bcrypt($value);
                } else if ($key === 'photo' && $request->file('photo')) {
                    $path = 'users/';
                    if ($request->file('photo')) {
                        $filename = 'photo_' . uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
                        $photo = $path . $filename;
                        $request->file('photo')->storeAs('public/users', $filename);
                        $params[$key] = $photo;
                    }
                } else {
                    $params[$key] = $value;
                }
            }
        }
        $user->update($params);

        return redirect()->to($previous . '?' . http_build_query(['role' => $user->role]))->with('msg', 'Pengguna berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return redirect()->back()->with('msg', 'Pengguna berhasil dihapus');
    }

    public function reset_password($id) {
        $item = $this->user->find($id);
        return view('user.reset-password', compact('item'));
    }

    public function profile() {
        $item = auth()->user();
        return view('user.profile', compact('item'));
    }
}
