<div class="container mt-5 mb-5">
    <h2 class="mb-4">Form Booking Paket Wisata</h2>
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><ul><?= $this->session->flashdata('error'); ?></ul></div>
    <?php endif; ?>
    <form action="<?= site_url('simpan-pesanan') ?>" method="post" id="bookingForm" novalidate>
        <div class="form-group mb-2">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>No. Telepon/WhatsApp</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Negara</label>
            <select name="negara" id="negara" class="form-control" required>
                <option value="">-- Pilih Negara --</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label>Provinsi</label>
            <input type="text" name="provinsi" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group mb-2">
            <label> paket_id Wisata</label>
            <select name="paket_id" id="paket_id" class="form-control" required>
                <option value="">-- Pilih Paket --</option>
                <?php foreach($pakets as $paket): ?>
                    <option value="<?= $paket['id'] ?>" data-harga="<?= $paket['harga'] ?>">
                        <?= $paket['nama_paket'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label>Jumlah Orang</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" value="1" required>
        </div>
        <div class="form-group mb-2">
            <label>Harga per Orang (Rp)</label>
            <input type="text" id="harga" name="harga" class="form-control" readonly>
        </div>
        <div class="form-group mb-2">
            <label>Total Harga (Rp)</label>
            <input type="text" id="total" name="total" class="form-control" readonly>
        </div>
        <div class="form-group mb-3">
            <label>Special Request</label>
            <textarea name="pesan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Pesan Sekarang & Konfirmasi WhatsApp</button>
    </form>
</div>

<script>
// Ambil daftar negara dari API
fetch('https://restcountries.com/v3.1/all?fields=name')
    .then(response => response.json())
    .then(data => {
        let countries = data.map(c => c.name.common).sort();
        let select = document.getElementById('negara');
        countries.forEach(function(name) {
            let option = document.createElement('option');
            option.value = name;
            option.text = name;
            select.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Gagal mengambil daftar negara:', error);
    });
    
function formatRupiah(angka) {
    return angka.toLocaleString('id-ID');
}

document.getElementById('paket_id').addEventListener('change', function() {
    var harga = this.options[this.selectedIndex].getAttribute('data-harga') || 0;
    document.getElementById('harga').value = formatRupiah(Number(harga));
    hitungTotal();
});

document.getElementById('jumlah').addEventListener('input', function() {
    hitungTotal();
});

function hitungTotal() {
    var harga = parseInt(document.getElementById('harga').value.replace(/\./g,'')) || 0;
    var jumlah = parseInt(document.getElementById('jumlah').value) || 1;
    var total = harga * jumlah;
    document.getElementById('total').value = formatRupiah(total);
}

// Validasi HTML5 (opsional, untuk feedback langsung)
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    if (!this.checkValidity()) {
        e.preventDefault();
        alert('Semua field wajib diisi dengan benar!');
    }
});
</script>