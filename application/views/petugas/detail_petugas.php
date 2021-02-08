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
                                <img class="mx-auto d-block mb-5" style="width: 10rem;" src="<?= base_url('upload/dokumen-profile-petugas/' . $petugas['foto_petugas']) ?>" class="card-img-top" alt="<?= $petugas['foto_petugas']; ?>">
                                <input type="hidden" name="foto_lama" value="<?= $petugas['foto_petugas']; ?>">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <td>
                                                <?= $petugas['nomor_petugas']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama petugas</td>
                                            <td>
                                                <?= $petugas['nama_petugas']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td>
                                            <td>
                                                <?= $petugas['tempat_lahir'] . "," . $petugas['tanggal_lahir'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>
                                                <?php
                                                if ($petugas['jk'] == 'L') {
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
                                                <?= $petugas['agama']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                if ($petugas['active'] == '1') {
                                                ?>
                                                    <button type="button" style="width: 225%;" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#add-modal-worker-<?= $petugas['nomor_petugas']; ?>"><i class="fas fa-plus"></i> Add Account</button>
                                                <?php } else { ?>
                                                    <button type="button" style="width: 225%;" class="btn btn-warning text-white" data-toggle="modal" data-target="#edit-modal-worker-<?= $petugas['nomor_petugas']; ?>"><i class="fa fa-pen"></i> Edit Account</button>
                                                <?php } ?>
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

            <div class="modal fade" id="add-modal-worker-<?= $petugas['nomor_petugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Akun Petugas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('petugas/add_userworker/' . $petugas['id_petugas']) ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Petugas</label>
                                        <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas']; ?>">
                                        <input type="text" autocomplete="off" name="username" id="username" class="form-control" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" autocomplete="off" name="password" id="password" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit-modal-worker-<?= $petugas['nomor_petugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('petugas/edit_userworker/' . $petugas['id_petugas']) ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Petugas</label>
                                        <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas']; ?>">
                                        <input type="text" autocomplete="off" value="<?= $petugas['username']; ?>" name="username" id="username" class="form-control" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" autocomplete="off" name="password" id="password" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>