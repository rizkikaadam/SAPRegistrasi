<?php
include "template/head.php";
include "template/topbar.php";
include "template/menu.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>My Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Profile</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">My Profile</h2>
            <div class="row">
                <div class="col-lg-3">
                    <div class="user-item">
                        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="img-fluid">
                        <div class="user-details">
                            <div class="user-name">Hasan Basri</div>
                            <div class="text-job text-muted">..</div>
                            <div class="user-cta">
                                <button class="btn btn-info follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Ganti Foto</button>
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
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" placeholder="Konfirmasi Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No Handphone 1 </label>
                                            <input type="text" class="form-control" placeholder="No Handphone 1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No Handphone 2</label>
                                            <input type="text" class="form-control" placeholder="No Handphone 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat"></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="button" data-toggle="modal" data-target="#modalKonfirmasi" class="btn btn-primary btn-block">Simpan Perubahan</button>
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
                Apakah anda yakin akan merubah data profile anda?
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