<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('admin/Penggunaan/ubahPenggunaan'); ?>">

                <div class="form-group row">
                    <label for="id_penggunaan" class="col-sm-2 col-form-label">Id Penggunaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="<?= $penggunaan['id_penggunaan']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">Id Pelanggan</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $penggunaan['id_pelanggan']; ?> ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_p" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nama_p" name="nama_p" value="<?= $penggunaan['nama_p']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" type="text" class="form-control form-control-user datepickerYEAR" id="bulan" name="bulan" placeholder="bulan" value="<?= $penggunaan['bulan']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" type="text" class="form-control form-control-user datepickerYEAR" id="tahun" name="tahun" placeholder="Tahun" value="<?= $penggunaan['tahun']; ?>">
                    </div>
                </div>


                <div class=" form-group row">
                    <label for="meter_awal" class="col-sm-2 col-form-label">Meter Awal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="meter_awal" name="meter_awal" value="<?= $penggunaan['meter_awal']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="meter_akhir" class="col-sm-2 col-form-label">Meter Akhir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="meter_akhir" name="meter_akhir" value="<?= $penggunaan['meter_akhir']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_cek" class="col-sm-2 col-form-label">Tanggal Cek</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" type="text" class="form-control form-control-user datepicker" id="tgl_cek" name="tgl_cek" placeholder="Tanggal Cek" value="<?= $penggunaan['tgl_cek']; ?>">
                    </div>
                </div>

                <div class="col-sm-4 input-group-sm mb-3">
                    <input type="hidden" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                </div>

                <div class="form-group row justify-content-end float-right">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->