<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><b>ID Pelanggan</b><?= '   :   ' . $pelanggan['id_pelanggan'] ?></p>
                    <p class="card-text"><b>No Kwh</b><?= '   :   ' . $pelanggan['no_kwh'] ?></p>
                    <p class="card-text"><b>Daya</b><?= '   :   ' . $pelanggan['daya'] ?></p>
                    <p class="card-text"><b>Nama</b><?= '   :   ' . $pelanggan['nama_p'] ?></p>
                    <p class="card-text"><b>Alamat</b><?= '   :   ' . $pelanggan['alamat'] ?></p>
                    <p class="card-text"><small class="text-muted">Tanggal Daftar: <br><b><?= date('d F Y', strtotime($user['date_created'])); ?></b></small></p>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('pelanggan/MyProfile/ubahprofil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('pelanggan/MyProfile/ubahPassword'); ?>" class="text text-white"><i class="fas fa-key"></i> Ubah Password</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->