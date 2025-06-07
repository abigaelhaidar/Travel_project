<h2>Paket Wisata</h2>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<a href="<?php echo base_url('admin/paket/create'); ?>" class="btn btn-primary mb-3">Tambah Paket</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Paket</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pakets as $paket): ?>
            <tr>
                <td><?php echo $paket['nama_paket']; ?></td>
                <td><?php echo $paket['deskripsi'] ?: '-'; ?></td>
                <td><?php echo number_format($paket['harga'], 2); ?></td>
                <td><img src="<?php echo base_url('assets/uploads/paket/' . $paket['foto']); ?>" width="100"></td>
                <td>
                    <a href="<?php echo base_url('admin/paket/edit/' . $paket['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?php echo base_url('admin/paket/delete/' . $paket['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>