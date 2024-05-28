<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#pelangganBaruModal"><i class="fas fa-plus ">Tambah Pelanggan</i></a>

        <?php

        function cek($id)
        {
            $conn = new mysqli("localhost", "root", "", "jourdan_19200833");
            $sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM penggunaan WHERE id_pelanggan='$id'"));
            return $sql;
        }
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
                    <th>Id Pelanggan</th>
                    <th>No Kwh</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Daya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pelanggan as $a) {
                    $cek = cek($a['id_pelanggan']);
                ?>

                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['id_pelanggan']; ?></td>
                        <td><?= $a['no_kwh']; ?></td>
                        <td><?= $a['nama_p']; ?></td>
                        <td><?= $a['alamat']; ?></td>
                        <td><?= $a['daya']; ?></td>
                        <td>
                            <?php
                            if ($cek == 0) { ?>
                                <a href="<?= base_url('admin/pelanggan/ubahPelanggan/') . $a['id_pelanggan']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>

                                <a href="<?= base_url('admin/pelanggan/hapusPelanggan/') . $a['id_pelanggan']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i>Hapus</a>
                            <?php } else { ?>
                                <a href="<?= base_url('admin/pelanggan/ubahPelanggan/') . $a['id_pelanggan']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    <!-- Modal Tambah Pelanggan baru-->
    <div class=" modal fade" id="pelangganBaruModal" tabindex="-1" role="dialog" aria-labelledby="pelangganBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="pelangganBaruModal">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/pelanggan/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3 input-group-sm mb-3 ">
                                    <input type="text" class="form-control form-control-user" readonly id="id_pelanggan" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                                </div>

                                <div class="col-sm-4 input-group-sm  mb-3">
                                    <input type="text" class="form-control form-control-user" readonly id="no_kwh" name="no_kwh" value="<?= $no_kwh; ?>">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="nama_p" name="nama_p" autocomplete="off" placeholder="Nama">
                                </div>

                                <div class="col-sm-3 input-group-sm mb-3">
                                    <select name="jen_kel" class="form-control form-control-user">
                                        <option>Jenis Kelamin</option>
                                        <option value="PRIA">PRIA</option>
                                        <option value="WANITA">WANITA</option>
                                    </select>
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="kontak" name="kontak" placeholder="Nomor Telpon/HP">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user " id="email" name="email" placeholder="Email">
                                </div>

                                <div class="col-sm-3 input-group-sm mb-3">
                                    <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp" placeholder="KTP/SIM">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <select name="id_tarif" id="id_tarif" class="form-control">
                                        <option value="">- Pilih Daya -</option>
                                        <?php foreach ($tarif as $r) { ?>
                                            <option value="<?= $r['id_tarif']; ?>"><?= $r['daya']; ?> - Rp.<?= $r['tarifperkwh']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <textarea class="form-control form-control-user" name="alamat" id="alamat" placeholder="Masukan Alamat"></textarea>
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="hidden" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                                </div>

                                <div class="col-sm-4 input-group-sm mb-3">
                                    <input type="hidden" class="form-control form-control-user" id="password" name="password" value="12345678">
                                </div>

                            </div>



                        </div>
                        <div class="modal-footer float-left">
                            <button type="button" class="btn btn-secondary ml-0" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Pelanggan -->