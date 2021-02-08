<?php
$user = $this->session->userdata('userdata_desa');

if ($user['akses'] == 'admin') {
    $id                 = $user['id_admin'];
    $nama               = $user['nama_admin'];
    $variable_input     = 'id_admin';
    $proses_password    = 'proses_password_admin';
} elseif ($user['akses'] == 'user') {
    $id                 = $user['nik'];
    $nama               = $user['nama'];
    $variable_input     = 'nik';
    $proses_password    = 'proses_password_penduduk';
} elseif ($user['akses'] == 'petugas') {
    $id                 = $user['id_petugas'];
    $nama               = $user['nama_petugas'];
    $variable_input     = 'id_petugas';
    $proses_password    = 'proses_password_petugas';
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('profil/' . $proses_password . '/' . $id) ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="password_lama" id="password_lama" autocomplete="off" placeholder="Password Lama">
                                </div>
                                <div class="form-group">
                                    <label for="">Password Baru</label>
                                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password Baru">
                                </div>
                                <div class="form-group">
                                    <label for="">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password-verfication" id="password-verfication" autocomplete="off" placeholder="Konfitmasi Password">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>