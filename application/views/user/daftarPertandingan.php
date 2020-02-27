<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pembayaran</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Detail Pendaftaran</h2>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        Sekolah Atletik Padjajaran<br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Nomor Pertandingan</div>
                            <!-- <p class="section-lead">All items here cannot be deleted.</p> -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Rincian</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Peserta</td>
                                        <td class="text-center"><?= $jumlahAtlet; ?> Orang</td>
                                        <td class="text-center">-</td>
                                        <td class="text-right">-</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Nomor Perlombaan</td>
                                        <td class="text-center"><?= $getJumlahPerlombaan; ?></td>
                                        <td class="text-right">Rp 25.000</td>
                                        <?php
                                        //hitung jumlah * harga
                                        $jumlahPerlombaan = $getJumlahPerlombaan * 25000;
                                        $jumlahestafet = $getJumlahestafet * 40000;
                                        $total = $jumlahPerlombaan + $jumlahestafet;

                                        ?>
                                        <td class="text-right">Rp <?= number_format($jumlahPerlombaan); ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Nomor Estafet</td>
                                        <td class="text-center"><?= $getJumlahestafet; ?></td>
                                        <td class="text-right">Rp 45.000</td>
                                        <td class="text-right">Rp <?= number_format($jumlahestafet); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <p class="section-lead"></p>
                                    <div class="images">

                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <!-- <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">Rp 3.000.000</div>
                                    </div> -->
                                    <!-- <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Pajak 10%</div>
                                        <div class="invoice-detail-value">Rp 30.000</div>
                                    </div> -->
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">Rp <?= number_format($total); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-lg">
                    <?php
                    if ($statusDaftar == NULL) {

                    ?>
                        <form action="<?= base_url('pertandingan/addDaftar'); ?>" method="post">
                            <div class="form-group row">
                                <div class="col text-right">
                                    <input class='form-check-input' type='checkbox' name='pendaftar' value='pendamping'>
                                    <label class='' for='defaultCheck3'>Pendaftar Sebagai pendamping</label>
                                </div>
                            </div>
                            <h5 class="text-danger text-body"> <b> * Jika Pendaftar bukan pendamping harap diisi</b></h5>
                            <div class=" form-group row">
                                <div class="col">
                                    <input class="form-control" type="text" name="pendamping" placeholder="Nama  Pendamping">
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="noHandphone" placeholder="No. Handphone (WA)">
                                </div>
                            </div>
                            <input type="hidden" name="total" value="<?= $total; ?>">
                            <input type="hidden" name="jumlahAtlet" value="<?= $jumlahAtlet; ?>">
                            <button type="submit" class="btn btn-success btn-icon icon-left btn-block">Daftar</button>
                        </form>
                    <?php
                    } else {
                        echo "Status";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>