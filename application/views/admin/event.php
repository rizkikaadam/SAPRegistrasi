<?php
include "template/head.php";
include "template/menu.php";
?>
<!-- Main Content -->
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
                                        <tr class="text-center">
                                            <td class="text-center">4</td>
                                            <td>Armina Pratama</td>
                                            <td>armina@gmail.com</td>
                                            <td>SDN Banjarsari Bandung</td>
                                            <td class="text-center">
                                                <div class="badge badge-success">Aktif</div>
                                                <div class="badge badge-danger">Non-Aktif</div>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-secondary">Detail</a>
                                                <a href="#" class="btn btn-info">Edit</a>
                                                <a href="#" class="btn btn-danger">Non-Aktif</a>
                                            </td>
                                        </tr>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
include "template/footer.php";
?>