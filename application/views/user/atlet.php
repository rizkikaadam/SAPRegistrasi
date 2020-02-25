<?php
include "template/head.php";
include "template/topbar.php";
include "template/menu.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Atlet</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Atlet</a></div>
            </div>
        </div>

        <div class="section-body">

            <h2 class="section-title">Berikut ini adalah data atlet yang sudah di daftarkan</h2>
            <div class="mb-4"> <a href="addAtlet.php" class="btn btn-info btn-block">Tambah Atlet</a></div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Atlet</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No.
                                    </th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Asal Sekolah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>Dimas Febrian</td>
                                    <td>2018-01-20</td>
                                    <td>SDN Jember Sari</td>
                                    <td>
                                        <div class="badge badge-success">Sukses Verifikasi</div>
                                        <div class="badge badge-info">Dalam Verifikasi</div>
                                        <div class="badge badge-danger">Tidak Lolos Verifikasi</div>
                                    </td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke">

                </div>
            </div>
        </div>
    </section>
</div>

<?php
include "template/footer.php";
?>