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
                            <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                <i class="ti ti-building-community ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">2</h5>
                                <small>Pengajuan Magang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Pengajuan Magang
                </h5>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Siswa</th>
                        <th>Tipe</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Dokumen MoU</th>
                        <th class="text-center">Signed MoU</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>CV. Berkah</td>
                            <td>Efull</td>
                            <td>Penaftaran</td>
                            <td class="text-center">Pending</td>
                            <td class="text-center">
                                    -
                            </td>
                            <td class="text-center">
                                    -
                            </td>
                            <td class="text-center">12/02/2024</td>
                            <td class="d-flex justify-content-center">
                                    </span>
                                    <a href="" data-target="#form-accept" class="btn-post btn btn-outline-success btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Terima">
                                        <i class="ti ti-checks"></i>
                                    </a>
                                    <form action="#" method="POST" id="form-accept">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="accepted">
                                    </form>

                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Batalkan">
                                    <a href="" data-target="#form-reject" class="btn-post btn btn-outline-secondary btn-icon rounded-pill">
                                        <i class="ti ti-x"></i>
                                    </a>
                                </div>

                                <form action="" method="POST" id="form-reject">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="rejected">
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