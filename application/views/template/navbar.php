<?php
$user = $this->session->userdata('userdata_desa');

if ($user['akses'] == 'petugas') {
    $id                 = $user['id_petugas'];
    $akses_profil       = 'profil_petugas';
    $akses_password     = 'edit_password_petugas';
    $nama               = $user['nama_petugas'];
} elseif ($user['akses'] == 'user') {
    $id                 = $user['nik'];
    $akses              = 'USER';
    $akses_profil       = 'profil_user';
    $akses_edit         = 'edit_akun_user';
    $akses_password     = 'edit_password_user';
    $nama               = $user['nama'];
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
                <strong class="text-lead text-light"><?= $nama ?></strong>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('Profil/' . $akses_profil . '/' . $id) ?>" class="dropdown-item">
                    <i class="nav-icon fas fa-user"></i>
                    Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('Profil/' . $akses_password . '/' . $id) ?>" class=" dropdown-item">
                    <i class="nav-icon fas fa-user-edit"></i>
                    Edit Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>Login/logout" class="dropdown-item">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->