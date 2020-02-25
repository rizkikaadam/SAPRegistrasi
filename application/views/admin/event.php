<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Event</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Berikut ini adalah data user yang terdaftar.</h2>
            <div class="mb-4"> <a href="#" data-target="#tambahUser" data-toggle="modal" class="btn btn-info btn-block">Tambah User</a></div>
            <!-- tabel data user -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Event</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th>Event</th>
                                            <th>Tanggal</th>
                                            <th>Pendaftaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($getAllEvent as $dataEvent) {
                                        ?>
                                            <tr class="text-center">
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $dataEvent['namaEvent']; ?></td>
                                                <td><?= $dataEvent['tglEventMulai'] . " S.D. " . $dataEvent['tglEventSelesai']; ?></td>
                                                <td><?= $dataEvent['tglPendaftaranMulai'] . " S.D. " . $dataEvent['tglPendaftaranSelesai']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('Event/edit/' . $dataEvent['idEvent']) ?>" class="btn btn-secondary">Detail</a>
                                                    <a href="#" data-target="#hapus<?= $dataEvent['idEvent'] ?>" data-toggle="modal" class="btn btn-danger">Hapus</a>
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
                <h5 class="modal-title text-center" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('event/'); ?>">
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInputEmail1">Nama Event</label>
                            <input type="text" name="namaEvent" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInput">Tanggal Mulai</label>
                            <input type="date" name="tglEventMulai" class="form-control" id="exampleInput">
                        </div>
                        <div class="col">
                            <label for="exampleInput">Tanggal Selesai</label>
                            <input type="date" name="tglEventSelesai" class="form-control" id="exampleInput">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="exampleInput">Tanggal Pendaftaran Awal</label>
                            <input type="date" name="tglPendaftaranMulai" class="form-control" id="exampleInput">
                        </div>
                        <div class="col">
                            <label for="exampleInput">Tanggal Pendaftaran Akhir</label>
                            <input type="date" name="tglPendaftaranSelesai" class="form-control" id="exampleInput">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInput">Deskripsi Event</label>
                        <textarea name="deskripsiEvent" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput">Keterangan Event</label>
                        <textarea class="form-control" name="keteranganUser" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat</label>
                        <input type="text" class="form-control" name="tempat" id="exampleInput">
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
foreach ($getAllEvent as $dataNomor3) {
?>
    <div class="modal fade" id="hapus<?= $dataNomor3['idEvent'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Menghapus Event Pertandingan ini?</p>
                    <form action="<?= base_url('event/hapus') ?>" method="POST">
                        <input type="hidden" name="idEvent" value="<?= $dataNomor3['idEvent'] ?>">

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