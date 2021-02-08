<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark">Data Pesan</h1>
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
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">VIA</th>
                                        <th class="text-center" width="20%">Tanggal Dibikin</th>
                                        <th class="text-center" width="15%">Waktu Dibikin</th>
                                        <th class="text-center" width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($invoice as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <strong><?= $value->nama ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->via ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <strong><?= $value->tanggal ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <strong><?= $value->waktu ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn text-light btn-effect-ripple btn-s btn-warning" data-toggle="modal" data-target="#view-modal-<?= $value->k_invoice; ?>"><i class="fa fa-search"></i></a>
                                                <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->k_invoice ?>"><i class="fa fa-trash-alt"></i></a>
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
        top: 150px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<?php foreach ($invoice as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->k_invoice; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('invoice/hapus_invoice/' . $value->k_invoice); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus keluhan anda</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_keluhan" id="<?= $value->k_invoice; ?>">
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

<?php foreach ($invoice as $row => $value) : ?>
    <div class="modal fade" id="view-modal-<?= $value->k_invoice; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Dari <?= $value->nama; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <tr>
                        <h3>Isi Pesan</h3>
                        <p><?= $value->pesan; ?></p>
                    </tr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn ml-auto btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>