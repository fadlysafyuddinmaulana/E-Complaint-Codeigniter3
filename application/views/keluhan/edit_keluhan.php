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
        <div class="container-fluit">
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Keluhan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Pengaduan/edit_proses2/' . $pengaduan['id_pengaduan']) ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <img class="mx-auto d-block" style="width: 20rem;" src="<?= base_url('upload/dokumen-pengaduan/' . $pengaduan['foto_keluhan']) ?>" class="card-img-top" alt="<?= $pengaduan['foto_keluhan']; ?>">
                                <input type="hidden" name="foto_lama" value="<?= $pengaduan['foto_keluhan']; ?>">
                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Masukkan foto</label>
                                    <input type="file" class="form-control-file" name="foto">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keluhan Anda</label>
                                    <textarea name="pengaduan" class="form-control" style="resize: none;" rows="5" value="<?= $pengaduan['pengaduan']; ?>"><?= $pengaduan['pengaduan']; ?></textarea>
                                </div>
                                <button type=" submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>