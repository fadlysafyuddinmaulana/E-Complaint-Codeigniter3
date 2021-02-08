<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Keluhan</h1>
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
                    <?php
                    $user = $this->session->userdata('userdata_desa');
                    if ($user['akses'] == 'petugas') {
                    ?>
                        <div class="ml-auto">
                            <a href="<?= base_url() ?>pengaduan/pdf_pengaduan" class="btn text-white mb-4 btn-effect-ripple btn-danger"><i class="fas fa-file-pdf"></i> PDF</a>
                        </div>
                    <?php } elseif ($user['akses'] == 'admin') { ?>
                        <div class="ml-auto">
                            <a href="<?= base_url() ?>pengaduan/pdf_pengaduan" class="btn text-white mb-4 btn-effect-ripple btn-danger"><i class="fas fa-file-pdf"></i> PDF</a>
                        </div>

                    <?php } ?>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Nama Penduduk</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pengaduan as $row => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $value->nama; ?></td>
                                            <td><?= $value->tanggal_unggah; ?></td>
                                            <td class="text-center">
                                                <?php if ($value->status == 1) {
                                                    $label = "badge badge-danger";
                                                    $text = "Menunggu Verifikasi";
                                                    $color = "btn btn-success";
                                                    $icon = "far fa-check-circle";
                                                } else {
                                                    $label = "badge badge-success";
                                                    $text = "Sudah Diverifikasi";
                                                    $color = "btn btn-danger";
                                                    $icon = "far fa-times-circle";
                                                }
                                                ?>
                                                <span class="<?= $label; ?>">
                                                    <?= $text; ?>
                                                </span>
                                            </td>
                                            <?php
                                            $user = $this->session->userdata('userdata_desa');
                                            if ($user['akses'] == 'petugas') {
                                            ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('pengaduan/detail2/' . $value->id_pengaduan) ?>" data-toggle="tooltip" class="btn btn-effect-ripple btn-s text-light btn-warning"><i class="fa fa-search"></i></a>
                                                    <?php if ($value->status != 0) {
                                                        $btn_disabled = 'disabled';
                                                    } else {
                                                        $btn_disabled = '';
                                                    }
                                                    ?>
                                                    <button type="button" data-toggle="modal" data-target="#respon-modal-<?= $value->id_pengaduan; ?>" class="btn btn-effect-ripple btn-s text-light btn-primary" <?= $btn_disabled; ?>><i class="fa fa-envelope"></i></button>
                                                    <a href="<?= base_url('pengaduan/update_status/' . $value->id_pengaduan) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Status?')" data-toggle="tooltip" title="Ubah Status" class="btn btn-effect-ripple btn-s <?= $color ?>"><i class="<?= $icon ?>"></i></a>
                                                </td>
                                            <?php } elseif ($user['akses'] == 'user') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('pengaduan/detail/' . $value->id_pengaduan) ?>" class="btn btn-effect-ripple btn-s btn-warning text-light"><i class="fa fa-search"></i></a>
                                                    <a href="<?= base_url('pengaduan/edit/' . $value->id_pengaduan) ?>" class="btn btn-effect-ripple btn-s btn-success"><i class="fa fa-pen"></i></a>
                                                    <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_pengaduan; ?>"><i class="fa fa-trash-alt"></i></a>
                                                </td>
                                            <?php } elseif ($user['akses'] == 'admin') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('Pengaduan/detail2/' . $value->id_pengaduan) ?>" data-toggle="tooltip" class="btn btn-effect-ripple btn-s text-light btn-warning"><i class="fa fa-search"></i></a>
                                                </td>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
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

    .modal-respon {
        position: absolute;
        top: 125px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<?php foreach ($pengaduan as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id_pengaduan; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Pengaduan/hapus_keluhan/' . $value->id_pengaduan . '/' . $value->foto_keluhan); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus keluhan anda</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="<?= $value->id_pengaduan; ?>">
                        <input type="hidden" id="<?= $value->foto_keluhan; ?>">
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

<?php foreach ($pengaduan as $row => $value) : ?>
    <div class="modal modal-respon fade" id="respon-modal-<?= $value->id_pengaduan; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Respon Petugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Pengaduan/proses_respon/' . $value->id_pengaduan); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Respon Petugas</label>
                            <input type="hidden" name="id_pengaduan" value="<?= $value->id_pengaduan; ?>">
                            <textarea name="respon" style="resize: none;" cols="25" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn ml-auto btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>