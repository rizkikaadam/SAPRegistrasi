<?php
foreach ($detailAtlet as $Atlet) {
}


?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Atlet</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="user-item">
                        <a href="#" data-toggle="modal" data-target="#gantiFoto"><img alt="image" src="<?= base_url('assets/img/' . $Atlet['fotoAtlet']) ?>" class="img-fluid"></a>
                        <div class="user-details">
                            <div class="user-name">
                                <h2><?= $Atlet['namaAtlet']; ?></h2>
                            </div>
                            <div class="text-job text-muted">
                                <?php
                                foreach ($sekolah as $sekolahAtlet) {
                                    if ($sekolahAtlet['jenjang'] == 'SD') {
                                        echo "<span class='badge badge-secondary'><b>" . $sekolahAtlet['namaSekolah'] . "</b></span>";
                                    }
                                    if ($sekolahAtlet['jenjang'] == 'SMP') {
                                        echo "<span class='badge badge-warning'><b>" . $sekolahAtlet['namaSekolah'] . "</b></span>";
                                    }
                                    if ($sekolahAtlet['jenjang'] == 'SMA') {
                                        echo "<span class='badge badge-info'><b>" . $sekolahAtlet['namaSekolah'] . "</b></span>";
                                    }
                                }
                                ?>
                            </div> <a href="#" class="text-xs">Edit Sekolah</a> | <a href="#" class="text-xs">Tambah Sekolah</a>
                            <div class="user-cta">
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
                            <form action="<?= base_url('atlet/editProses') ?>" method="post">
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" name="nama" class="form-control" required value="<?= $Atlet['namaAtlet']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="exampleInputPassword1">Tempat Lahir</label>
                                        <input type="text" name="tmpLahir" class="form-control" required value="<?= $Atlet['tempatLahir']; ?>">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                                        <input type="date" name="tglLahir" class="form-control" required value="<?= $Atlet['tanggalLahir']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInput">Alamat</label>
                                    <textarea name="alamatAtlet" class="form-control" id="" cols="30" rows="10"><?= $Atlet['alamatAtlet']; ?></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="hidden" name="idAtlet" value="<?= $Atlet['idAtlet']; ?>">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Dokumen -->
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Dokumen Atlet</h4>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer bg-whitesmoke">
                        </div>
                    </div>
                </div>
                <!-- nomor pertandingan -->
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nomor Pertandingan</h4>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer bg-whitesmoke">
                        </div>
                    </div>
                </div>
                <!-- history pertandingan -->
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Prestasi</h4>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer bg-whitesmoke">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="gantiFoto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ganti Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Atlet/gantiFoto') ?>" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">

                        <label class="custom-file-label" for="customFile">Pilih File</label>
                        <small class="text-danger">Foto maks. 2Mb jenis JPG, JPEG & PNG</small>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idAtlet" value="<?= $Atlet['idAtlet']; ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>