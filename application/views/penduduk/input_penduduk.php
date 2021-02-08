<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Penduduk</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div style="width: 55%;" class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Penduduk</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url() ?>penduduk/tambah_proses" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>No. NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" autocomplete="off" required>
                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Penduduk</label>
                                <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off" required>
                                <?= form_error('tempat-lahir', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off" required>
                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <?= form_error('tanggal-lahir', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control" autocomplete="off" required>
                                    <option class="d-none" selected>--Pilih Agama--</option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katholik</option>
                                    <option>Budha</option>
                                    <option>Hindhu</option>
                                </select>
                                <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" autocomplete="off" required>
                                    <option class="d-none" selected>--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <?= form_error('jenis-kelamin', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="customFile">Profile Penduduk</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
                <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>