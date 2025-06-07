<h2>Admin Login</h2>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<?php echo form_open('admin/auth/login'); ?>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
        <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
<?php echo form_close(); ?>