<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Petugas</h1>
                </div>
                <div class="ml-auto">
                    <a class="btn text-white mb-4 btn-effect-ripple btn-primary" data-toggle="modal" data-target="#add-worker-modal"><i class="fas fa-plus"></i> Tambah Petugas</a>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class=" card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($petugas as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $value->nama_petugas ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->jk == "L") {
                                                    $tampil = "Laki-Laki";
                                                } elseif ($value->jk == "P") {
                                                    $tampil = "Perempuan";
                                                }
                                                ?>
                                                <?= "$tampil" ?>
                                            </td>
                                            <td>
                                                <?= $value->tempat_lahir . ", " . $value->tanggal_lahir ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('petugas/detail/' . $value->id_petugas) ?>" class="btn btn-effect-ripple btn-s btn-warning text-light"><i class="fa fa-search"></i></a>
                                                <a href="<?= base_url('petugas/edit/' . $value->id_petugas) ?>" class="btn btn-effect-ripple btn-s btn-success"><i class="fa fa-pen"></i></a>
                                                <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_petugas; ?>"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</div>

<style>
    .modal-worker {
        position: absolute;
        top: 25px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }

    .modal {
        position: absolute;
        top: 25px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<?php foreach ($petugas as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id_petugas; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('petugas/hapus/' . $value->id_petugas . '/' . $value->foto_petugas); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus Petugas Ini <?= $value->nama_petugas ?></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_keluhan" id="<?= $value->id_petugas; ?>">
                        <input type="hidden" name="id_keluhan" id="<?= $value->foto_petugas; ?>">
                        <button type="button" class="btn ml-auto btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<div class="modal modal-worker fade" id="add-worker-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->session->flashdata('gagal_upload'); ?>
            <div class="modal-body">
                <form action="<?= base_url() ?>petugas/tambah_proses" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" autocomplete="off" name="nama_petugas" id="nama_petugas" class="form-control" autocomplete="off">
                            <?php echo form_error('nama_petugas', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" autocomplete="off" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off">
                            <?php echo form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" autocomplete="off" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off">
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <?php echo form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control">
                                <option class="d-none" selected>--Pilih Agama--</option>
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katholik</option>
                                <option>Budha</option>
                                <option>Hindhu</option>
                            </select>
                            <?php echo form_error('agama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option class="d-none" selected>--Pilih Jenis Kelamin--</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" autocomplete="off" name="no_telp" id="no_telp" class="form-control" autocomplete="off">
                            <?php echo form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="customFile">Profile Petugas</label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <span class="help-block sm-1">NB.Ukuran foto harus 4x6 dan ukuran file tidak melebihi 5mb</span>
                        </div <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            <!-- /.card-body -->
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn ml-auto btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary">Confirm</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->