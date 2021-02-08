<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">History</h1>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url() ?>history/empty_table" class="btn text-white mb-4 btn-effect-ripple btn-primary"><i class="fas fa-plus"></i> Clear</a>
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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>NIK</th>
                                        <th>Nama Penduduk</th>
                                        <th>Pengaduan</th>
                                        <th>Tanggal Ubah</th>
                                        <th>Waktu Ubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($history as $row => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $value->nik ?></td>
                                            <td><?= $value->nama_penduduk ?></td>
                                            <td><?= $value->pengaduan_update ?></td>
                                            <td><?= $value->tanggal_ubah ?></td>
                                            <td><?= $value->waktu_ubah ?></td>
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