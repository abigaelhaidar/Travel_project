<script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert-custom.js"></script>
<script>
    // Cek apakah ada flashdata untuk success
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= $this->session->flashdata('success') ?>',
        });
    <?php endif; ?>

    // Cek apakah ada flashdata untuk error
    <?php if ($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= $this->session->flashdata('error') ?>',
        });
    <?php endif; ?>
</script>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Data Pesan/Masukan</h2>
            </div>

        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Table Data Pesan/Masukan</h3>
                        <div class="d-flex">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <br>
                            <table class="display" id="basic-9">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Pesan/Masukan</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($masukan)): ?>
                                        <?php $no = 1;
                                        foreach ($masukan as $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($row['nama']); ?></td>
                                                <td><?= htmlspecialchars($row['email']); ?></td>
                                                <td><?= htmlspecialchars($row['subject']); ?></td>
                                                <td><?= htmlspecialchars($row['pesan']); ?></td>
                                                <td><?= htmlspecialchars($row['created_at']); ?></td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="delete">
                                                            <a href="<?= base_url('Admin/delete_masukan/' . $row['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>

                                    <?php endif; ?>

                                </tbody>

                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>