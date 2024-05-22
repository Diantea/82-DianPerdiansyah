@extends('layouts.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="card">
              <div class="card-body">

                  <h4 class="card-title d-flex align-items-center justify-content-between">
                       Tempat Magang
                  </h4>
                  <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group mb-2">
                            <label class="form-label" for="judul">Nama Internship</label>
                            <input
                              type="text"
                              class="form-control"
                              id="judul"
                              placeholder="Nama"
                              required
                            />
                          </div>

                          <div class="form-group mb-2">
                            <label class="form-label" for="judul">Max DIterima</label>
                            <input
                              type="text"
                              class="form-control"
                              id="judul"
                              placeholder="12"
                              required
                            />
                          </div>

                          <div class="form-group mb-2">
                            <label class="form-label" for="description">Alamat</label>
                            <textarea
                              type="text"
                              class="form-control"
                              id="description"
                              placeholder="Alamat"
                              required rows="6"
                            ></textarea>
                          </div>
                          
                      <div class="mt-4">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          <a href="{{ route('internship.index') }}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
                      </div>

                  </form>
              </div>

          </div>
      </div>
  </div>
</div>
@endsection