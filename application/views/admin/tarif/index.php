<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#tarifBaruModal"><i class="fas fa-plus ">Tambah Tarif</i></a>



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
                    <th>Id Tarif</th>
                    <th>Daya</th>
                    <th>Tarif/kwh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tarif as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['id_tarif']; ?></td>
                        <td><?= $a['daya']; ?></td>
                        <td><?= $a['tarifperkwh']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/tarif/ubahTarif/') . $a['id_tarif']; ?>" class="badge badge-success"><i class="fas fa-pen-square"></i> Ubah</a>

                            <a href="<?= base_url('admin/tarif/hapusTarif/') . $a['id_tarif']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah tarif baru-->
    <div class=" modal fade" id="tarifBaruModal" tabindex="-1" role="dialog" aria-labelledby="tarifBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="tarifBaruModal">Tambah Tarif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tarif/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" readonly id="kd_obat" name="id_tarif" value="TRF<?php echo sprintf("%04s", $id_tarif) ?>">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm  mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="daya" name="daya" placeholder="Masukan Daya">
                            </div>
                            <div class="form-group col-sm-4 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" id="tarifperkwh" name="tarifperkwh" placeholder="Masukan tarifperkwh ">
                            </div>

                        </div>
                        <div class="modal-footer float-left">
                            <button type="button" class="btn btn-secondary ml-0" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </div>

            </div>
            </form>
        </div>
    </div>
</div>


<!-- End of Modal Tambah tarif -->