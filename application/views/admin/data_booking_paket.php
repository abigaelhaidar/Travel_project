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