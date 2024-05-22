@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">Overview</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-building-community ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">12</h5>
                                <small>Tempat Magang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">
                    Tempat Magang
                </h5>
                <div>
                    <a href="#" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th> 
                        <th>Nama Perusahaan</th>
                        <th class="text-center">Maksimal</th>
                        <th class="text-center">Diterima</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>SMP 4</td>
                            <td class="text-center">10</td>
                            <td class="text-center">2 </td>
                                
                            <td class="d-flex justify-content-center">
                                <a href="#" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="" data-target="#btn-delete" class="btn-post btn btn-outline-secondary btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                    <i class="ti ti-trash"></i>
                                </a>
                                    <form action="#" method="POST" id="form-register">
                                        <input type="hidden" name="company_id" value="">
                                    </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection