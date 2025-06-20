<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi WhatsApp</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background:#f5f6fa;">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var wa_url = "<?= $wa_url ?? '' ?>";
            var status = "<?= $this->session->flashdata('status') ?? 'success' ?>";
            var pesan = "<?= $this->session->flashdata('pesan') ?? 'Pesanan berhasil ditambahkan!' ?>";
            if (status === 'success') {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Pesanan berhasil ditambahkan!\nAnda akan diarahkan ke WhatsApp.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = "<?= $wa_url ?>";
                });
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: pesan,
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = "<?= site_url('home/paket_wisata') ?>";
                });
            }
        });
    </script>
    <p style="text-align:center;margin-top:40px;">Mengalihkan ke WhatsApp...</p>
</body>
</html>