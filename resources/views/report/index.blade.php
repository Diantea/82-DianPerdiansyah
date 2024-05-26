@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Laporan Harian</h5>
                </div>
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat Magang</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">1543</td>
                                <td class="text-center">Perdi</td>
                                <td class="text-center">SMP 4</td>
                                <td class="text-center">TKJ</td>
                                <td class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-outline-secondary rounded-pill btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <form action="#" method="POST" id="form-delete">
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