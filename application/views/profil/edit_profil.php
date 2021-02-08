<?php
$user = $this->session->userdata('userdata_desa');

if ($user['akses'] == 'admin') {
    $id                 = $user['id_admin'];
    $nama               = $user['nama_admin'];
    $foto               = $user['foto_admin'];
    $variable_id        = 'id_admin';
    $variable_name      = 'nama_admin';
    $proses_profil      = 'edit_proses_admin';
} elseif ($user['akses'] == 'user') {
    $id                 = $user['nik'];
    $nama               = $user['nama'];
    $foto               = $user['foto_penduuduk'];
    $variable_id        = 'nik';
    $variable_name      = 'nama';
    $proses_profil      = 'edit_proses_penduduk';
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
                <div class="col-7">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profil</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('profil/' . $proses_profil . '/' . $id) ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Anda</label>
                                    <input type="hidden" name="id_admin" value="<?= $id; ?>">
                                    <input type="text" class="form-control" value="<?= $nama; ?>" name="<?= $variable_name; ?>" autocomplete="off" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="<?= $profil['tempat_lahir']; ?>" name="tempat_lahir" autocomplete="off" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir : <?= $profil['tanggal_lahir']; ?></label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" autocomplete="off" value="<?= $profil['tanggal_lahir']; ?>" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off">
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- select -->
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama">
                                        <option value="<?= $profil['agama']; ?>" class="d-none"><?= $profil['agama']; ?></option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Katholik</option>
                                        <option>Hindhu</option>
                                        <option>Budha</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <?php
                                    if ($profil['jk'] == "L.png") {
                                        $tampil = "Laki-Laki";
                                    } elseif ($profil['jk'] == "P.png") {
                                        $tampil = "Perempuan";
                                    }
                                    ?>

                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" value="<?= $profil['jk']; ?>" class="form-control">
                                        <option class="d-none" value="<?= $profil['jk']; ?>" disabled><?= "$tampil"; ?></option>
                                        <option value="L.png">Laki-Laki</option>
                                        <option value="P.png">Perempuan</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <input type="text" class="form-control" value="<?= $profil['no_telp']; ?>" name="no_telp" autocomplete="off" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input value="<?= $foto ?>" type="hidden">
                                            <input type="file" value="<?= $foto ?>" name="foto" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
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