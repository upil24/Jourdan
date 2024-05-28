<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">

        <?php if ($user['id_user'] == 50) { ?>
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#userBaruModal"><i class="fas fa-file-alt"></i> Tambah </a>
            </div>
        <?php  }
        ?>


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
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Gambar</th>
                    <th>Tanggal Daftar</th>
                    <?php if ($user['id_user'] == 50) { ?>
                        <th>Aksi</th> <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($anggota as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['email']; ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/') . $a['image']; ?>" class="img-fluid img-thumbnail m-0" style="width:60px;height:80px; ">
                            </picture>
                        </td>
                        <td><?= date('d M Y', $a['date_created']); ?></td>
                        <?php if ($user['id_user'] == 50) { ?>
                            <td>
                                <a href="<?= base_url('admin/User/hapusUser/') . $a['id_user']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah user baru-->
    <div class=" modal fade" id="userBaruModal" tabindex="-1" role="dialog" aria-labelledby="userBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="userBaruModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/user/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama">

                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
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
<!-- End of Modal Tambah user -->