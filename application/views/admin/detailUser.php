<?php
foreach ($detailUser as $user) {
}
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profil</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="user-item">
                        <img alt="image" src="<?= base_url('assets/img/' . $user['fotoUser']) ?>" class="img-fluid">
                        <div class="user-details">
                            <div class="user-name"><?= $user['nama']; ?></div>
                            <div class="text-job text-muted">Aktif Sejak : <?= $user['tanggalUser']; ?></div>
                            <div class="user-cta">
                                <button class="btn btn-info" data-target="#gantifoto" data-toggle="modal">Ganti Foto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('user/editProses') ?>" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Nama" value="<?= $user['nama']; ?>" name="nama" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email" value="<?= $user['username']; ?>" name="username" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" value="<?= $user['hintPass']; ?>" name="password1" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" placeholder="Konfirmasi Password" value="<?= $user['hintPass']; ?>" name="password2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No Handphone 1 </label>
                                            <input type="text" class="form-control" placeholder="No Handphone 1" value="<?= $user['noHandphone1']; ?>" name="noHandphone1" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No Handphone 2</label>
                                            <input type="text" class="form-control" placeholder="No Handphone 2" value="<?= $user['noHandphone2']; ?>" name="noHandphone2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" name="alamatUser" required><?= $user['alamatUser']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Asal Sekolah/Club</label>
                                    <input type="text" class="form-control" value="<?= $user['asal']; ?>" name="asal">
                                </div>
                                <input type="hidden" class="form-control" value="<?= $user['idUser']; ?>" name="idUser">
                                <div class="form-group mt-3">
                                    <button type="submit" data-toggle="modal" data-target="#modalKonfirmasi" class="btn btn-primary btn-block">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- mofal ganti foto -->
<!-- Modal -->
<div class="modal fade" id="gantifoto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ganti Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('User/gantiFoto') ?>" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">

                        <label class="custom-file-label" for="customFile">Pilih File</label>
                        <small class="text-danger">Foto maks. 2Mb jenis JPG, JPEG & PNG</small>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idUser" value="<?= $user['idUser']; ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>