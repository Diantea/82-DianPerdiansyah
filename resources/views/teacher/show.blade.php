@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">List Siswa</h5>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#add-student-modal" class="btn btn-primary"><i class="ti ti-user me-1"></i> Tambah Siswa</button>
                </div>
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Jurusan</th>
                            <th>Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>TKJ</td>
                                <td>Dian</td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-outline-danger rounded-pill btn-post btn-icon" data-target="#form-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove">
                                        <i class="ti ti-user-minus"></i>
                                    </button>
                                    <form action="#" method="POST" id="form-delete">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="add-student-modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="#" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Tambahkan Mahasiswa</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="student_id" class="form-label">Jurusan</label>
                                            <input type="text" class="form-control" value="" disabled>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="student_id" class="form-label">Siswa</label>
                                            <select name="student_id" id="student_id" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                                    <option value="">
                                                        Juju
                                                    </option>
                                                    <option value="">
                                                        Ilham
                                                    </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Batalkan
                                    </button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection