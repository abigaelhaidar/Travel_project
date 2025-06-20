<script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert-custom.js"></script>
<script>
    // Cek apakah ada flashdata untuk success
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= $this->session->flashdata('success') ?>',
        });
    <?php endif; ?>

    // Cek apakah ada flashdata untuk error
    <?php if ($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= $this->session->flashdata('error') ?>',
        });
    <?php endif; ?>
</script>

<div class="container mt-4">
    <h2>Daftar Pesanan Booking Paket</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Jumlah Orang</th>
                    <th>Total</th>
                    <th>Special Request</th>
                    <th>Tanggal Pesanan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($bookings) > 0): ?>
                    <?php $no=1; foreach($bookings as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($b['nama']) ?></td>
                        <td><?= htmlspecialchars($b['email']) ?></td>
                        <td><?= htmlspecialchars($b['telepon']) ?></td>
                        <td><?= htmlspecialchars($b['negara']) ?></td>
                        <td><?= htmlspecialchars($b['provinsi']) ?></td>
                        <td><?= htmlspecialchars($b['alamat']) ?></td>
                        <td><?= htmlspecialchars($b['paket_id']) ?></td>
                        <td><?= htmlspecialchars($b['jumlah_orang']) ?></td>
                        <td>Rp <?= number_format($b['total'],0,',','.') ?></td>
                        <td><?= htmlspecialchars($b['special_request']) ?></td>
                        <td><?= $b['tanggal_pesanan'] ?></td>
                        <td>
                            <ul class="action">
                                <li class="delete">
                                    <a href="<?= base_url('Admin/delete_data_booking_paket/' . $b['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="icon-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12" class="text-center">Belum ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>