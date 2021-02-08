<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Input Keluhan</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div style="width: 65%;" class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Keluhan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('pengaduan/tambah_proses') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Masukkan Foto</label>
                                <input type="file" name="foto" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Keluhan</label>
                                <textarea name="pengaduan" style="resize: none;" cols="25" rows="5" class="form-control"></textarea>
                                <?= form_error('pengaduan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
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