<div class="login-box">
    <div class="login-logo">
        <div class="text-light"><b>Kirim Pesan ke petugas</b></div>
        <!-- /.login-logo -->
    </div>
    <div class="card">
        <div class="card-body login-card-body">

            <form action="<?= base_url() ?>invoice/proses_invoice" method="post">
                <div class="form-group mt-2 mb-3">
                    <input type="text" autocomplete="off" class="form-control" name="nama" placeholder="Nama Anda" required>
                </div>
                <div class="form-group mb-3">
                    <textarea style="resize: none;" class="form-control" name="pesan" placeholder="Masukkan Pesan Disini" name="" id="" cols="30" rows="8" required></textarea>
                </div>
                <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control" name="via" placeholder="Email/no.telp" required>
                </div>
                <span class="help-block sm-1">NB : tolong gunakan email/no.telp untuk
                    mengirim pesan jika sudah saya ubah, kami
                    tidak menerima keluhan dsb.
                    <a href="<?= base_url() ?>login/register">Kembali</a>
                </span>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12 ml-auto mb-3">
                        <button type="submit" class="btn btn-success btn-block mt-3">
                            Kirim
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->