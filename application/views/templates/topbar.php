
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="#">
                                    <img src="<?= base_url('assets/') ?>img/logotopbar.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?php echo site_url('/') ?>">home</a></li>
                                        <li><a href="#">Tentang Kami <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo site_url('tentang-kami') ?>">Tentang Kami</a></li>
                                                <li><a href="<?php echo site_url('syarat-dan-ketentuan') ?>">Syarat & Ketentuan</a></li>
                                                <li><a href="<?php echo site_url('kebijakan-privasi') ?>">Kebiakan Privasi</a></li>
                                            </ul>
                                        </li>
                                        
                                       <li><a href="#">Layanan Kami <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo site_url('destinasi-bali') ?>">Paket Wisata Bali</a></li>
                                                 <li><a href="<?php echo site_url('destinasi-bromo-malang') ?>">Paket Wisata Bromo Malang</a></li>
                                                  <li><a href="<?php echo site_url('destinasi-karimunjawa') ?>">Paket Karimunjawa</a></li>
                                                <li><a href="<?php echo site_url('travel-tour-city') ?>">Travel</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo site_url('booking-paket') ?>">Pesan Paket Wisata</a></li>
                                                 <li><a href="<?php echo site_url('booking-travel') ?>">Pesan Travel</a></li>
                                                <li><a href="<?php echo site_url('testimoni') ?>">Testimoni</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo site_url('blog') ?>">Blog</a></li>
                                        <li><a href="<?php echo site_url('kontak') ?>">Kontak</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                      
                      
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->