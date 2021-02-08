<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Admin</h1>
                </div>
                <div class="ml-auto">
                    <a href="http://tm4.webdevelopment.com/PKK_sikemas/penduduk/tambah_penduduk" data-toggle="modal" data-target="#add-modal" class="btn text-white mb-4 btn-effect-ripple btn-primary"><i class="fas fa-plus"></i> Add Admin</a>
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
                                    foreach ($admin as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $value->nama_admin ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->jk == "L.png") {
                                                    $tampil = "LAKI - LAKI";
                                                } elseif ($value->jk == "P.png") {
                                                    $tampil = "PEREMPUAN";
                                                }
                                                ?>
                                                <?= "$tampil"; ?>
                                            </td>
                                            <td>
                                                <?= $value->tempat_lahir . ", " . $value->tanggal_lahir ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/detail/' . $value->id_admin) ?>" class="btn btn-effect-ripple btn-s btn-warning text-light"><i class="fa fa-search"></i></a>
                                                <a href="<?= base_url('admin/edit/' . $value->id_admin) ?>" class="btn btn-effect-ripple btn-s btn-success"><i class="fa fa-pen"></i></a>
                                                <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_admin; ?>"><i class="fa fa-trash-alt"></i></a>
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
    .modal {
        left: 5%;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<div class="modal fade" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="<?= base_url() ?>penduduk/tambah_proses" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Penduduk</label>
                            <input type="text" autocomplete="off" name="nama_admin" id="nama_admin" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" autocomplete="off" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off">
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

                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option class="d-none" selected>--Pilih Jenis Kelamin--</option>
                                <option value="L.png">Laki-Laki</option>
                                <option value="P.png">Perempuan</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="customFile">Profile Admin</label>

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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->