<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('admin/Pelanggan/ubahPelanggan'); ?>">
                <div class="form-group row">
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">Id Pelanggan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_kwh" class="col-sm-2 col-form-label">Nomor Kwh</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_kwh" name="no_kwh" value="<?= $pelanggan['no_kwh']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_p" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control " id="nama_p" name="nama_p" value="<?= $pelanggan['nama_p']; ?>" autocomplete="off">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jen_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-2">
                        <select name="jen_kel" required class="form-control form-control-user">
                            <option <?php if ($pelanggan['jen_kel'] == 'PRIA') {
                                        echo 'selected';
                                    } ?> value="PRIA">PRIA</option>
                            <option <?php if ($pelanggan['jen_kel'] == 'WANITA') {
                                        echo 'selected';
                                    } ?> value="WANITA">WANITA</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kontak" class="col-sm-2 col-form-label">No.Telpon</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="kontak" name="kontak" value="<?= $pelanggan['kontak']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $pelanggan['email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_ktp" class="col-sm-2 col-form-label">No.KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $pelanggan['no_ktp']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_tarif" class="col-sm-2 col-form-label">Daya</label>
                    <div class="col-sm-4">
                        <select required name="id_tarif" id="id_tarif" class="form-control">
                            <option value="">- Pilih Daya -</option>
                            <?php foreach ($tarif as $r) { ?>
                                <option value="<?= $r['id_tarif']; ?>"><?= $r['daya']; ?> - Rp.<?= $r['tarifperkwh']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="alamat" name="alamat" value="<?= $pelanggan['alamat']; ?>">
                    </div>
                </div>


                <div class="col-sm-10">
                    <input type="hidden" required class="form-control" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                </div>


                <div class="form-group row justify-content-end ">
                    <div class="col-sm-12">
                        <a href="<?= base_url('admin/pelanggan/') ?>" class="btn btn-outline-primary float-left" role="button">Kembali</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->