<h2>Tambah Paket Wisata</h2>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<?php echo form_open_multipart('admin/paket/create'); ?>
    <div class="mb-3">
        <label for="nama_paket" class="form-label">Nama Paket</label>
        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?php echo set_value('nama_paket'); ?>">
        <?php echo form_error('nama_paket', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="<?php echo set_value('harga'); ?>">
        <?php echo form_error('harga', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg,image/png">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
<?php echo form_close(); ?>