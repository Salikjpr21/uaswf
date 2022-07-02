<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LAB PTIK</title>
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
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">PTIK.uns21@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +62 8571 3697 297
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/assuada99" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/salik_jpr21/?hl=en" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/salik-manahijassu-ada-417113229/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- Uncomment below if you prefer to use an image logo -->

      <a class="navbar-brand" href="HomePage.php">
        <img src="assets/img/LOGO LAB PTIK.png" width="200" height="80" class="d-inline-block align-top" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Laboratorium</a></li>

          <?php
          if (session()->get('loggedIn')) : ?>
            <li><a class="nav-link scrollto" href="#peminjaman">Reservasi</a></li>
          <?php endif; ?>

          <li><a class="nav-link scrollto " href="#portfolio">Fasilitas</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
            <div class="dropdown">
              <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <?php if (session()->get('loggedIn')) : ?>
                  <img src="/assets/img/<?= session()->get('avatar') ?>" class="rounded-circle" height="40" width="40" alt="Profile Picture" loading="lazy" />
                <?php endif; ?>
                <?php if (!session()->get('loggedIn')) : ?>
                  <img src="/assets/img/avatar.jpg" class="rounded-circle" height="40" width="40" alt="Profile Picture" loading="lazy" />
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
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Hello, Welcome to LAB PTIK</h1>
      <h2>Here we provide reservation for borrow laboratorium</h2>
      <a href="#about" class="btn-get-started scrollto">GET STARTED</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="/assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>ABOUT US</h3>
            <p class="fst-italic">
              All About Laboratory is a group of qualified program,whose constant endeavour is to provide a wide range of diagnostic services, which are reliable, time-efficient,
              cost- effective, patient-friendly and easily accessible around the clock.
              We aim to achieve this through superior testing technology, robust quality control measures and a diligent work force. :
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> software engineering.</li>
              <li><i class="bi bi-check-circle"></i> multimedia studio.</li>
              <li><i class="bi bi-check-circle"></i> computer network and instrumentation.</li>
            </ul>
            <p>
              We envision our laboratory as the largest sustainable technology-based platform to deliver value solutions and skill enhancement to the IT Industry.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="row d-flex align-items-center">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section> <!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Services</span>
          <h2>Laboratorium</h2>
          <p>The following are the types of labs available</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="/lab1">software engineering</a></h4>
              <p>this is where you can build systems by coding</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="150">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="/lab2">multimedia studio</a></h4>
              <p>is a lab where you can develop your creativity in multimedia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><a href="/lab3"></a><i class="bx bx-tachometer"></i></div>
              <h4><a href="/lab3">computer network and instrumentation</a></h4>
              <p>network lab is a place where you can learn to set up a network</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Services Section ======= -->

    <!-- Showcase -->
    <section id="peminjaman" class="peminjaman">
      <div class="container">
        <?php
        if (session()->get('loggedIn')) : ?>
          <div class="section-title">
            <span>peminjaman</span>
            <h2>Reservasi</h2>
            <p>This is where you can order lab</p>
          </div>
          <!-- Container -->
          <div class="container" style="margin-top:3%; margin-bottom:3%;">



          </div><!-- / Container -->
        <?php endif; ?>
    </section><!-- / Showcase -->


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Call To Admin</h3>
          <p> if you want to order a lab, klik the button below.</p>
          <a class="cta-btn" href="https://wa.me/6285713697297?text=Saya%20ingin%20memesan%20Lab">Call To Reserve</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Fasilitas</span>
          <h2>Fasilitas</h2>
          <p>The following are some of the facilities available in each lab</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">software engineering</li>
              <li data-filter=".filter-card">multimedia studio</li>
              <li data-filter=".filter-web">computer network and instrumentation</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/foto/foto-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Monitor</h4>
              <p>software engineering</p>
              <a href="assets/img/foto/foto-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="/lab1" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/foto/foto-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>PC</h4>
              <p>computer network and instrumentation</p>
              <a href="assets/img/foto/foto-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="/lab3" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/fasilitas/VGA.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Kabel VGA</h4>
              <p>Multimedia Studio</p>
              <a href="assets/img/fasilitas/VGA.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="/lab2" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/foto/foto-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Keyboard</h4>
              <p>software engineering</p>
              <a href="assets/img/foto/foto-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="/lab1" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/fasilitas/kabel.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Kabel</h4>
              <p>computer network and instrumentation</p>
              <a href="assets/img/fasilitas/kabel.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="/lab3" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/foto/foto-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Fan</h4>
              <p>Multimedia Studio</p>
              <a href="assets/img/foto/foto-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="/lab2" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/fasilitas/router.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Router</h4>
              <p>computer network and instrumentation</p>
              <a href="assets/img/fasilitas/router.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="/lab3" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/fasilitas/green.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Green Screen</h4>
              <p>Multimedia Studio</p>
              <a href="assets/img/fasilitas/green.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="/lab2" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/fasilitas/mouse.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Mouse</h4>
              <p>software engineering</p>
              <a href="assets/img/fasilitas/mouse.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="/lab1" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/fasilitas/voltmeter.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Voltmeter</h4>
              <p>computer network and instrumentation</p>
              <a href="assets/img/fasilitas/voltmeter.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="/lab3" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/foto/kamera.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Kamera</h4>
              <p>Multimedia Studio</p>
              <a href="assets/img/foto/kamera.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="/lab2" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/fasilitas/_Router_AX4500.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Router Adapter</h4>
              <p>computer network and instrumentation</p>
              <a href="assets/img/fasilitas/_Router_AX4500.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="/lab3" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/fasilitas/pen.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Pen Tablet</h4>
              <p>Multimedia Studio</p>
              <a href="assets/img/fasilitas/pen.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="/lab2" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/fasilitas/lan.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Kabel LAN</h4>
              <p>computer network and instrumentation</p>
              <a href="assets/img/fasilitas/lan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="/lab3" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/fasilitas/LCD.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>LCD Proyektor</h4>
              <p>Multimedia Studio</p>
              <a href="assets/img/fasilitas/LCD.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="/lab2" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <span>Team</span>
          <h2>Team</h2>
          <p>The Following is the developer of this website </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" alt="">
              <h4>Salik Manahijassu'ada'</h4>
              <span>Frontend Development</span>
              <p>
                Fakultas Keguruan dan Ilmu Pendidikan, Prodi Pendidikan Teknik Informatika dan Komputer UNS
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/salik_jpr21/?hl=en"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/in/salik-manahijassu-ada-417113229/"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" alt="">
              <h4>Dinda</h4>
              <span>User Interface</span>
              <p>
                Fakultas Keguruan dan Ilmu Pendidikan, Prodi Pendidikan Teknik Informatika dan Komputer UNS
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" alt="">
              <h4>Dicky Wahyu Nugroho</h4>
              <span>Backend Development</span>
              <p>
                Fakultas Keguruan dan Ilmu Pendidikan, Prodi Pendidikan Teknik Informatika dan Komputer UNS
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/dx_wn04/?hl=id"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/in/dicky-wahyu-nugroho-4716821ba/"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>If you are confused, please contact us</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Jl. A. Yani No.200, Dusun II, Pabelan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57161</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>PTIK.uns21@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+62 8571 3697 297</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6 ">
            <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1468272592956!2d110.77438409999999!3d-7.5589651999999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3da5901b2534937!2sSebelas%20Maret%20University%20-%20Campus%205!5e0!3m2!1sen!2sid!4v1656502594294!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
            <p>Are there any questions?</p>
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