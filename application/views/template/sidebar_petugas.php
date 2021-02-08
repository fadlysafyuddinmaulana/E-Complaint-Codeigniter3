<?php
$user = $this->session->userdata('userdata_desa');

if ($user['akses'] == 'petugas') {
    $nama = $user['nama_petugas'];
    $foto = $user['foto_petugas'];
} elseif ($user['akses'] == 'admin') {
    $nama = 'Admin';
    $foto = 'admin.png';
}

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-info">
        <img src="<?= base_url() ?>assets/AdminLte-3.0.5/dist/img/info-custom.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">SIKEMAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('upload/Dokumen-Profile-Petugas/' . $foto); ?>" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $nama ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>dashboard/dashboard_petugas" class="nav-link <?php if ($aktif == 'dashboard_admin') {
                                                                                                echo " active";
                                                                                            } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Manajemen Data</li>

                <li class="nav-item">
                    <?php
                    if ($user['akses'] == 'user') {
                        $url = 'pengaduan/data';
                    } else {
                        $url = 'pengaduan';
                    }
                    ?>
                    <a href="<?= base_url($url); ?>" class="nav-link <?php if ($aktif == 'pengaduan') {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>Data Keluhan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url() ?>penduduk" class="nav-link <?php if ($aktif == 'penduduk') {
                                                                            echo " active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Penduduk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url() ?>history" class="nav-link <?php if ($aktif == 'history') {
                                                                            echo " active";
                                                                        } ?>">
                        <i class="nav-icon far fas fa-history"></i>
                        <p>History</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url() ?>invoice/data_invoice" class="nav-link <?php if ($aktif == 'invoice') {
                                                                                        echo " active";
                                                                                    } ?>">
                        <i class="nav-icon far fa-sticky-note"></i>
                        <p>Invoice</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>