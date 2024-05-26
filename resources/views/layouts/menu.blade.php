<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img width="28" height="32" viewBox="0 0 32 22" fill="none" src="https://smkn1subang.sch.id/wp-content/uploads/2022/06/favicon.png" alt="">
          
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Laporan PKL</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Apps & Pages -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu Utama</span>
      </li>
      <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'information' ? 'active' : '' }}">
        <a href="{{route('information.index')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-home"></i>
          <div data-i18n="Page 1">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'registration' ? 'active' : '' }}">
        <a href="{{ route('registration.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-id"></i>
            <div data-i18n="Page 1">Pendaftaran</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-building-community"></i>
            <div data-i18n="Page 1">Tempat Magang</div>
        </a>
        <ul class="menu-sub ">
            <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'internship' && explode('.', request()->route()->getName())[1] !== 'index_submission' ? 'active' : '' }}">
                <a href="{{ route('internship.index') }}" class="menu-link">
                    <div data-i18n="Roles">Tempat Magang</div>
                </a>
            </li>
            <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'internship' && explode('.', request()->route()->getName())[1] == 'index_submission' ? 'active' : '' }}">
                <a href="{{ route('internship.index_submission') }}" class="menu-link">
                    <div data-i18n="Permission">Pengajuan Magang</div>
                </a>
            </li>
        </ul>
    </li>
      <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'teacher' ? 'active' : '' }}">
        <a href="{{ route('teacher.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-building-community"></i>
          <div data-i18n="Page 1">Guru Pembimbing</div>
        </a>
      </li>
      <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'report' ? 'active' : '' }}">
        <a href="" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-clipboard-text"></i>
            <div data-i18n="Page 1">Laporan</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'report' ? 'active open' : '' }}">
                <a href="{{ route('report.index') }}" class="menu-link">
                    <div data-i18n="Roles">Laporan Harian</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="{{ route('report.index') }}" class="menu-link">
                    <div data-i18n="Permission">Laporan Akhir</div>
                </a>
            </li>
        </ul>
    </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pengguna</span>
      </li>
      <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'user' ? 'active open' : '' }}">
        <a href="{{ route('user.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Page 1">Pengguna</div>
        </a>
    </ul>
  </aside>