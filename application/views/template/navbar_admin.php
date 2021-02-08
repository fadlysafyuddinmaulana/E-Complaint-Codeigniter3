<?php
$user = $this->session->userdata('userdata_desa');

if ($user['akses'] == 'admin') {
    $akses              = 'Admin';
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="  " data-toggle="dropdown" href="#">
                <strong class="text-lead text-light"><?= $akses ?></strong>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?= base_url() ?>Login/logout" class="dropdown-item">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->