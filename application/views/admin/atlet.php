<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Atlet</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Berikut ini adalah data Atlet.</h2>
            <div class="row">
                <div class="mb-4 col-6"> <a href="#" data-target="#tambahUser" data-toggle="modal" class="btn btn-info btn-block">Tambah Atlet</a></div>
                <div class="mb-4 col-6"> <a href="#" data-target="#importData" data-toggle="modal" class="btn btn-danger btn-block">Import Data Atlet</a></div>
            </div>
            <!-- tabel data Atlet -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Atlet</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th>Nama</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Asal Sekolah</th>
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
                                                <td>Asal Sekolah</td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($dataAtlet['statusAtlet'] == '1') {
                                                        echo "<div class='badge badge-success'>Aktif</div>";
                                                    } else {
                                                        echo "<div class='badge badge-danger'>Non-Aktif</div>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('atlet/edit/' . $dataAtlet['idAtlet']) ?>" class="btn btn-secondary">Detail</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- modal tambah -->
<div class="modal fade bd-example-modal-lg" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Atlet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('atlet/'); ?>" method="POST">
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInputPassword1">Tempat Lahir</label>
                            <input type="text" name="tmpLahir" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" name="tglLahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInput">Jenjang</label>
                            <select name="jenjang" id="" class="form-control" required>
                                <option value="">--Pilih Jenjang Pendidikan</option>
                                <option value="SD">Sekolah Dasar</option>
                                <option value="SMP">Sekolah Menegah Pertama</option>
                                <option value="SMA">Sekolah Menegah Atas</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInput">Asal Sekolah</label>
                            <input type="text" name="namaSekolah" class="form-control" placeholder="Nama Sekolah" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInput">Alamat</label>
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
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

<!-- modal export -->
<div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Import File</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-danger">Harap unduh dulu format file untuk import data, jika belum dapat download <a href="">Disini.</a></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pendaftar</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Pendaftar juga sebagai pendamping</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pendamping</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Sudah Verifikasi Offline</label>
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