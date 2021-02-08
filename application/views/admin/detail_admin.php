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
                            <h3 class="card-title">Detail Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="mx-auto d-block mb-5" style="width: 10rem;" src="<?= base_url('upload/dokumen-profile-penduduk/' . $admin['foto_admin']) ?>" class="card-img-top" alt="<?= $admin['foto_admin']; ?>">
                            <input type="hidden" name="foto_lama" value="<?= $admin['foto_admin']; ?>">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Admin</td>
                                        <td>
                                            <?= $admin['nama_admin']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penduduk</td>
                                        <td>
                                            <?= $admin['agama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>
                                            <?= $admin['tempat_lahir'] . "," . $admin['tanggal_lahir'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <?php
                                            if ($admin['jk'] == 'L') {
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
                                            <?= $admin['agama']; ?>
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