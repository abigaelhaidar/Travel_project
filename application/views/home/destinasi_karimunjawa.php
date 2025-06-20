<div class="bradcam_area bradcam_bg_3 overlay" style="position: relative; overflow: hidden;">
    <!-- Video Background -->
    <video autoplay muted loop playsinline class="video-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
        <source src="<?= base_url('assets/video/karimunjawa.mp4') ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Konten Tetap -->
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Karimunjawa</h3>
                    <p>Mafen Tour Travel</p>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <?php if (!empty($pakets)): ?>
                <?php foreach($pakets as $paket): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single_place">
                            <div class="thumb">
                                <?php if (!empty($paket['foto'])): ?>
                                    <img src="<?= base_url('uploads/paket/'.$paket['foto']) ?>" alt="<?= htmlspecialchars($paket['nama_paket']) ?>">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/img/default-image.png') ?>" alt="No Image">
                                <?php endif; ?>
                                <a href="#" class="prise">Rp <?= number_format($paket['harga'],0,',','.') ?></a>
                            </div>
                            <div class="place_info">
                            <!-- Judul jadi link ke detail -->
                            <a href="<?= site_url('detail-paket/'.$paket['id']) ?>">
                                <h3><?= $paket['nama_paket'] ?></h3>
                            </a>
                            <p><?= $paket['deskripsi'] ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-2 card-bottom-info">
                                <a href="<?= site_url('booking_paket?paket_id='.$paket['id']) ?>" class="btn btn-pesan">
                                    <i class="fa fa-paper-plane"></i> Pesan
                                </a>
                                <div class="days ms-2">
                                    <i class="fa fa-clock-o"></i>
                                    <?php
                                    // Ambil angka hari dari nama_paket, misal: "3 Hari 2 Malam"
                                    preg_match('/(\d+)\s*Hari/', $paket['nama_paket'], $match);
                                    $jumlah_hari = isset($match[1]) ? $match[1] : '-';
                                    ?>
                                    <?= $jumlah_hari ?> Days
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center mt-4">
                        Tidak ada paket wisata Dieng tersedia saat ini.
                    </div>
                </div>
            <?php endif; ?>
        </div>

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
    </div>
</div>