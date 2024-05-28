<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


        <a href="" class="badge badge-primary mt-2 mb-5" data-toggle="modal" data-target="#penggunaanBaruModal"><i class="fas fa-plus ">Tambah</i></a>

        <?php

        function cek($id)
        {
            $conn = new mysqli("localhost", "root", "", "jourdan_19200833");
            $sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tagihan WHERE id_penggunaan='$id' AND status='Lunas'"));
            return $sql;
        }
        ?>

        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        <?php
        function bulan($bulan)
        {
            switch ($bulan) {
                case '01':
                    $bln = "Januari";
                    break;
                case '02':
                    $bln = "Februari";
                    break;
                case '03':
                    $bln = "Maret";
                    break;
                case '04':
                    $bln = "April";
                    break;
                case '05':
                    $bln = "Mei";
                    break;
                case '06':
                    $bln = "Juni";
                    break;
                case '07':
                    $bln = "Juli";
                    break;
                case '08':
                    $bln = "Agustus";
                    break;
                case '09':
                    $bln = "September";
                    break;
                case '10':
                    $bln = "Oktober";
                    break;
                case '11':
                    $bln = "November";
                    break;
                case '12':
                    $bln = "Desember";
                    break;
                default:
                    $bln = "";
                    break;
            }
            echo $bln;
        }
        ?>


        <table id="tabel-data" class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Penggunaan</th>
                    <th>Id Pelanggan</th>
                    <th>Nama</th>
                    <th>Bulan</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Tanggal Cek</th>
                    <th>Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($penggunaan as $a) {
                    $cek = cek($a['id_penggunaan']); ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['id_penggunaan']; ?></td>
                        <td><?= $a['id_pelanggan']; ?></td>
                        <td><?= $a['nama_p']; ?></td>
                        <td><?= bulan($a['bulan']) ?> <?= $a['tahun']; ?></td>
                        <td><?= $a['meter_awal']; ?></td>
                        <td><?= $a['meter_akhir']; ?></td>
                        <td><?= $a['tgl_cek']; ?></td>
                        <td><?= $a['nama'];; ?></td>
                        <td>
                            <?php
                            if ($cek == 0) { ?>
                                <a href="<?= base_url('admin/penggunaan/hapusPenggunaan/') . $a['id_penggunaan']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i>Hapus</a>
                            <?php } else { ?>
                                &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <!-- <script>
                $(document).ready(function() {
                    $('#tabel-data').DataTable();
                });
            </script> -->
        </table>
    </div>

    <!-- Modal Tambah penggunaan baru-->
    <div class=" modal fade" id="penggunaanBaruModal" tabindex="-1" role="dialog" aria-labelledby="penggunaanBaruModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="penggunaanBaruModal">Tambah Penggunaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/penggunaan/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "jourdan_19200833");
                            ?>

                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-3">
                                <input type="text" class="form-control form-control-user" readonly id="id_penggunaan" name="id_penggunaan" value="<?php echo ($id_penggunaan) ?>">
                            </div>
                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-2">
                                <select name="id_pelanggan" data-live-search="true" data-style="btn-primary" id="id_pelanggan" class="selectpicker form-control mb-3" onchange='changeValue(this.value)'>
                                    <option value="">Id Pelanggan</option>
                                    <?php
                                    $result = mysqli_query($con, "SELECT * FROM pelanggan ORDER BY date_created DESC");
                                    $jsArray = "var prdName = new Array();\n";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option    value="' . $row['id_pelanggan'] . '">' . $row['id_pelanggan'] . '</option>';
                                        $jsArray .= "prdName['" . $row['id_pelanggan'] . "'] = {nama_p:'" . addslashes($row['nama_p']) . "'};\n";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 input-group-sm mb-3 mt-3">
                                <select autocomplete="off" name="bulan" class="form-control form-control-user">
                                    <option>Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mt-3 mb-3">
                                <input autocomplete="off" type="text" class="form-control form-control-user datepickerYEAR" id="tahun" name="tahun" placeholder="Tahun">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm  mb-3">
                                <input readonly type="text" class="form-control form-control-user" id="nama_p" name="nama_p" placeholder="Nama">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="meter_awal" name="meter_awal" placeholder="Meter Awal">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input type="text" class="form-control form-control-user" id="meter_akhir" name="meter_akhir" placeholder="Meter Akhir">
                            </div>

                            <div class="form-group col-sm-3 input-group-sm mb-3">
                                <input autocomplete="off" type="text" class="form-control form-control-user datepicker" id="tgl_cek" name="tgl_cek" placeholder="Tanggal Cek">
                            </div>



                            <div class="col-sm-4 input-group-sm mb-3">
                                <input type="hidden" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                                <input type="hidden" class="form-control form-control-user" id="id_tagihan" name="id_tagihan" value="<?php echo ($id_tagihan) ?>">
                            </div>

                            <div class="modal-footer float-left">
                                <button type="button" class="btn btn-secondary ml-0" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
            </div>
            <script type="text/javascript">
                <?php echo $jsArray; ?>

                function changeValue(id) {
                    document.getElementById('nama_p').value = prdName[id].nama_p;
                };
            </script>
            </form>
        </div>
    </div>
</div>

<!-- End of Modal Tambah penggunaan -->