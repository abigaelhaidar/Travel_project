<h2>Data Booking</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Alamat</th>
            <th>Paket Wisata</th>
            <th>Jumlah Orang</th>
            <th>Total Harga</th>
            <th>Special Request</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo $booking['nama']; ?></td>
                <td><?php echo $booking['email']; ?></td>
                <td><?php echo $booking['telepon']; ?></td>
                <td><?php echo $booking['negara']; ?></td>
                <td><?php echo $booking['provinsi']; ?></td>
                <td><?php echo $booking['alamat']; ?></td>
                <td><?php echo $booking['nama_paket']; ?></td>
                <td><?php echo $booking['jumlah_orang']; ?></td>
                <td><?php echo number_format($booking['total'], 2); ?></td>
                <td><?php echo $booking['special_request'] ?: '-'; ?></td>
                <td><?php echo date('d-m-Y', strtotime($booking['created_at'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>