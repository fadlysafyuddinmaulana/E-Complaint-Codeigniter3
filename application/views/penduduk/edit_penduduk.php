Upload<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Penduduk</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Keluhan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url() ?>penduduk/edit_proses" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No. NIK</label>
                                    <input type="hidden" autocomplete="off" value="<?= $penduduk['id']; ?>" name="id" id="id" class="form-control">
                                    <input type="hidden" autocomplete="off" value="<?= $penduduk['nik_account']; ?>" name="nik" id="nik" class="form-control">
                                    <input type="text" autocomplete="off" value="<?= $penduduk['nik']; ?>" name="nik" id="nik" class="form-control">
                                    <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Penduduk</label>
                                    <input type="text" autocomplete="off" value="<?= $penduduk['nama']; ?>" name="nama" id="nama" class="form-control" autocomplete="off">
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date" id="datetimepicker4">
                                        <input type="text" autocomplete="off" value="<?= $penduduk['tanggal_lahir']; ?>" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off">
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" autocomplete="off" value="<?= $penduduk['tempat_lahir']; ?>" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off">
                                </div>

                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control">
                                        <option class="d-none" value="<?= $penduduk['agama']; ?>" selected><?= $penduduk['agama']; ?></option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Katholik</option>
                                        <option>Budha</option>
                                        <option>Hindhu</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <?php
                                    if ($penduduk['jk'] == "L") {
                                        $tampil = "Laki-Laki";
                                    } elseif ($penduduk['jk'] == "P") {
                                        $tampil = "Perempuan";
                                    }
                                    ?>

                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option class="d-none" value="<?= $penduduk['jk']; ?>" selected><?= "$tampil"; ?></option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="customFile">Profile Penduduk</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
</div>