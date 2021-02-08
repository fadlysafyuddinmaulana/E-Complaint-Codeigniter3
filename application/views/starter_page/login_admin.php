<div class="login-box">
    <div class="login-logo">
        <div class="text-light"><b>Selamat Datang Admin</b></div> <!-- /.login-logo -->
    </div>
    <div class="card">
        <div class="card-body login-card-body">

            <form action="<?= base_url() ?>login/proses_admin" id="form-validation" method="post">
                <div class="form-group input-group mb-3 mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
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
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->