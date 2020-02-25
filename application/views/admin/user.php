<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Berikut ini adalah data user yang terdaftar.</h2>
            <div class="mb-4"> <a href="#" data-target="#tambahUser" data-toggle="modal" class="btn btn-info btn-block">Tambah User</a></div>
            <!-- tabel data user -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
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
                                            <th>Email</th>
                                            <th>Asal Sekolah/Club</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($getAllUser as $dataUser) {
                                        ?>
                                            <tr class="text-center">
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $dataUser['nama']; ?></td>
                                                <td><?= $dataUser['username']; ?></td>
                                                <td><?= $dataUser['asal']; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($dataUser['status'] == '1') {
                                                        echo "<div class='badge badge-success'>Aktif</div>";
                                                    } else {
                                                        echo "<div class='badge badge-danger'>Non-Aktif</div>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('user/edit/' . $dataUser['idUser']) ?>" class="btn btn-secondary">Detail</a>
                                                    <a href="#" data-toggle="modal" data-target="#nonAktif<?= $dataUser['idUser']; ?>" class="btn btn-danger">Non-Aktif</a>
                                                </td>
                                            </tr>
                                        <?php } //endforeach
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
<div class="modal fade bd-example-modal-lg" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('User/'); ?>">
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password1" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1">Konfirmasi Password</label>
                            <input type="password" name="password2" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInput">No Handphone 1</label>
                            <input type="text" name="noHandphone1" class="form-control" id="exampleInput">
                        </div>
                        <div class="col">
                            <label for="exampleInput">No Handphone 2</label>
                            <input type="text" name="noHandphone2" class="form-control" id="exampleInput">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInput">Alamat</label>
                        <textarea name="alamatUser" class="form-control" name="alamatUser" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Asal Klub/Sekolah</label>
                        <input type="text" class="form-control" name="asal" id="exampleInput">
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
foreach ($getAllUser as $dataUser2) {
?>
    <!-- modal nonaktif -->
    <div class="modal fade" tabindex="-1" role="dialog" id="nonAktif<?= $dataUser2['idUser']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin akan non aktifkan user ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="<?= base_url('user/nonaktif') ?>" method="post">
                        <input type="hidden" name="idUser" value="<?= $dataUser2['idUser']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
?>