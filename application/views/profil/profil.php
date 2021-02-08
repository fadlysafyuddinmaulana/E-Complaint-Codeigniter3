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

    <?php
    $user = $this->session->userdata('userdata_desa');

    if ($user['akses'] == 'user') {
        $akses                  = 'User';
        $nomor                  = 'NIK';
        $proses                 = 'proses_username_penduduk';
        $id                     = $user['nik'];
        $nama                   = $user['nama'];
        $telp                   = $user['no_telp'];
        $folder_doc_foto        = 'Dokumen-Profile-Penduduk';
        $foto                   = $user['foto_penduduk'];
    } elseif ($user['akses'] == 'petugas') {
        $akses                  = 'Petugas';
        $nomor                  = 'Nomor Petugas';
        $proses                 = 'proses_username_petugas';
        $id                     = $user['nomor_petugas'];
        $nama                   = $user['nama_petugas'];
        $folder_doc_foto        = 'Dokumen-Profile-Penduduk';
        $telp                   = $user['no_telp'];
        $foto                   = $user['foto_petugas'];
    }
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img bg-dark img-fluid mt-2 mb-2 ml-2 mr-2" style="width: 12rem;" src="<?= base_url('upload/' . $folder_doc_foto . '/' . $foto) ?>" class="card-img" alt="...">
                            </div>

                            <h3 class="profile-username text-capitalize text-center"><?= $nama; ?></h3>

                            <p class="text-muted text-center"><?= $akses; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b><?= $nomor; ?></b> <a class="float-right"><?= $id; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>No.Telp</b> <a class="float-right"><?= $telp; ?></a>
                                </li>
                            </ul>

                            <a href="<?= base_url() ?>dashboard" style="width: 310px;" class="btn mb-2 btn-primary"><b>Back</b></a>
                            <a class="btn text-white btn-warning" style="width: 310px;" data-toggle="modal" data-target="#change-username-<?= $proses ?>"><b>Change Username</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change-username-<?= $proses ?>">
        <div class="modal-dialog modal-md">
            <form action="<?= base_url('profil/' . $proses . '/' . $id) ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" autocomplete="off" name="username_lama" value="<?= $user['username']; ?>" id="username_lama" class="form-control" autocomplete="off">
                                <input type="text" autocomplete="off" name="username_baru" id="username_baru" class="form-control" autocomplete="off">
                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn ml-auto btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->