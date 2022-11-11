<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    {{-- select2 bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    {{-- end select2 --}}
    @vite('resources/js/app.js')
    {{-- icon --}}
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">SIMMEI</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="row g-0 px-2 rounded rounded-3">
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Yakin ingin keluar ?')">Logout</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu Konsumen</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDataMaster" aria-expanded="false"
                            aria-controls="collapseDataMaster">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataMaster" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('konsumen.index') }}">Data Konsumen</a>
                                <a class="nav-link" href="{{ route('product.index') }}">Data Produk & Jasa</a>
                                <a class="nav-link" href="{{ route('relationship.index') }}">Data Relationship</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Menu Marketing</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDataMarketing" aria-expanded="false"
                            aria-controls="collapseDataMarketing">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Marketing
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataMarketing" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('mapping.index') }}">Mapping</a>
                                <a class="nav-link" href="{{ route('penetrasi.index') }}">Penetrasi</a>
                                <a class="nav-link" href="{{ route('plantest.index') }}">Plan Test</a>
                                <a class="nav-link" href="{{ route('nego.index') }}">Quatation</a>
                                <a class="nav-link" href="{{ route('deals.index') }}">Deals</a>
                                <a class="nav-link" href="{{ route('supply.index') }}">Supply</a>
                                <a class="nav-link" href="{{ route('kunjunganmarketing.index') }}">Kunjungan</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('introduction.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Introduction
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu Teknisi</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDataTeknisi" aria-expanded="false"
                            aria-controls="collapseDataTeknisi">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Teknisi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataTeknisi" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('jartest.index') }}">Jar Tes</a>
                                <a class="nav-link" href="{{ route('presentasi.index') }}">Presentasi</a>
                                <a class="nav-link" href="{{ route('kunjunganteknisi.index') }}">Kunjungan
                                    Teknisi</a>
                                <a class="nav-link" href="{{ route('kondisi.index') }}">Kondisi</a>
                            </nav>
                        </div>
                        @role('super_admin|admin')
                            <div class="sb-sidenav-menu-heading">Menu User</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseUserBackend" aria-expanded="false"
                                aria-controls="collapseUserBackend">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUserBackend" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('role.index') }}">Role</a>
                                    <a class="nav-link" href="{{ route('permission.index') }}">Permission</a>
                                    <a class="nav-link" href="{{ route('user.index') }}">User</a>
                                </nav>
                            </div>
                        @endrole
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('container')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; PT Mito Energi Indonesia 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @stack('script')
    <!-- DataTables -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js">
    </script>
    <!-- End DataTables -->


    {{-- select2  --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- end select2 --}}

    {{-- icon --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- end icon --}}
    @stack('ss_script')
    @stack('multiple-select')
</body>

</html>
