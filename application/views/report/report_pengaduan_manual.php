<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        date_default_timezone_set('Asia/Jakarta');
        $tanggal    = date('dmy');
        $waktu      = date('Hi');
    ?>
    <title>Report_Pengaduan_<?= $tanggal; ?><?= $waktu; ?>
</head><style>
    table {
        position: relative;
        margin-left: -15px;
        width: 100%;
        border: 1px solid #5d6975;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    h1{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    table th {
        padding: 5px 20px;
        color: black;
        border: 1px solid #5d6975;
        white-space: nowrap;
        font-weight: normal;
        background-color: lightblue;
    }

    table tr,td{
        padding: 5px;
        border: 1px solid #5d6975;
        background-color: #eaeaea;
    }
    </style><body><h1 style="text-align: center;">Data Pengaduan</h1>
    <table style="margin-top: 15px;"><tr>
            <th width="0%">No.</th>
            <th>Kode Pengaduan</th>
            <th width="10%">NIK</th>
            <th width="25%">Nama Penduduk</th>
            <th>Tanggal</th>
            <th>Waktu</th></tr>
        <?php $no = 1;
        foreach($pengaduan as $key => $value) : ?>
        <tr><td style="text-align: center;"><?= $no++ ?></td>
        <td><?= $value->kode_pengaduan ?></td>
        <td><?= $value->nik ?></td>
        <td><?= $value->nama ?></td>
        <td><?= $value->tanggal_unggah ?></td>
        <td><?= $value->waktu_unggah ?></td>
        </tr><?php endforeach;?></table></body></html>