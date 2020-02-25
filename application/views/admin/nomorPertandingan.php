<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Nomor Pertandingan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Berikut ini adalah data nomor pertandingan.</h2>
            <div class="mb-4"> <a href="#" data-target="#tambahUser" data-toggle="modal" class="btn btn-info btn-block">Tambah Data</a></div>
            <!-- tabel data user -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Nomor Pertandingan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th>Nomor Pertandingan</th>
                                            <th>Kelompok</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($getAllNomorPertandingan as $dataNomor) {
                                        ?>
                                            <tr class="text-center">
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $dataNomor['nomorPertandingan']; ?></td>
                                                <td><?= $dataNomor['kelompok']; ?></td>
                                                <td><?= $dataNomor['kelas']; ?></td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="modal" data-target="#editNomor<?= $dataNomor['idNomorPertandingan'] ?>" class=" btn btn-info">Edit</a>
                                                    <a href="#" data-toggle="modal" data-target="#hapusNomor<?= $dataNomor['idNomorPertandingan'] ?>" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pertandingan/nomorPertandingan') ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Pertandingan</label>
                        <input type="text" class="form-control" name="nomorPertandingan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Pertandingan</label>
                        <select name="kelompok" id="" class="form-control">
                            <option value="">--Pilih Kelompok--</option>
                            <option value="SD">Sekolah Dasar/Sederajat</option>
                            <option value="SMP">Sekolah Menengah Pertama/Sederajat</option>
                            <option value="SMA">Sekolah Menengah Atas/Sederajat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Pertandingan</label>
                        <input type="text" class="form-control" name="kelas">
                        <small class="text-danger">Jika terdiri dari lebih dari 1 kelas gunakan pemisah menggunakan koma (,)</small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit -->
<?php

foreach ($getAllNomorPertandingan as $dataNomor2) {
?>
    <div class="modal fade" id="editNomor<?= $dataNomor2['idNomorPertandingan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pertandingan/editNomorPertandingan') ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Pertandingan</label>
                            <input type="text" class="form-control" name="nomorPertandingan" value="<?= $dataNomor2['nomorPertandingan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Pertandingan</label>
                            <select name="kelompok" id="" class="form-control">
                                <option value="<?= $dataNomor2['kelompok'] ?>"><?= $dataNomor2['kelompok'] ?></option>
                                <option value="">--Pilih Kelompok--</option>
                                <option value="Sekolah Dasar/Sederajat">Sekolah Dasar/Sederajat</option>
                                <option value="Sekolah Menengah Pertama/Sederajat">Sekolah Menengah Pertama/Sederajat</option>
                                <option value="Sekolah Menengah Atas/Sederajat">Sekolah Menengah Atas/Sederajat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Pertandingan</label>
                            <input type="text" class="form-control" name="kelas" value="<?= $dataNomor2['kelas'] ?>">
                            <small class="text-danger">Jika terdiri dari lebih dari 1 kelas gunakan pemisah menggunakan koma (,)</small>
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idNomorPertandingan" value="<?= $dataNomor2['idNomorPertandingan'] ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- modal edit -->
<?php

foreach ($getAllNomorPertandingan as $dataNomor3) {
?>
    <div class="modal fade" id="hapusNomor<?= $dataNomor3['idNomorPertandingan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Menghapus Nomor Pertandingan ini?</p>
                    <form action="<?= base_url('pertandingan/hapusNomorPertandingan') ?>" method="POST">
                        <input type="hidden" name="idNomorPertandingan" value="<?= $dataNomor3['idNomorPertandingan'] ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>