@extends('layouts.master')
@section('title')
    Information
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
      <div class="col-lg-6 col-md-6">
          <div class="card">
              <div class="card-body">

                  <h4 class="card-title d-flex align-items-center justify-content-between">
                       Informasi
                  </h4>
                  <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group mb-2">
                            <label class="form-label" for="judul">Judul</label>
                            <input
                              type="text"
                              class="form-control"
                              id="judul"
                              placeholder="Nama"
                              required
                            />
                          </div>
                          
                          <div class="form-group mb-2">
                            <label class="form-label" for="description">Description</label>
                            <textarea
                              type="text"
                              class="form-control"
                              id="description"
                              placeholder="description"
                              required rows="6"
                            ></textarea>
                          </div>

                          <div class="form-group mb-2">
                            <label class="form-label" for="Tanggal">Tanggal</label>
                            <input
                              type="date"
                              class="form-control date"
                              id="Tanggal"
                              placeholder="Nama"
                              required
                            />
                          </div>

                          <div class="form-group mb-2">
                            <label class="form-label" for="Foto">Foto</label>
                            <input
                              type="file"
                              class="form-control"
                              id="Foto"
                              placeholder="file"
                              required
                            />
                          </div>

                      <div class="mt-4">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          <a href="{{route('information.index')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
                      </div>

                  </form>
              </div>

          </div>
      </div>
  </div>
</div>
@endsection