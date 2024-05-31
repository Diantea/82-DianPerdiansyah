@extends('layouts.master')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        @if (auth()->user()->role === 'admin')    
            <div class="card mb-1">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">Overview</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        @foreach(\App\Models\Major::all() as $i => $major)
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#major-{{ $i }}" style="cursor: pointer;">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-{{ $major->icon }} ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $major->students->count() }}</h5>
                                        <small>{{ $major->name }}</small>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="modal fade"
                                id="major-{{ $i }}"
                                aria-labelledby="modalToggleLabel"
                                tabindex="-1"
                                style="display: none"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalToggleLabel">Siswa {{ $major->name }}</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="datatables-basic table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama</th>
                                                    <th class="text-center">NISN</th>
                                                    <th class="text-center">Kelas</th>
                                                    <th class="text-center">Jurusan</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($major->students as $i => $student)
                                                    <tr>
                                                        <td class="text-center">{{ $i + 1 }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td class="text-center">{{ $student->nisn }}</td>
                                                        <td class="text-center">{{ $student->class }}</td>
                                                        <td class="text-center"><i class="ti ti-{{ $student->major->icon }} me-1"></i> {{ $student->major->name }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#teacher-modal" style="cursor: pointer">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="ti ti-user-check ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ \App\Models\User::where('role', 'teacher')->count() }}</h5>
                                    <small>Guru Pembimbing</small>
                                </div>
                            </div>
                        </div>

                            <div
                                class="modal fade"
                                id="teacher-modal"
                                aria-labelledby="modalToggleLabel"
                                tabindex="-1"
                                style="display: none"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalToggleLabel">Guru Pembimbing</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="datatables-basic table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>No. Telepon</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(\App\Models\User::where('role', 'teacher')->orderBy('name', 'asc')->get() as $i => $teacher)
                                                        <tr>
                                                            <td class="text-center">{{ $i + 1 }}</td>
                                                            <td>{{ $teacher->name }}</td></td>
                                                            <td>{{ $teacher->email }}</td>
                                                            <td>{{ $teacher->phone }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h4 class="card-title mb-0">Halo, {{auth()->user()->name}}</h4>
                            <p class="mb-3">Selamat datang di Aplikasi PKL 🎉</p>
                            
                            @if (auth()->user()->role === 'student')
                                <a href="{{ route('report.create') }}" class="btn btn-primary waves-effect waves-light">Buat Laporan Harian</a>
                            @else
                                <a href="{{ route('report.index') }}" class="btn btn-primary waves-effect waves-light">Lihat Laporan</a>
                            @endif
                        
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            {{-- <img src="" height="140" alt="view sales"> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="card mt-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">Informasi</h5>
                @if (auth()->user()->role === 'admin')    
                    <div>
                        <a href="{{ route('information.create') }}" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Judul</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($informations as $i => $information)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td>{{ $information->title }}</td>
                                    <td class="text-center">{{ $information->date_display }}</td>
                                    <td class="d-flex justify-content-center">
                                        <span data-bs-toggle="modal" data-bs-target="#information-{{ $i }}">
                                            <button type="button" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                                <i class="ti ti-eye"></i>
                                            </button>
                                        </span>
                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('information.edit', $information) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="" data-target="#btn-delete-{{ $information->id }}" class="btn-post btn btn-outline-secondary btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                            <form id="btn-delete-{{ $information->id }}" action="{{ route('information.destroy', $information) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach($informations as $i => $information)
            <div
                class="modal fade"
                id="information-{{ $i }}"
                aria-labelledby="modalToggleLabel"
                tabindex="-1"
                style="display: none"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalToggleLabel">{{ $information->title }}</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            @if($information->photo)
                                <img src="{{ $information->photo_url }}" alt="information" class="w-100 mb-3">
                            @endif
                            <div class="text-muted mb-2"><small>{{ $information->date_display }}</small></div>
                            {{ $information->description }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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