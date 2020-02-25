<?php
include "template/head.php";
include "template/topbar.php";
include "template/menu.php";
?>
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <select class="form-control select2">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div class="section-title">Foto</div>
                        <div class="custom-file">
                            <label>Foto</label>
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                        <div class="section-title">Dokumen Akte</div>
                        <div class="custom-file">
                            <label>Dokumen Akte</label>
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                        <div class="section-title">Dokumen Lainnya</div>
                        <div class="custom-file">
                            <label>Dokumen Lainnya</label>
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" data-toggle="modal" data-target="#modalKonfirmasi" class="btn btn-primary btn-block">Simpan</button>
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
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <button type="button" class="btn btn-primary">Ya</button>
            </div>
        </div>
    </div>
</div>
<!-- modal konfirmasi -->

<?php
include "template/footer.php";
?>