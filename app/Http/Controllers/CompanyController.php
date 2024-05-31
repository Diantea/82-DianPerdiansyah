<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct(User $user, Company $company) {
        $this->user = $user;
        $this->company = $company;
    }

    public function index_submission()
    {
        $item = null;
        $companies_active = $this->company->orderBy('name', 'asc')->where('status', 'active')->get();
        $companies_inactive = $this->company->orderBy('name', 'asc')->where('status', 'inactive')->get();

        return view('internship.index_submission', compact('companies_active', 'companies_inactive', 'item'));
    }

    public function index()
    {
        $item = null;
        $companies_active = $this->company->orderBy('name', 'asc')->where('status', 'active')->get();
        $companies_inactive = $this->company->orderBy('name', 'asc')->where('status', 'inactive')->get();

        return view('internship.index', compact('companies_active', 'companies_inactive', 'item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = null;
        return view('internship.form', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        //untuk menyimpan atau mengakses ke compeny-dokument
        $path = 'company-documents/';

        $file = 'file_1';
        $filePath1 = $this->extracted($request, $file, $path);

        $file = 'file_2';
        $filePath2 = $this->extracted($request, $file, $path);

        $this->company->create([
            'name' => $request->name,
            'address' => $request->address,
            'max' => $request->max,
            'status' => 'active',
            'file_1' => $filePath1,
            'file_2' => $filePath2,

        ]);

        return redirect()->back()->with('msg', 'Tempat magang berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('internship.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = $this->company->find($id);
        return view('internship.form', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = $this->company->find($id);
        $path = 'company-documents/';

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
             }

            if ($key === 'file_1' || $key === 'file_2') {
                $params[$key] = $this->extracted($request, $key, $path);
            }
        }
        $company->update($params);

        return redirect()->back()->with('msg', 'Tempat magang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company) {
        $company->delete();
        return redirect()->back()->with('msg', 'Tempate magang berhasil dihapus');
    }

    public function register_company(Request $request) {

        $company = $this->company->find($request->company_id);

        $company->internships()->create([
            'student_id' => auth()->user()->id,
            'status' => 'pending',
            'type' => 'apply',
        ]);

        return redirect()->route('company.index_submission')->with('msg', 'Berhasil daftar');
    }

    public function request_company(Request $request) {
        $company = $this->company->create([
            'name' => $request->name,
            'address' => $request->address,
            'status' => 'inactive',
        ]);

        $company->internships()->create([
            'student_id' => auth()->user()->id,
            'status' => 'pending',
            'type' => 'register',
        ]);

        return redirect()->route('company.index_submission')->with('msg', 'Tempat magang berhsil diajukan');
    }

    public function extracted(Request $request, string $file, string $path): string
    {
        $filePath = '';
        if ($request->file($file)) {
            $filename = 'file_' . uniqid() . '.' . $request->file($file)->getClientOriginalExtension();
            $filePath = $path . $filename;
            $request->file($file)->storeAs('public/company-documents', $filename);
        }
        return $filePath;
    }
}
