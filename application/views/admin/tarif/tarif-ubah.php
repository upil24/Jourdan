<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('admin/tarif/ubahTarif'); ?>">
                <div class="form-group row">
                    <label for="id_tarif" class="col-sm-2 col-form-label">ID Tarif</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_tarif" name="id_tarif" value="<?= $tarif['id_tarif']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="daya" class="col-sm-2 col-form-label">Daya</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="daya" name="daya" value="<?= $tarif['daya']; ?> ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tarifperkwh" class="col-sm-2 col-form-label">tarifperkwh</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="tarifperkwh" name="tarifperkwh" value="<?= $tarif['tarifperkwh']; ?>">
                    </div>
                </div>


                <div class="form-group row justify-content-end ">
                    <div class="col-sm-12">
                        <a href="<?= base_url('admin/tarif/') ?>" class="btn btn-outline-primary float-left" role="button">Kembali</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->