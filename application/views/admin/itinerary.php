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
                <h2>Itinerary Paket: <?= htmlspecialchars($paket['nama_paket'] ?? '') ?></h2>
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
                        <h3>Table Itinerary</h3>
                        <div class="d-flex">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addItineraryModal">
                                <i class="fas fa-plus"></i> Itinerary
                            </button>
                            <!-- Modal Tambah Itinerary -->
                            <div class="modal fade" id="addItineraryModal" tabindex="-1" role="dialog" aria-labelledby="addItineraryModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="modal-toggle-wrapper">
                                                <h4><strong class="font-primary">Tambah Itinerary</strong></h4>
                                                <?php echo form_open_multipart('admin/add_itinerary/'.$paket['id'], ['id' => 'itineraryForm']); ?>
                                                    <div class="mb-3">
                                                        <label for="day" class="form-label">Hari</label>
                                                        <input type="text" class="form-control" id="day" name="day" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="judul" class="form-label">Judul</label>
                                                        <input type="text" class="form-control" id="judul" name="judul" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="note" class="form-label">Note</label>
                                                        <input type="text" class="form-control" id="note" name="note">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="list" class="form-label">List</label>
                                                        <input type="text" class="form-control" id="list" name="list">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi_itinerary" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi_itinerary" name="deskripsi_itinerary"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="foto" class="form-label">Foto</label>
                                                        <input type="file" class="form-control" id="foto" name="foto">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" form="itineraryForm" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Tambah Itinerary -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <br>
                        <table class="display" id="itinerary-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Judul</th>
                                    <th>Note</th>
                                    <th>List</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($itinerary_list)): ?>
                                    <?php $no = 1; foreach ($itinerary_list as $row): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= htmlspecialchars($row['day'] ?? ''); ?></td>
                                            <td><?= htmlspecialchars($row['judul'] ?? ''); ?></td>
                                            <td><?= htmlspecialchars($row['note'] ?? ''); ?></td>
                                            <td><?= htmlspecialchars($row['list'] ?? ''); ?></td>
                                            <td><?= htmlspecialchars($row['deskripsi_itinerary'] ?? '') ?></td>
                                            <td>
                                                <?php if (!empty($row['foto'])): ?>
                                                    <img src="<?= base_url('uploads/itinerary/' . $row['foto']); ?>" alt="Foto Itinerary" width="50">
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
                                                        <a href="<?= base_url('admin/delete_itinerary/' . $row['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus itinerary ini?');">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Itinerary -->
                                        <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $row['id']; ?>">Edit Itinerary</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?= base_url('admin/edit_itinerary/' . $row['id']); ?>" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="day<?= $row['id']; ?>" class="form-label">Hari</label>
                                                                <input type="text" class="form-control" id="day<?= $row['id']; ?>" name="day" value="<?= htmlspecialchars($row['day'] ?? ''); ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="judul<?= $row['id']; ?>" class="form-label">Judul</label>
                                                                <input type="text" class="form-control" id="judul<?= $row['id']; ?>" name="judul" value="<?= htmlspecialchars($row['judul'] ?? ''); ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="note<?= $row['id']; ?>" class="form-label">Note</label>
                                                                <input type="text" class="form-control" id="note<?= $row['id']; ?>" name="note" value="<?= htmlspecialchars($row['note'] ?? ''); ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="list<?= $row['id']; ?>" class="form-label">List</label>
                                                                <input type="text" class="form-control" id="list<?= $row['id']; ?>" name="list" value="<?= htmlspecialchars($row['list'] ?? ''); ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi_itenary<?= $row['id']; ?>" class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" id="deskripsi_itenary<?= $row['id']; ?>" name="deskripsi_itenary"><?= htmlspecialchars($row['deskripsi_itinerary'] ?? ''); ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="foto<?= $row['id']; ?>" class="form-label">Foto</label>
                                                                <input type="file" class="form-control" id="foto<?= $row['id']; ?>" name="foto">
                                                                <?php if (!empty($row['foto'])): ?>
                                                                    <img src="<?= base_url('uploads/itinerary/' . $row['foto']); ?>" alt="Foto Itinerary" width="50" class="mt-2">
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
                                        <!-- End Modal Edit Itinerary -->
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <a href="<?= base_url('admin/paket_wisata'); ?>" class="btn btn-secondary">Kembali ke Paket Wisata</a>
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
        $('#itinerary-table').DataTable();
    });
</script>