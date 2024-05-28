        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Content Row1 -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="alert bg-primary" role="alert">
                            <h4 class="text-center text-light">Laporan Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/Laporan/laporan_pelanggan_pdf'); ?>" method="post">
                                <div class="col mb-3">
                                    <input type="submit" class="btn btn-outline-primary form-control " value="PDF" formtarget="_blank">
                                </div>
                            </form>
                            <form action="<?= base_url('admin/Laporan/print_pelanggan'); ?>" method="post">
                                <div class="col mb-3">
                                    <input type="submit" class="btn btn-outline-primary form-control " value="PRINT" formtarget="_blank">
                                </div>
                            </form>
                            <form action="<?= base_url('admin/Laporan/excel_pelanggan'); ?>" method="post">
                                <div class="col">
                                    <input type="submit" class="btn btn-outline-primary form-control " value="EXCEL" formtarget="_blank">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="alert bg-primary" role="alert">
                            <h4 class="text-center text-light">Laporan Tarif</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/Laporan/laporan_tarif_pdf'); ?>" method="post">
                                <div class="col mb-3">
                                    <input type="submit" class="btn btn-outline-primary form-control " value="PDF" formtarget="_blank">
                                </div>
                            </form>
                            <form action="<?= base_url('admin/Laporan/print_tarif'); ?>" method="post">
                                <div class="col mb-3">
                                    <input type="submit" class="btn btn-outline-primary form-control " value="PRINT" formtarget="_blank">
                                </div>
                            </form>
                            <form action="<?= base_url('admin/Laporan/excel_tarif'); ?>" method="post">
                                <div class="col">
                                    <input type="submit" class="btn btn-outline-primary form-control " value="EXCEL" formtarget="_blank">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="alert bg-primary" role="alert">
                            <h4 class="text-center text-light">Laporan User</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/Laporan/laporan_user_pdf'); ?>" method="post">
                                <input type="submit" class="btn btn-outline-primary form-control mb-3" value="PDF" formtarget="_blank">
                            </form>
                            <form action="<?= base_url('admin/Laporan/print_user'); ?>" method="post">
                                <input type="submit" class="btn btn-outline-primary form-control mb-3" value="PRINT" formtarget="_blank">
                            </form>
                            <form action="<?= base_url('admin/Laporan/excel_user'); ?>" method="post">
                                <input type="submit" class="btn btn-outline-primary form-control" value="EXCEL" formtarget="_blank">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row1 -->
            </div>

            <!-- Content Row2 -->
            <div class="row">
                <div class="col-md-4 mt-5 mb-5">
                    <div class="card">
                        <div class="alert bg-success" role="alert">
                            <h4 class="text-center text-light">Laporan Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/Laporan/pembayaran'); ?>" method="post">
                                <input autocomplete="off" type="text" class="form-control form-control-user datepicker mb-2" id="tgl_awal" name="tgl_awal" placeholder="Dari tanggal" required>

                                <input autocomplete="off" type="text" class="form-control form-control-user datepicker mb-3" id="tgl_akhir" name="tgl_akhir" placeholder="Sampai tanggal" required>

                                <button type="submit" class="btn btn-success btn-sm " formtarget="_blank">Cetak</button>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-5 mb-5">
                    <div class="card">
                        <div class="alert bg-success" role="alert">
                            <h4 class="text-center text-light">Laporan Tagihan</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/Laporan/laporan_tagihan_pdf'); ?>" method="post">
                                <input type="submit" class="btn btn-outline-success form-control mb-3" value="PDF" formtarget="_blank">
                            </form>
                            <form action="<?= base_url('admin/Laporan/print_tagihan'); ?>" method="post">
                                <input type="submit" class="btn btn-outline-success form-control mb-3" value="PRINT" formtarget="_blank">
                            </form>
                            <form action="<?= base_url('admin/Laporan/excel_tagihan'); ?>" method="post">
                                <input type="submit" class="btn btn-outline-success form-control" value="EXCEL" formtarget="_blank">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end row2 -->
            </div>



            <!-- end container -->
        </div>