<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Multimedia Studio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Day - v4.7.0
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
                <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
            </div>
            <div class="social-links d-none d-md-block">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="HomePage.php">
                <img src="assets/img/LOGO LAB PTIK.png" width="200" height="80" class="d-inline-block align-top" alt="">
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/#about">About Us</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Laboratorium</a></li>
                    <?php
                    if (session()->get('loggedIn')) : ?>
                        <li><a class="nav-link scrollto" href="#peminjaman">Reservasi</a></li>
                    <?php endif; ?>
                    <li><a class="nav-link scrollto active" href="/#portfolio">Fasilitas</a></li>
                    <li><a class="nav-link scrollto" href="/#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <?php if (session()->get('loggedIn')) : ?>
                                    <img src="/assets/img/<?= session()->get('avatar') ?>" class="rounded-circle" height="40" width="40" alt=" Black and White Portrait of a Man" loading="lazy" />
                                <?php endif; ?>
                                <?php if (!session()->get('loggedIn')) : ?>
                                    <img src="/assets/img/avatar.jpg" class="rounded-circle" height="40" width="40" alt=" Black and White Portrait of a Man" loading="lazy" />
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <?php
                                if (session()->get('loggedIn')) : ?>
                                    <li><a class="dropdown-item" href="user">My Profile</a></li>
                                    <li><a class="dropdown-item" href="keluar">Log Out</a></li>

                                <?php
                                elseif (!session()->get('loggedIn')) : ?>
                                    <li><a class="dropdown-item" href="register">Sign Up</a></li>
                                    <li><a class="dropdown-item" href="masuk">Login</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Multimedia Studio</li>
                </ol>
                <h2>Multimedia Studio</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="assets/img/foto/multimedia-1.jpg" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/img/foto/multimedia-2.jpg" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/img/foto/multimedia-3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/fasilitas/kamera.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/fasilitas/LCD.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/fasilitas/microphone.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/fasilitas/hdmi.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Fasilitas Lab</h3>
                            <ul>
                                <li>PC</li>
                                <li>Keyboard</li>
                                <li>Mouse</li>
                                <li>Headphone</li>
                                <li>Kabel VGA</li>
                                <li>LCD Proyektor</li>
                                <li>Kamera</li>
                                <li>Microphone</li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Multimedia Studio</h2>
                            <p>
                                In this laboratory, you can use various existing facilities to assist you in matters related to multimedia, make it easier for you to make animations, take pictures, and carry out the editing process and others.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>LAB PTIK</h3>
                            <p>
                                Laboratorium <br>
                                Jl. A. Yani No.200, Dusun II, Pabelan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57161<br><br>
                                <strong>Phone:</strong> +62 8571 3697 297<br>
                                <strong>Email:</strong> PTIK.uns21@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="https://www.facebook.com/assuada99" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/salik_jpr21/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="https://www.linkedin.com/in/salik-manahijassu-ada-417113229/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#service">Laboratorium</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#peminjaman">Jadwal Reservasi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Fasilitas</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Day</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>