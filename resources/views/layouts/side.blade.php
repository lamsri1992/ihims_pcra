<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center" href="#">
            <img src="{{ asset('img/logo_ihims.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <br>
            <div style="margin-top:0.5rem;">
                <small class="ms-1 font-weight-bold">Primary Care Refer & Appointment</small>
            </div>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-gauge-high text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('appointment*')) ? 'active' : '' }}" href="{{ url('appointment') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-ambulance text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">นัดหมายส่งต่อผู้ป่วย</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('hospital*')) ? 'active' : '' }}" href="{{ url('hospital') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-cog text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ตั้งค่าหน่วยบริการ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('report*')) ? 'active' : '' }}" href="{{ url('report') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-print text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ระบบรายงานข้อมูล</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
