<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">

        <div class="d-flex flex-row-reverse bd-highlight">
            <a href="" class="btn btn-primary mt-3 mb-3 " data-toggle="modal" data-target="#fotoBaruModal"><i class="fas fa-file-alt"></i> Tambah </a>
        </div>

        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        <table id="tabel-data" class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Diupload oleh</th>
                    <th>Tanggal Upload</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($galeri as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['user']; ?></td>
                        <td><?= date("d M Y", $a['date_created']); ?></td>
                        <td><?= $a['keterangan']; ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/galeri/') . $a['foto']; ?>" class="img-fluid img-thumbnail m-0" style="width:200px;height:100px; ">
                            </picture>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/galeri/hapus/') . $a['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Foto baru-->
    <div class=" modal fade" id="fotoBaruModal" tabindex="-1" role="dialog" aria-labelledby="fotoBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="fotoBaruModalLabel">Tambah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/galeri/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" readonly id="nama" name="nama" value="<?= $user['nama']; ?>">

                        </div>
                        <div class=" form-group">
                            <textarea class="form-control form-control-user" name="keterangan" id="keterangan" placeholder="Masukan keterangan"></textarea>
                        </div>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Pilih foto</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Foto -->