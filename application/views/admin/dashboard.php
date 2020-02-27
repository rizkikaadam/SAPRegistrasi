<!-- Main Content -->
<div class="main-content ">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Page</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlahUser; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-running fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Atlet</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlahAtlet; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-trophy fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Event</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlahEvent; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-user-check fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Atlet Verifikasi</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlahAtletVerifikasi; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- fitur shortcut -->
        <h2 class="section-title">Menu Pintas</h2>

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="card-body">
                        <h4>Pendaftaran</h4>
                        <p>Untuk pendaftaran event</p>
                        <a href="#" class="card-cta">Klik Disini <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-danger text-white">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-body">
                        <h4>Konfirmasi Pembayaran</h4>
                        <p>Untuk melihat konfirmasi pembayaran yang telah dilakukan</p>
                        <a href="#" class="card-cta">Klik Disini <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-info text-white">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card-body">
                        <h4>Formulir Pendaftaran</h4>
                        <p>Format file pendaftaran untuk dapat di import kedalam sistem.</p>
                        <a href="#" class="card-cta">Klik Disini <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-warning text-white">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="card-body">
                        <h4>Tambah Event</h4>
                        <p>untuk menambah event pertandingan.</p>
                        <a href="<?= base_url('Event/') ?>" class="card-cta">Klik Disini <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- fitur invoice -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-file-invoice"></i> Data Invoice</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('Invoice') ?>" class="btn btn-danger">Lihat Lainnya <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                foreach ($getAllInvoice as $invoice) {
                                ?>
                                    <tr>
                                        <td><a href="#"><?= $invoice['noInvoice'] ?></a></td>
                                        <td class="font-weight-600"><?= $invoice['tanggalInvoice'] ?></td>
                                        <td><?= $invoice['jumlahBayar'] ?></td>
                                        <td>Status/td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>