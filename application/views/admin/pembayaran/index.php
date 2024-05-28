<?php
// var_dump($hasil);
// die
?>

<div class="row">
    <div class="  col-sm-11 ml-auto mr-auto mt-2">


        <form method="post" action="<?= base_url('admin/pembayaran/'); ?>">
            <div class="form-group row mt-3 mb-5">

                <div class="col-sm-3 ">
                    <input type="text" class="form-control " id="id_pelanggan" name="id_pelanggan" placeholder="Masukan ID PELANGGAN">
                </div>
                <button type="submit" class="btn btn-primary ">Go</button>
            </div>
        </form>


        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    </div>


</div>