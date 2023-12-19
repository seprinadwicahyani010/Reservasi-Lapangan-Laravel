<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BencoolenBadminton</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" {{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}} " rel="stylesheet">
    <link href=" {{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}} " rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{ asset('admin/css/bootstrap.min.css')}} " rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href=" {{ asset('admin/css/style.css')}} " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/home" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-primary"><i>Bencoolen</i></h4>
                    <h4 class="text-primary" style="margin-left: 50px"><i>Badminton</i></h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <div class="avatar" style="height: 50px; width:50px;">
                            <span> {{ generateInitials(auth()->user()->name) }}</span>
                        </div>
                        <div ></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                @php
                $currentPath = Request::path();
                @endphp
                <div class="navbar-nav w-100">
                    <a href="/dashboard_admin" class="nav-item nav-link {{ ($currentPath == 'dashboard_admin') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a href="/lapangan" class="nav-item nav-link {{ ($currentPath == 'lapangan') ? 'active' : '' }}">
                        <i class="fas fa-table me-2"></i>Lapangan
                    </a>
                    <a href="/pelatih" class="nav-item nav-link {{ ($currentPath == 'pelatih') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Pelatih
                    </a>
                    <a href="/admin/member" class="nav-item nav-link {{ ($currentPath == 'admin/member') ? 'active' : '' }}">
                        <i class="fas fa-users me-2"></i>Member
                    </a>
                    <a href="/admin/kursus" class="nav-item nav-link {{ ($currentPath == 'admin/kursus') ? 'active' : '' }}">
                        <i class="fas fa-book me-2"></i>Kursus
                    </a>
                    <a href="/admin/pemesanan" class="nav-item nav-link {{ ($currentPath == 'admin/pemesanan') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check me-2"></i>Reservasi
                    </a>
                    <a href="/panduan" class="nav-item nav-link {{ ($currentPath == 'panduan') ? 'active' : '' }}">
                        <i class="fas fa-question-circle me-2"></i>Panduan
                    </a>
                </div>                
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    @auth
                        <div class="avatar" style="height: 30px; width:30px; font-size: 15px;">
                            <span> {{ generateInitials(auth()->user()->name) }}</span>
                        </div>
                        <li class="nav-item dropdown p-1" id="userDropdown">
                            <a class="nav-link dropdown-toggle m-0" href="#" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                </div>
            </nav>
            <!-- Navbar End -->
            
            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">BencoolenBadminton</a>, All Right Reserved.
                        </div>
                    </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
        document.getElementById('userDropdown').addEventListener('click', function () {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
            const isExpanded = dropdown.classList.contains('show');
            dropdown.querySelector('.nav-link').setAttribute('aria-expanded', isExpanded);
            dropdown.querySelector('.dropdown-menu').classList.toggle('show', isExpanded);
        });
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src=" {{ asset('admin/lib/chart/chart.min.js')}} "></script>
    <script src=" {{ asset('admin/lib/easing/easing.min.js')}} "></script>
    <script src=" {{ asset('admin/lib/waypoints/waypoints.min.js')}} "></script>
    <script src=" {{ asset('admin/lib/owlcarousel/owl.carousel.min.js')}} "></script>
    <script src=" {{ asset('admin/lib/tempusdominus/js/moment.min.js')}} "></script>
    <script src=" {{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js')}} "></script>
    <script src=" {{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}} "></script>


    <!-- Template Javascript -->
    <script src=" {{ asset('admin/js/main.js')}} "></script>
</body>

</html>
