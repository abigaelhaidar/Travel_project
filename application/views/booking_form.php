<h2>Form Booking</h2>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php echo form_open('booking/submit'); ?>
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
        <label for="negara" class="form-label">Negara</label>
        <select class="form-control" id="negara" name="negara">
            <option value="">Pilih Negara</option>
        </select>
        <?php echo form_error('negara', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="provinsi" class="form-label">Provinsi</label>
        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo set_value('provinsi'); ?>">
        <?php echo form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat"><?php echo set_value('alamat'); ?></textarea>
        <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="paket_id" class="form-label">Paket Wisata</label>
        <select class="form-control" id="paket_id" name="paket_id">
            <option value="">Pilih Paket</option>
            <?php foreach ($pakets as $paket): ?>
                <option value="<?php echo $paket['id']; ?>" data-harga="<?php echo $paket['harga']; ?>">
                    <?php echo $paket['nama_paket']; ?> (Rp <?php echo number_format($paket['harga'], 2); ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('paket_id', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
        <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" value="<?php echo set_value('jumlah_orang'); ?>">
        <?php echo form_error('jumlah_orang', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="mb-3">
        <label for="total" class="form-label">Total Harga</label>
        <input type="text" class="form-control" id="total" readonly>
    </div>
    <div class="mb-3">
        <label for="special_request" class="form-label">Special Request</label>
        <textarea class="form-control" id="special_request" name="special_request"><?php echo set_value('special_request'); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>

<script>
    // Fetch countries from RESTCountries API
    fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(data => {
            const negaraSelect = document.getElementById('negara');
            data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                negaraSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching countries:', error));

    // Calculate total price dynamically
    const paketSelect = document.getElementById('paket_id');
    const jumlahOrangInput = document.getElementById('jumlah_orang');
    const totalInput = document.getElementById('total');

    function calculateTotal() {
        const selectedOption = paketSelect.options[paketSelect.selectedIndex];
        const harga = selectedOption ? parseFloat(selectedOption.getAttribute('data-harga')) : 0;
        const jumlahOrang = parseInt(jumlahOrangInput.value) || 0;
        const total = harga * jumlahOrang;
        totalInput.value = total.toFixed(2);
    }

    paketSelect.addEventListener('change', calculateTotal);
    jumlahOrangInput.addEventListener('input', calculateTotal);
</script>