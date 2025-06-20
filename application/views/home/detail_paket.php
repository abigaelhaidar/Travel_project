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
                    <h3><?= $paket['nama_paket'] ?></h3>
                    <p><?= $paket['deskripsi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<main class="main">
    <section id="service-details" class="service-details section">
        <div class="container">
            <div class="row gy-4">
                <!-- Gambar di sebelah kiri -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?= base_url('uploads/paket/'.$paket['foto']) ?>" alt="<?= $paket['nama_paket'] ?>" class="img-fluid services-img">
                </div>

                <!-- Detail layanan di sebelah kanan -->
                <div class="col-lg-6 content-container" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-primaryy"><?= $paket['nama_paket'] ?></h4>
                    <br>
                    <p><i class="fa fa-location-dot"></i> <strong>Tujuan wisata :</strong> <?= $paket['tujuan'] ?? 'Karimun Jawa' ?></p>
                    <?php
                    preg_match('/(\d+\s*Hari\s*\d*\s*Malam)/i', $paket['nama_paket'], $match);
                    $durasi = isset($match[1]) ? $match[1] : '-';
                    ?>
                    <p><i class="fa fa-clock"></i> <strong>Durasi :</strong> <?= $durasi ?></p>
                    <p><i class="fa fa-money-bill-wave"></i> <strong>Harga :</strong> Rp <?= number_format($paket['harga'], 0, ',', '.') ?></p>
                    <br>
                    <p><?= nl2br($paket['deskripsi']) ?></p>
                    <br>
                    <p>Sosial media : </p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-share fa-2x text-primaryy mr me-2"></i>
                        <a class="btn-square btn btn-white rounded-circle mx-1" href=""><i class="fa fa-whatsapp"></i></a>
                        <a class="btn-square btn btn-white rounded-circle mx-1" href=""><i class="fa fa-instagram"></i></a>
                        <a class="btn-square btn btn-white rounded-circle mx-1" href=""><i class="fa fa-facebook-f"></i></a>
                        <a class="btn-square btn btn-white rounded-circle mx-1" href=""><i class="fa fa-youtube"></i></a>
                    </div>
                    <style>
                        .text-primaryy {
                            color: #f44a40 !important;
                        }
                        .content-container i {
                            color: #f44a40;
                            font-size: 18px;
                            margin-right: 8px;
                        }
                    </style>
                </div>

                
            </div>
        </div>
    </section>
</main>


<div class="container">

    <div class="row mt-4">
        <div class="col-lg-6 timeline-container" data-aos="fade-up" data-aos-delay="300">
            <div class="timeline">
                <?php if (!empty($itinerary_list)): ?>
                    <?php foreach ($itinerary_list as $row): ?>
                        <div class="timeline-item">
                            <div class="timeline-content">
                                <img src="<?= !empty($row['foto']) ? base_url('uploads/itinerary/' . $row['foto']) : base_url('assets/img/default-image.png') ?>" alt="Hari ke <?= htmlspecialchars($row['day'] ?? '') ?>" class="img-fluid">
                                <div class="timeline-text">
                                    <h4 class="text-primaryy"><?= htmlspecialchars($row['judul'] ?? '') ?></h4>
                                    <p><?= nl2br(htmlspecialchars($row['deskripsi_itinerary'] ?? '')) ?></p>
                                </div>
                            </div>
                            <div class="timeline-label">Hari <?= htmlspecialchars($row['day'] ?? '') ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="timeline-item">
                        <div class="timeline-label" style="background:#f44a40;">Belum ada itinerary</div>
                        <div class="timeline-content">
                            <p>Silakan tambahkan itinerary terlebih dahulu.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6 contentt-container" data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-primaryy">Itinerary Paket: <?= htmlspecialchars($paket['nama_paket'] ?? '') ?></h4>
            <?php if (!empty($itinerary_list)): ?>
                <?php foreach ($itinerary_list as $row): ?>
                    <br>
                    <h4 class="text-primaryy">Hari <?= htmlspecialchars($row['day'] ?? '') ?>: <?= htmlspecialchars($row['judul'] ?? '') ?></h4>
                    <?php if (!empty($row['list'])): ?>
                        <ul class="ulli">
                            <?php
                            $items = preg_split('/\r\n|[\r\n,]+/', $row['list']);
                            foreach ($items as $item):
                                if (trim($item) !== ''):
                            ?>
                                <li class="ulli"><p><?= htmlspecialchars($item) ?></p></li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    <?php endif; ?>
                    <!-- <?php if (!empty($row['deskripsi_itinerary'])): ?>
                        <p><?= nl2br(htmlspecialchars($row['deskripsi_itinerary'])) ?></p>
                    <?php endif; ?> -->
                <?php endforeach; ?>
            <?php else: ?>
                <p>Belum ada itinerary.</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- paket lainnya -->
<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="section_title text-center mb_70">
                    <?php
                    $nama_paket = $paket['nama_paket'];
                    // Ambil hanya kata sebelum angka (misal: "Karimun Jawa" dari "Karimun Jawa 3 Hari 2 Malam")
                    if (preg_match('/^([^\d]+)/', $nama_paket, $match)) {
                        $destinasi = trim($match[1]);
                    } else {
                        $destinasi = $nama_paket;
                    }
                    ?>
                    <h3><span class="text-primaryy"><?= $destinasi ?></span> lainnya</h3>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <?php if (!empty($paket_lainnya)): ?>
                <?php foreach($paket_lainnya as $lain): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="<?= base_url('uploads/paket/'.$lain['foto']) ?>" alt="<?= $lain['nama_paket'] ?>">
                                <a href="<?= site_url('detail-paket/'.$lain['id']) ?>" class="prise">Rp <?= number_format($lain['harga'], 0, ',', '.') ?></a>
                            </div>
                            <div class="place_info">
                                <a href="<?= site_url('detail-paket/'.$lain['id']) ?>">
                                    <h3><?= $lain['nama_paket'] ?></h3>
                                </a>
                                <p><?= word_limiter($lain['deskripsi'], 15) ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <a href="<?= site_url('booking_paket?paket_id='.$lain['id']) ?>"><span class="text-primaryy">Pesan</span></a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <?php
                                        preg_match('/(\d+)\s*Hari/', $lain['nama_paket'], $match);
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
                <div class="col-12 text-center">
                    <p>Tidak ada paket lainnya.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Timeline Style -->
<style>
    .ulli {
        list-style-type: disc;
        margin-left: 15px;
        padding-left: 1px;
        list-style-position: outside;
    }

    .timline-container {
        margin-top: 30px;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .timeline {
      position: relative;
        padding-left: 50px;
        max-width: 700px;
        /* //margin: auto; */
        border-left: 3px solid #f44a40;
    }

    .timeline-label {
     position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: -80px;
        background: #f44a40;
        color: white;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        white-space: nowrap;
    }

    .timeline-item {
       position: relative;
        margin-bottom: 15px;
        background: #fff;
        padding: 12px 12px 12px 40px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);

    }

    .timeline-content {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .timeline-content img {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }

    .timeline-text {
        max-width: 550px;
    }

    h4 {
        margin: 0;
        font-size: 16px;
    }

    h4 small {
        font-size: 14px;
        font-weight: normal;
        color: gray;
    }

    p {
        margin: 5px 0 0;
        font-size: 14px;
        color: #555;
        line-height: 1.5;
    }

    @media (max-width: 768px) {
        .timeline {
            padding-left: 0;
        }

        .timeline-item {
            flex-direction: column;
            text-align: center;
            padding: 15px;
        }

        .timeline-label {
            position: static;
            transform: none;
            display: block;
            margin-bottom: 10px;
            text-align: center;
            font-size: 14px;
            padding: 8px 12px;
        }

        .timeline-content {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .timeline-content img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .timeline-text {
            max-width: 100%;
        }
    }
</style>