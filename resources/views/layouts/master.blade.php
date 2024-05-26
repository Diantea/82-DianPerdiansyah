<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}"
    data-template="vertical-menu-template-no-customizer-starter"
>
  <head>
      <meta charset="utf-8" />
      <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
      />

      {{-- <title>@yield('title') - {{ config('app.name') }}</title> --}}
      <title>@yield('title')</title>

      <meta name="description" content="" />

      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="https://smkn1subang.sch.id/wp-content/uploads/2022/06/favicon.png" />

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
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

      <!-- Page CSS -->
      @yield('css')

      <!-- Helpers -->
      <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
      <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
            @include('layouts.menu')
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            @include('layouts.navbar')
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">

                @yield('content')
            <!-- / Content -->
            
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                  <div
                      class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                  >
                      <div>
                          ©
                          <script>
                              document.write(new Date().getFullYear());
                          </script>
                          , made with ❤️ by Dian
                      </div>
                  </div>
                </div>
            </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
  </div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
  $('.selectpicker').selectpicker();
  @if(session('msg'))
  Swal.fire({
    text: '{{ session('msg') }}',
    icon: 'success',
    customClass: {
        confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
  @endif

  $('.btn-post').click(function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Apakah kamu yakin?',
        icon: 'warning',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-label-danger ms-3',
        },
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: 'Ya, saya yakin',
        cancelButtonText: 'Batalkan',
    }).then(result => {
        if(result.isConfirmed) {
            const target = $(this).data('target')
            $(target).submit()
        }
    });
  })
</script>

<!-- Page JS -->
@yield('js')

</body>
</html>
