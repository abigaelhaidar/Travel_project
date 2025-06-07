<h2>Admin Dashboard</h2>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Jumlah Paket Wisata</h5>
                <p class="card-text"><?php echo $paket_count; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Jumlah Booking</h5>
                <p class="card-text"><?php echo $booking_count; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Pesan Masukan</h5>
                <p class="card-text"><?php echo $masukan_count; ?></p>
            </div>
        </div>
    </div>
</div>