<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Petugas</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="content">
        <?= $this->session->flashdata('gagal_upload'); ?>
        <div class="container-fluit">
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Petugas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url() ?>petugas/edit_proses" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="hidden" autocomplete="off" value="<?= $petugas['id_petugas']; ?>" name="id" id="id" class="form-control">
                                    <input type="text" autocomplete="off" value="<?= $petugas['nama_petugas']; ?>" name="nama_petugas" id="nama_petugas" class="form-control" autocomplete="off">
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date" id="datetimepicker4">
                                        <input type="text" autocomplete="off" value="<?= $petugas['tanggal_lahir']; ?>" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off">
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" autocomplete="off" value="<?= $petugas['tempat_lahir']; ?>" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off">
                                </div>

                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control">
                                        <option class="d-none" selected><?= $petugas['agama']; ?></option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Katholik</option>
                                        <option>Budha</option>
                                        <option>Hindhu</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <?php
                                    if ($petugas['jk'] == "L") {
                                        $tampil = "Laki-Laki";
                                    } elseif ($petugas['jk'] == "P") {
                                        $tampil = "Perempuan";
                                    }
                                    ?>

                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option class="d-none" value="$tampil" selected><?= "$tampil"; ?></option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" autocomplete="off" value="<?= $petugas['no_telp']; ?>" name="no_telp" id="no_telp" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="customFile">Profile petugas</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
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