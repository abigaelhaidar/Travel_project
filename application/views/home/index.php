<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider overlay">
            <div class="video-wrapper">
                <video autoplay muted loop playsinline class="video-bg">
                    <source src="<?= base_url('assets/video/bali.mp4') ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="container content-overlay d-flex justify-content-center align-items-center">
                <div class="slider_text text-center">
                    <h3>Bali</h3>
                    <p>Mafen Tour Travel</p>
                    <a href="<?php echo site_url('destinasi-bali') ?>" class="boxed-btn3">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="single_slider overlay">
            <div class="video-wrapper">
                <video autoplay muted loop playsinline class="video-bg">
                    <source src="<?= base_url('assets/video/bromo.mp4') ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="container content-overlay d-flex justify-content-center align-items-center">
                <div class="slider_text text-center">
                    <h3>Bromo Malang</h3>
                    <p>Mafen Tour Travel</p>
                    <a href="<?php echo site_url('destinasi-bromo-malang') ?>" class="boxed-btn3">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="single_slider overlay">
            <div class="video-wrapper">
                <video autoplay muted loop playsinline class="video-bg">
                    <source src="<?= base_url('assets/video/karimunjawa.mp4') ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="container content-overlay d-flex justify-content-center align-items-center">
                <div class="slider_text text-center">
                    <h3>Karimunjawa</h3>
                    <p>Mafen Tour Travel</p>
                    <a href="<?php echo site_url('destinasi-karimunjawa') ?>" class="boxed-btn3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .single_slider {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    .video-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -1;
    }

    .video-bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .content-overlay {
        position: relative;
        height: 100vh;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
    }

    /* Optional overlay background effect */
    .overlay::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        /* Darken the video for text visibility */
        z-index: 1;
    }
</style>
<!-- slider_area_end -->

<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="<?= base_url('assets/home/') ?>img/svg_icon/1.svg" alt="">
                    </div>
                    <h3>Paket Wisata Menarik</h3>
                    <p>Temukan pengalaman liburan tak terlupakan dengan pilihan paket wisata terbaik kami. Dari pegunungan yang sejuk hingga pantai yang memukau, semuanya ada di sini!</p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <i class="fa fa-car fa-4x" style="color: #FF4A52;"></i>
                    </div>

                    <h3>Transportasi Lengkap</h3>
                    <p>Dari mobil pribadi hingga bus pariwisata, semua tersedia untuk menunjang kenyamanan liburan Anda.</p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="<?= base_url('assets/home/') ?>img/svg_icon/3.svg" alt="">
                    </div>
                    <h3>Travel Guide</h3>
                    <p>Liburan makin seru dengan pemandu wisata berpengalaman yang siap menemani dan memberikan informasi menarik di setiap destinasi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popular_destination_area_start  -->
<div class="popular_destination_area ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Destinasi Paket Wisata</h3>
                    <p>Jelajahi keindahan Indonesia bersama kami! Nikmati pesona alam dan budaya dengan ke tiga destinasi favorit Bali, Bromo dan Karimunjawa.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="<?= base_url('assets/') ?>img/karimunjawadestinasi.png" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Karimunjawa <a href="<?php echo site_url('destinasi-karimunjawa') ?>"> 3 Paket</a> </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="<?= base_url('assets/img/') ?>destinasibali.png" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Magelang <a href="<?php echo site_url('destinasi-bali') ?>"> 3 Paket</a> </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="<?= base_url('assets/') ?>img/bromodestinasi.png" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center">Dieng <a href="<?php echo site_url('destinasi-bromo-malang') ?>"> 3 Paket</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->


<style>
    .no-margin {
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
    }

    .text-primaryy {
        color: #f44a40 !important;
    }

    .paket-title:hover {
        cursor: pointer;
        color: #f44a40;
        text-decoration: underline;
    }

    .btn-pesan {
        background: #fff;
        color: #f44a40;
        border: 1px solid #f44a40;
        border-radius: 20px;
        padding: 4px 18px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(244,74,64,0.08);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .btn-pesan:hover {
        background: #f44a40;
        color: #fff;
        text-decoration: none;
        border-color: #f44a40;
    }
    .days {
        font-size: 15px;
        color: #888;
        font-weight: 500;
    }
    .fa-clock-o {
        margin-right: 5px;
    }
    .card-bottom-info {
        margin-top: auto;
    }
</style>

<div class="popular_places_area ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Paket Wisata</h3>
                    <p>Jelajahi keindahan Indonesia bersama kami! Nikmati pesona alam dan budaya dengan paket wisata eksklusif ke tiga destinasi favorit Bali, Bromo dan Karimunjawa
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Ganti bagian ini dengan kode foreach -->
            <?php foreach($pakets as $paket): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="<?= base_url('uploads/paket/'.$paket['foto']) ?>" alt="<?= $paket['nama_paket'] ?>">
                            <a href="#" class="prise">Rp <?= number_format($paket['harga'],0,',','.') ?></a>
                        </div>
                        <div class="place_info">
                            <!-- Judul jadi link ke detail -->
                            <a href="<?= site_url('detail-paket/'.$paket['id']) ?>">
                                <h3><?= $paket['nama_paket'] ?></h3>
                            </a>
                            <p><?= $paket['deskripsi'] ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-2 card-bottom-info">
                                <a href="<?= site_url('booking-paket?paket_id='.$paket['id']) ?>" class="btn btn-pesan">
                                    <i class="fa fa-paper-plane"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Sampai sini -->
        </div>
    </div>
</div>

<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Travel City Tour Yogyakarta</h3>
                    <p>
                    <p>Liburan ke Jogja? Yuk city tour bareng kami! Jalan-jalan seru ke tempat hits dan bersejarah, ditemani guide lokal yang asyik dan berpengalaman.</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="<?= base_url('assets/') ?>img/avanzafwd.png" alt="">
                    </div>
                    <div class="info">
                        <a href="<?php echo site_url('booking-travel') ?>">
                            <h3>Avanza FWD</h3>
                        </a>
                        <p>Harga Mulai Rp.700K/Hari.</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <a href="<?php echo site_url('booking-travel') ?>"><span class="text-primaryy">Pesan</span></a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="<?php echo site_url('booking-travel') ?>">1 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="<?= base_url('assets/') ?>img/inovarebrn.png" alt="">
                    </div>
                    <div class="info">
                        <a href="<?php echo site_url('booking-travel') ?>">
                            <h3>Inova Reborn</h3>
                        </a>
                        <p>Biaya Sewa Mulai dari Rp. 900K/Hari.</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <a href="<?php echo site_url('booking-travel') ?>"><span class="text-primaryy">Pesan</span></a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="<?php echo site_url('booking-travel') ?>">1 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="<?= base_url('assets/') ?>img/toyotahiace.png" alt="">
                    </div>
                    <div class="info">
                        <a href="<?php echo site_url('booking-travel') ?>">
                            <h3>Toyota Hiace Commuter</h3>
                        </a>
                        <p>Harga Mulai Rp.1.300K/ Hari.</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <a href="<?php echo site_url('booking-travel') ?>"><span class="text-primaryy">Pesan</span></a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="<?php echo site_url('booking-travel') ?>">1 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- testimonial_area  -->
<div class="testimonial_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Testimoni</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                       <img src="<?= base_url('assets/') ?>img/testimoni.png" alt="Testimonial">
                                    </div>
                                    <p>"Perjalanan ke Bali bersama Mafen Tour Travel sungguh luar biasa! Pelayanannya ramah, itinerary-nya tertata rapi, dan semuanya on time. Terima kasih sudah bikin liburan kami tak terlupakan!"
                                    </p>
                                    <div class="testmonial_author">
                                        <h3>- Andini Prasetya</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                       <img src="<?= base_url('assets/') ?>img/testimoni.png" alt="Testimonial">
                                    </div>
                                    <p>"Awalnya ragu, tapi setelah ikut trip ke Bromo, saya benar-benar puas. Pemandu wisatanya berpengalaman dan sangat membantu. Mafen Tour Travel recommended banget buat yang pengen liburan tanpa ribet!"</p>
                                    <div class="testmonial_author">
                                        <h3>- Rizky Ramadhan
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="<?= base_url('assets/') ?>img/testimoni.png" alt="Testimonial">
                                    </div>
                                    <p>"Saya dan keluarga ikut paket wisata ke Karimunjawa. Semua akomodasi sudah diurus dengan baik, bahkan anak-anak pun betah selama di perjalanan. Mafen Tour Travel benar-benar profesional dan terpercaya!"</p>
                                    <div class="testmonial_author">
                                        <h3>- Maria Gunawan</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area  -->