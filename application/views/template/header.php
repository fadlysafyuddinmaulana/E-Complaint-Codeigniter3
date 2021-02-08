<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title><?= $title; ?></title>

    <!-- Icon Bar -->
    <link rel="icon" href="<?= base_url() ?>assets/AdminLTE-3.0.5/dist/img/ico/information-sign.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.0.5/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        $userdata = $this->session->userdata('userdata_desa');

        if ($userdata['akses'] == 'admin') {
            $this->load->view('template/navbar_admin');
            $this->load->view('template/sidebar_admin');
        } elseif ($userdata['akses'] == 'user') {
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar_user');
        } elseif ($userdata['akses'] == 'petugas') {
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar_petugas');
        }
        ?>