<div class="register-box">
    <div class="register-logo">
        <div class="text-light"><b>Buat Akun Baru</b></div>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Daftar Akun terlebih dahulu</p>
            <form action="<?= base_url() ?>login/register_proses" id="form-validation" method="post">
                <div class="form-group input-group mb-1">
                    <input type="text" autocomplete="off" class="form-control" name="val-nik" placeholder="Masukkan NIK Asli">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('val-nik', '<small class="text-danger">', '</small>'); ?>
                <div class="text-muted">NB : NIK harus Sesuai dengan Data Asli</div>
                <div class="form-group input-group mt-3 mb-3">
                    <input type="text" autocomplete="off" class="form-control" name="val-username" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group input-group mt-3 mb-3">
                    <input type="text" autocomplete="off" class="form-control" name="val-cellphone" placeholder="No.Telp">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group input-group mb-1">
                    <input type="password" class="form-control" name="val-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('val-password', '<small class="text-danger">', '</small>'); ?>
                <div class="form-group input-group mt-3 mb-1">
                    <input type="password" class="form-control" name="val-password-verification" placeholder="Verifikasi Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('val-password-verification', '<small class="text-danger">', '</small>') ?>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary mt-2">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                <a class="text-primary" data-toggle="modal" href="#modal-default">Aturan</a>
                            </label>
                        </div>
                        <?= form_error('terms', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- /.col -->
                <div class="mb-3 mt-2">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </form>

            <p class="text-center"><a href="<?= base_url() ?>login">Saya sudah punya akun</a></p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<div class=" modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Aturan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="h4 text-muted">1. <strong>Aturan Umum</strong></h4>
                <p>Web ini adalah sarana untuk menampung keluhan dan aspirasi Penduduk Desa A</p>
                <h4 class="h4 text-muted">2. <strong>Akun</strong></h4>
                <p>Penduduk yang bisa mendaftar dan login adalah Peduduk Desa A</p>
                <h4 class="h4 text-muted">3. <strong>Layanan</strong></h4>
                <p>Kritik dan Saran dapat anda ajukan ke Admin atau melalui menu keluhan,Jika nik anda belum
                    terdaftar anda bisa kirim pesan <a href="<?= base_url() ?>invoice">disini</a>
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>