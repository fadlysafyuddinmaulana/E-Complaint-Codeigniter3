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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Keluhan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="mx-auto d-block mb-5" style="width: 20rem;" src="<?= base_url('upload/dokumen-pengaduan/' . $pengaduan['foto_keluhan']) ?>" class="card-img-top" alt="<?= $pengaduan['foto_keluhan']; ?>">
                            <input type="hidden" name="foto_lama" value="<?= $pengaduan['foto_keluhan']; ?>">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php
                                            if ($pengaduan['status'] == 1) {
                                                $bar = 'bg-danger';
                                                $wd = '50%';
                                                $text = '50% (Menunggu Verifikasi)';
                                            } else {
                                                $bar = 'bg-success';
                                                $wd = '100%';
                                                $text = '100% (Sudah Diverifikasi)';
                                            }
                                            ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped <?= $bar; ?>" role="progressbar" style="width: <?= $wd; ?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $text; ?></div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Diverifikasi Oleh</td>
                                        <td>
                                            <?php
                                            if ($pengaduan['status'] == 0) {
                                                echo $pengaduan['nama_petugas'];
                                            } else {
                                                echo "<i>Masih Menunggu</i>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Isi Aduan</td>
                                        <td><?= $pengaduan['pengaduan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pesan Petugas</td>
                                        <td width="450">
                                            <p><?= $pengaduan['respon_petugas']; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>