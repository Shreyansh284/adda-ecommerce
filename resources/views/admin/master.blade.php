<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adda Jaipur</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/admin/assets/img/favicon.png" rel="icon">
    <link href="/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/admin/assets/css/style.css" rel="stylesheet">
    /
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ URL::to('/') }}/admin/dashboard" class="logo d-flex align-items-center">
                <img src="/admin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Adda Jaipur</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="/admin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center"><i
                                        class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span></button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed " href="{{ URL::to('/') }}/admin/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ URL::to('/') }}/admin/users">
                    <i class="ri-group-line"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-terminal-window-line"></i><span>Products</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ URL::to('/') }}/admin/products">
                            <i class="bi bi-circle"></i><span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/categories">
                            <i class="bi bi-circle"></i><span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/subCategories">
                            <i class="bi bi-circle"></i><span>Sub Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/sizes">
                            <i class="bi bi-circle"></i><span>Sizes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/colors">
                            <i class="bi bi-circle"></i><span>Colors</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#place-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-road-map-line"></i><span>Place</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="place-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ URL::to('/') }}/admin/states">
                            <i class="bi bi-circle"></i><span>State</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/cities">
                            <i class="bi bi-circle"></i><span>City</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ URL::to('/') }}/admin/orders">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span>Orders</span></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ URL::to('/') }}/admin/payments">
                    <i class="ri-bank-card-line"></i>
                    <span>Payments</span></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ URL::to('/') }}/admin/ratings">
                    <i class="ri-feedback-line"></i>
                    <span>Ratings</span></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#dynamic-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="ri-road-map-line"></i><span>Dynamic Pages</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="dynamic-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ URL::to('/') }}/admin/aboutUs">
                            <i class="bi bi-circle"></i><span>About Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/contactUs">
                            <i class="bi bi-circle"></i><span>Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/admin/slider">
                            <i class="bi bi-circle"></i><span>Slider</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Adda Jaipur</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">Adda Jaipur</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/admin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/admin/assets/vendor/quill/quill.js"></script>
    <script src="/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/admin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/admin/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @yield('script')
</body>

</html>
