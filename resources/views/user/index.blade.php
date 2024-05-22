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
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">3</h5>
                                <small>Administrator</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">1</h5>
                                <small>Kaprodi</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">5</h5>
                                <small>Guru Pembimbing</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">8</h5>
                                <small>Siswa</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <a href="" class="btn btn-primary rounded-pill me-2">Semua</a>
                    <a href="" class="btn btn-primary rounded-pill me-2">Administrator</a>
                    <a href="" class="btn btn-primary rounded-pill me-2">Kaprodi</a>
                    <a href="" class="btn btn-primary rounded-pill me-2">Guru Pembimbing</a>
                    <a href="" class="btn btn-primary rounded-pill me-2">Siswa</a>
                </div>
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        <i class="ti ti-user-plus me-2"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>dian</td>
                            <td>dian@gmail.com</td>
                            <td class="text-center text-capitalize">admin</td>
                            <td class="d-flex justify-content-center">
                                <a href="" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password">
                                    <i class="ti ti-lock"></i>
                                </a>
                                <a href="" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="" class="btn btn-outline-secondary btn-post btn-icon rounded-pill" data-target="#form-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                    <i class="ti ti-user-minus"></i>
                                </a>
                                <form action="" method="POST" id="form-delete">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
@endsection

@section('js')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $('.datatables-basic').DataTable()
    </script>
@endsection