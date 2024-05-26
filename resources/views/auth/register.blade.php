
<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}"
    data-template="vertical-menu-template-no-customizer"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>REGISTRATION</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo_smea.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
<!-- Content -->

<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">

            <!-- Login -->
            <div class="card p-2">
                <div class="card-body mt-2">
                    <h5 class="text-center mb-2">Selamat datang di Aplikasi PKL! 👋</h5>
                    <p class="text-center mb-4">Silakan Daftarkan Akun Anda</p>

                    @if($errors->any())
                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    </div>
                @endif

                <form id="formAuthentication" class="mb-3" action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Masukan nama"
                            value="{{ old('name') }}"
                        />
                    </div> 
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nisn"
                            name="nisn"
                            placeholder="Masukan NISN"
                            value="{{ old('nisn') }}"
                        />
                    </div> 
                    <div class="mb-3">
                        <label for="class" class="form-label">kelas</label>
                        <input
                            type="text"
                            class="form-control"
                            id="class"
                            name="class"
                            placeholder="Masukan class"
                            value="{{ old('class') }}"
                        />
                    </div> 
                    <div class="mb-3">
                        <label for="major_id" class="form-label">Jurusan</label>
                        <select name="major_id" id="major_id" class="form-control">
                            @foreach(\App\Models\Major::all() as $major)
                            <option value="{{ $major->id }}" {{ old('major_id') === $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Telepon</label>
                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            name="phone"
                            placeholder="Masukan No Telepon"
                            value="{{ old('phone') }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <div class="form-group">
                            <input type="radio" name="gender" value="Male" id="male" {{ old('gender') === 'Male' ? 'checked' : '' }}> <label for="male">Male</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="gender" value="Female" id="female" {{ old('gender') === 'Female' ? 'checked' : '' }}> <label for="female">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" class="form-control" cols="4" rows="4">{{ old('address') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Masukan alamat email"
                            autofocus
                            value="{{ old('email') }}"
                        />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Kata sandi</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                            />
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password_confirmation">Ulangi Kata sandi</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password_confirmation"
                                class="form-control"
                                name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                            />
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Daftar</button>
                </form>

                <p class="text-center">
                    <span>Sudah punya akun?</span>
                    <a href="{{ route('login') }}">
                        <span>Masuk</span>
                    </a>
                </p>
                
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
</div>



<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/pages-auth.js') }}"></script>
</body>
</html>
