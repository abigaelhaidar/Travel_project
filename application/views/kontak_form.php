<h2>Form Kontak</h2>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php echo form_open('kontak/submit'); ?>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
        <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo set_value('telepon'); ?>">
        <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo set_value('subject'); ?>">
        <?php echo form_error('subject', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="pesan" class="form-label">Pesan</label>
        <textarea class="form-control" id="pesan" name="pesan"><?php echo set_value('pesan'); ?></textarea>
        <?php echo form_error('pesan', '<small class="text-danger">', '</small>'); ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>