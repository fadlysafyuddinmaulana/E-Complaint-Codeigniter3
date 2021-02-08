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
                            <img class="mx-auto d-block mb-5" style="width: 10rem;" src="<?= base_url('upload/dokumen-profile-penduduk/' . $penduduk['foto_penduduk']) ?>" class="card-img-top" alt="<?= $penduduk['foto_penduduk']; ?>">
                            <input type="hidden" name="foto_lama" value="<?= $penduduk['foto_penduduk']; ?>">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>NIK</td>
                                        <td>
                                            <?= $penduduk['nik']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penduduk</td>
                                        <td>
                                            <?= $penduduk['nama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>
                                            <?= $penduduk['tempat_lahir'] . "," . $penduduk['tanggal_lahir'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <?php
                                            if ($penduduk['jk'] == 'L') {
                                                echo "Laki-Laki";
                                            } else {
                                                echo "Perempuan";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>
                                            <?= $penduduk['agama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Keluhan</td>
                                        <td>
                                            <?= $keluhan; ?>
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