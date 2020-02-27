<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Invoice</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Berikut ini adalah data Invoice.</h2>
            <!-- tabel data Atlet -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Invoice</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($getAllInvoice as $invoice) {
                                        ?>
                                            <tr>
                                                <td><a href="#"><?= $invoice['noInvoice'] ?></a></td>
                                                <td class="font-weight-600"><?= $invoice['tanggalInvoice'] ?></td>
                                                <td><?= $invoice['jumlahBayar'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($invoice['status'] == '1') {
                                                        echo "<div class='badge badge-success'>Sudah Bayar</div>";
                                                    } else {
                                                        echo "<div class='badge badge-danger'>Belum Bayar</div>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('invoice/konfirmasi?id=' . $invoice['idInvoice']); ?>" class="btn btn-secondary">Detail</a>
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