<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Penduduk</h1>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url() ?>penduduk/tambah_penduduk" class="btn text-white mb-4 btn-effect-ripple btn-primary"><i class="fas fa-plus"></i> Tambah Penduduk</a>
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
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($penduduk as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td><strong>
                                                    <?= $value->nik ?></strong></td>
                                            <td>
                                                <?= $value->nama ?>
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
                                                <a href="<?= base_url('penduduk/detail/' . $value->id) ?>" class="btn btn-effect-ripple btn-s btn-warning text-light"><i class="fa fa-search"></i></a>
                                                <a href="<?= base_url('penduduk/edit/' . $value->id) ?>" class="btn btn-effect-ripple btn-s btn-success"><i class="fa fa-pen"></i></a>
                                                <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id; ?>"><i class="fa fa-trash-alt"></i></a>
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
        position: absolute;
        top: 190px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<?php foreach ($penduduk as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('penduduk/hapus/' . $value->id . '/' . $value->foto_penduduk); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_keluhan" id="<?= $value->id; ?>">
                        <input type="hidden" name="id_keluhan" id="<?= $value->foto_penduduk; ?>">
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