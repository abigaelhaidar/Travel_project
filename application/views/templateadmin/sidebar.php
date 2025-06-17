<div class="page-body-wrapper">
    <aside class="page-sidebar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div class="main-sidebar" id="main-sidebar">
            <ul class="sidebar-menu" id="simple-bar">
                <li class="pin-title sidebar-main-title">
                    <div>
                        <h5 class="sidebar-title f-w-700">Pinned</h5>
                    </div>
                </li>

                <li class="sidebar-main-title">
                    <div>
                        <h5 class="lan-1 f-w-700 sidebar-title">General</h5>
                    </div>
                </li>

                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="<?= base_url('admin'); ?>">
                        <i class="fa-solid fa-tachometer-alt"></i>
                        <h6 class="f-w-600">Dashboard</h6>
                    </a>
                </li>

                <li class="sidebar-main-title">
                    <div>
                        <h5 class="f-w-700 sidebar-title pt-3">Data</h5>
                    </div>
                </li>

                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="javascript:void(0)">
                        <i class="fa-solid fa-star"></i>
                        <h6 class="f-w-600">Data</h6>
                        <i class="iconly-Arrow-Right-2 icli"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li> <a href="<?= base_url('blog_admin'); ?>">Blog</a></li>
                        <li> <a href="<?= base_url('paket_wisata'); ?>">Paket Wisata</a></li>
                        <li> <a href="<?= base_url('data_booking_paket'); ?>">Data Booking Paket</a></li>
                        <li> <a href="<?= base_url('masukan'); ?>">Pesan/Masukan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </aside>