<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="/admin" class="list-group-item list-group-item-action py-2 ripple <?= ($nav == 'home' ? 'active' : '') ?>"><i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span></a>
                <a href="/admin/user" class="list-group-item list-group-item-action py-2 ripple <?= ($nav == 'user' ? 'active' : '') ?>"><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                <a href="/admin/jadwal" class="list-group-item list-group-item-action py-2 ripple <?= ($nav === 'jadwal' ? 'active' : ''); ?>"><i class="fas fa-book fa-fw me-3 >"></i><span>Jadwal</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white bg-gradient fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-aboutel="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="assets/img/clients/Logo.png" height="50" alt="" loading="lazy" />
            </a>
            <!-- Search form -->
            Sistem Peminjaman LAB PTIK

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">

                <!-- Icon -->
                <li class="nav-item">
                    <a class="nav-link me-3 me-lg-0" href="#">
                        <div id="waktu"></div>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22" alt="" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-aboutelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= base_url('/admin/user') . '/' . session()->get('id') ?>">My profile</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('admin/keluar') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
</header>