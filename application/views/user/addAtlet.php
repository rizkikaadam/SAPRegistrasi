<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Atlet</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item "><a href="#">Data Atlet</a></div>
                <div class="breadcrumb-item active">Tambah Data Atlet</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Silahkan lengkapi Formulir untuk mendaftarkan atlet.</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Formulir Pendaftaran Atlet</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('atlet/atletUser') ?>" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="exampleInput">Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="section-title">Foto</div>
                        <div class="form-group">
                            <input type="file" class="form-control" id="exampleFormControlFile1" name="foto">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <div class="section-title">Dokumen Akte</div>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="exampleFormControlFile1" name="akte">
                                </div>
                            </div>
                            <div class="col">
                                <div class="section-title">Dokumen Lainnya</div>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="exampleFormControlFile1" name="dok">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="section-title">Nomor Pertandingan</div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="exampleInput" class="text-primary"> <b> Kelompok SD</b></label>
                                <?php
                                foreach ($nomorPertandingan as $dataNomorPertandingan) {
                                    if ($dataNomorPertandingan['kelompok'] == 'SD') {

                                        echo "<div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='nomorPertandingan[]' value='" . $dataNomorPertandingan['idNomorPertandingan'] . "' id='defaultCheck3'>
                                <label class='form-check-label' for='defaultCheck3'>
                                    " . $dataNomorPertandingan['nomorPertandingan'] . " 
                                </label>
                            </div>";
                                    }
                                }
                                ?>

                            </div>
                            <div class="col">
                                <label for="exampleInput" class="text-primary"> <b> Kelompok SMP</b></label>
                                <?php
                                foreach ($nomorPertandingan as $dataNomorPertandingan) {
                                    if ($dataNomorPertandingan['kelompok'] == 'SMP') {

                                        echo "<div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='nomorPertandingan[]' value='" . $dataNomorPertandingan['idNomorPertandingan'] . "' id='defaultCheck3'>
                                <label class='form-check-label' for='defaultCheck3'>
                                    " . $dataNomorPertandingan['nomorPertandingan'] . " 
                                </label>
                            </div>";
                                    }
                                }
                                ?>

                            </div>
                            <div class="col">
                                <label for="exampleInput" class="text-primary"> <b> Kelompok SMA</b></label>
                                <?php
                                foreach ($nomorPertandingan as $dataNomorPertandingan) {
                                    if ($dataNomorPertandingan['kelompok'] == 'SMA') {

                                        echo "<div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='nomorPertandingan[]' value='" . $dataNomorPertandingan['idNomorPertandingan'] . "' id='defaultCheck3'>
                                <label class='form-check-label' for='defaultCheck3'>
                                    " . $dataNomorPertandingan['nomorPertandingan'] . " (" . $dataNomorPertandingan['kelas'] . ")
                                </label>
                            </div>";
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-whitesmoke">
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal konfirmasi -->
<!-- <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda ingin menambah atlet lagi?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
        </div>
    </div>
</div> -->
<!-- modal konfirmasi -->