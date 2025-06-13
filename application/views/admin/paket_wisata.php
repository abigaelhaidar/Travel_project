<script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert-custom.js"></script>
<script>
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= $this->session->flashdata('success') ?>',
        });
    <?php endif; ?>

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
                <h2>Paket Wisata</h2>
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
                        <h3>Table Paket Wisata</h3>
                        <div class="d-flex">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addCategoryModal">
                                <i class="fas fa-plus"></i> Paket
                            </button>
                            <!-- Modal Tambah Paket -->
                            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="modal-toggle-wrapper">
                                                <h4><strong class="font-primary">Tambah Paket Wisata</strong></h4>
                                                <?php echo form_open_multipart('admin/add_paket', ['id' => 'categoryForm']); ?>
                                                    <div class="mb-3">
                                                        <label for="nama_paket" class="form-label">Nama Paket</label>
                                                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <input type="number" class="form-control" id="harga" name="harga" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="foto" class="form-label">Foto</label>
                                                        <input type="file" class="form-control" id="foto" name="foto" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" form="categoryForm" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Tambah Paket -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <br>
                        <table class="display" id="basic-9">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($paket)): ?>
                                    <?php $no = 1; foreach ($paket as $row): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= htmlspecialchars($row['nama_paket']); ?></td>
                                            <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                                            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                            <td>
                                                <?php if (!empty($row['foto'])): ?>
                                                    <img src="<?= base_url('uploads/paket/' . $row['foto']); ?>" alt="Foto Paket" width="50">
                                                <?php else: ?>
                                                    <span>Foto tidak tersedia</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="#" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                                                            <i class="icon-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <a href="<?= base_url('admin/hapus_paket/' . $row['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Paket -->
                                        <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $row['id']; ?>">Edit Paket Wisata</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?= base_url('admin/edit_paket/' . $row['id']); ?>" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="nama_paket<?= $row['id']; ?>" class="form-label">Nama Paket</label>
                                                                <input type="text" class="form-control" id="nama_paket<?= $row['id']; ?>" name="nama_paket" value="<?= htmlspecialchars($row['nama_paket']); ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi<?= $row['id']; ?>" class="form-label">Deskripsi</label>
                                                                <input type="text" class="form-control" id="deskripsi<?= $row['id']; ?>" name="deskripsi" value="<?= htmlspecialchars($row['deskripsi']); ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="harga<?= $row['id']; ?>" class="form-label">Harga</label>
                                                                <input type="number" class="form-control" id="harga<?= $row['id']; ?>" name="harga" value="<?= htmlspecialchars($row['harga']); ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="foto<?= $row['id']; ?>" class="form-label">Foto</label>
                                                                <input type="file" class="form-control" id="foto<?= $row['id']; ?>" name="foto">
                                                                <?php if (!empty($row['foto'])): ?>
                                                                    <img src="<?= base_url('uploads/paket/' . $row['foto']); ?>" alt="Foto Paket" width="50" class="mt-2">
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Edit Paket -->
                                    <?php endforeach; ?>
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

<!-- DataTables & Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit a').click(function(e) {
            e.preventDefault();
            $('#editModal').modal('show');
        });
    });
</script>