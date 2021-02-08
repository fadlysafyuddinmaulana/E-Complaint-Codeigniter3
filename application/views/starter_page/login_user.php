<div class="login-box">
    <div class="login-logo">
        <div class="text-light"><i class="fas fa-info-circle fa-lg"></i></div>
        <div class="text-light"> <b>Selamat Datang di sistem informasi Keluhan kota A</b></div>
        <!-- /.login-logo -->
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Jika sudah punya akun silahkan Login</p>
            <form action="<?= base_url() ?>login/proses_user" id="form-validation" method="post">
                <div class="form-group input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" name="username" placeholder="Username" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12 ml-auto mb-3">
                        <button type="submit" class="btn btn-outline-primary btn-block">
                            Login
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-0 text-center">
                <a href="<?= base_url() ?>login/register" class="btn btn-outline-secondary  btn-block text-center">Register</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->