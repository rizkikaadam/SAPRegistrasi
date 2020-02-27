<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Konfimasi</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Berikut ini adalah data Konfirmasi.</h2>
            <!-- tabel data Atlet -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Konfirmasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Harus Di Bayar</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($konfirmasi as $s) {
                                        ?>
                                            <tr>
                                                <td><a href="#"><?= $s['noInvoice'] ?></a></td>
                                                <td><?= $s['tglKonfirmasi'] ?></td>
                                                <td><?= number_format($s['jumlahBayar']);  ?></td>
                                                <td><?= number_format($s['jmlTransfer']);  ?></td>
                                                <td><?= "<a href=" . base_url('assets/bukti/' . $s['bukti']) . " target='_blank'>Lihat</a>"  ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Konfirmasi</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- modal tambah -->
<!-- Modal -->
<div class="modal fade" id="verifikasi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan menerima konfirmasi pembayaran ini?</p>
                <form action="<?= base_url('Invoice/konfirmasiProses') ?>" method="post" enctype="multipart/form-data">
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idInvoice" value="<?= $Atlet['idInvoice']; ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>