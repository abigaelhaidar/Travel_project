<h2>Pesan Masukan</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Subject</th>
            <th>Pesan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($masukan as $msg): ?>
            <tr>
                <td><?php echo $msg['nama']; ?></td>
                <td><?php echo $msg['email']; ?></td>
                <td><?php echo $msg['telepon']; ?></td>
                <td><?php echo $msg['subject']; ?></td>
                <td><?php echo $msg['pesan']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($msg['created_at'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>