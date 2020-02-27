<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Atlet</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Atlet</a></div>
            </div>
        </div>

        <div class="section-body">

            <h2 class="section-title">Berikut ini adalah data atlet yang sudah di daftarkan</h2>
            <div class="mb-4"> <a href="<?= base_url('atlet/addAtletUser'); ?>" class="btn btn-info btn-block">Tambah Atlet</a></div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Atlet</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No.
                                    </th>
                                    <th>Nama</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getAllAtlet as $dataAtlet) {
                                ?>
                                    <tr class="text-center">
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $dataAtlet['namaAtlet']; ?></td>
                                        <td><?= $dataAtlet['tempatLahir'] . "," . $dataAtlet['tanggalLahir']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($dataAtlet['verifikasi'] == '0') {
                                                echo "<div class='badge badge-warning'>Belum Verifikasi</div>";
                                            } else {
                                                echo "<div class='badge badge-success'>Sudah Verifikasi</div>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Atlet/profileAtlet?id=' . $dataAtlet['idAtlet']); ?>" class="btn btn-secondary">Detail</a>
                                            <a href="#" data-target="#nonAktif<?= $dataAtlet['idAtlet']; ?>" data-toggle="modal" class="btn btn-danger">Non-Aktif</a>
                                        </td>
                                    </tr>
                                <?php

                                    # code...
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke">

                    <?php
                    if ($statusDaftar == NULL) {

                    ?>
                        <a href="<?= base_url('Pertandingan/daftar'); ?>" class="btn btn-danger btn-block">Daftar Pertandingan</a>

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
<?php
foreach ($getAllAtlet as $dataAtlet2) {
?>
    <!-- modal nonaktif -->
    <div class="modal fade" tabindex="-1" role="dialog" id="nonAktif<?= $dataAtlet2['idAtlet']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin akan non aktifkan atlet ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="<?= base_url('atlet/nonaktif') ?>" method="post">
                        <input type="hidden" name="idAtlet" value="<?= $dataAtlet2['idAtlet']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
?>