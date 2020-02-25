<?php
foreach ($detailEvent as $event) {
}
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Event</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="user-item">
                        <img alt="image" src="<?= base_url('assets/img/' . $event['fotoEvent']) ?>" class="img-fluid">
                        <div class="user-details">
                            <div class="user-name"><?= $event['namaEvent']; ?></div>
                            <div class="user-cta">
                                <button class="btn btn-info" data-target="#gantifoto" data-toggle="modal">Ganti Foto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Event</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('event/editProses') ?>" method="post">
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">Nama Event</label>
                                        <input type="text" name="namaEvent" class="form-control" value="<?= $event['namaEvent']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="exampleInput">Tanggal Mulai</label>
                                        <input type="date" name="tglEventMulai" class="form-control" id="exampleInput" value="<?= $event['tglEventMulai']; ?>">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInput">Tanggal Selesai</label>
                                        <input type="date" name="tglEventSelesai" class="form-control" id="exampleInput" value="<?= $event['tglEventSelesai']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="exampleInput">Tanggal Pendaftaran Awal</label>
                                        <input type="date" name="tglPendaftaranMulai" class="form-control" id="exampleInput" value="<?= $event['tglPendaftaranMulai']; ?>">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInput">Tanggal Pendaftaran Akhir</label>
                                        <input type="date" name="tglPendaftaranSelesai" class="form-control" id="exampleInput" value="<?= $event['tglPendaftaranSelesai']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInput">Deskripsi Event</label>
                                    <textarea name="deskripsiEvent" class="form-control" id="" cols="30" rows="10"><?= $event['deskripsiEvent']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Keterangan Event</label>
                                    <textarea class="form-control" name="keteranganEvent" id="" cols="30" rows="10"><?= $event['keteranganEvent']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tempat</label>
                                    <input type="text" class="form-control" name="tempat" id="exampleInput" value="<?= $event['tempat']; ?>">
                                </div>
                                <input type="hidden" class="form-control" value="<?= $event['idEvent']; ?>" name="idEvent">
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
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
                <form action="<?= base_url('Event/gantiFoto') ?>" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">

                        <label class="custom-file-label" for="customFile">Pilih File</label>
                        <small class="text-danger">Foto maks. 2Mb jenis JPG, JPEG & PNG</small>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idEvent" value="<?= $event['idEvent']; ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>