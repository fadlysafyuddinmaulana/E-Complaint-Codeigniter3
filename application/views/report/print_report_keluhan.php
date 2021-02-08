<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $tanggal    = date('d/m/Y');
    $waktu      = date('H:i');
    $tanggal_report    = date('dmY');
    $waktu_report      = date('Hi');
    ?>
    <title>Report_Pengaduan_<?= $tanggal_report; ?><?= $waktu_report; ?>
    </title>
</head>
<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #001028;
        text-decoration: none;
    }

    body {
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
        position: relative;
        width: 210mm;
        height: 297mm;
        margin: 0 auto;
        margin-left: -1.2cm;
        color: #001028;
        background: #ffffff;
        font-size: 14px;
    }

    .arrow {
        margin-bottom: 4px;
    }

    .arrow.back {
        text-align: right;
    }

    .inner-arrow {
        padding-right: 10px;
        height: 30px;
        display: inline-block;
        background-color: rgb(233, 125, 49);
        text-align: center;

        line-height: 30px;
        vertical-align: middle;
    }

    .arrow.back .inner-arrow {
        background-color: rgb(233, 217, 49);
        padding-right: 0;
        padding-left: 10px;
    }

    .arrow:before,
    .arrow:after {
        content: "";
        display: inline-block;
        width: 0;
        height: 0;
        border: 15px solid transparent;
        vertical-align: middle;
    }

    .arrow:before {
        border-top-color: rgb(233, 125, 49);
        border-bottom-color: rgb(233, 125, 49);
        border-right-color: rgb(233, 125, 49);
    }

    .arrow.back:before {
        border-top-color: transparent;
        border-bottom-color: transparent;
        border-right-color: rgb(233, 217, 49);
        border-left-color: transparent;
    }

    .arrow:after {
        border-left-color: rgb(233, 125, 49);
    }

    .arrow.back:after {
        border-left-color: rgb(233, 217, 49);
        border-top-color: rgb(233, 217, 49);
        border-bottom-color: rgb(233, 217, 49);
        border-right-color: transparent;
    }

    .arrow span {
        display: inline-block;
        width: 80px;
        margin-right: 20px;
        text-align: right;
    }

    .arrow.back span {
        margin-right: 0;
        margin-left: 20px;
        text-align: left;
    }

    h1 {
        color: #5d6975;
        font-family: junge;
        src: url(Junge-Regular.ttf);
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        border-top: 1px solid #5d6975;
        border-bottom: 1px solid #5d6975;
        margin: 0 0 2em 0;
    }

    h1 small {
        font-size: 0.45em;

    }

    #project {
        float: left;
    }

    #company {
        float: right;
    }

    table {
        width: 100%;
        border: solid 1px #c1ced9;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 30px;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5d6975;
        border-bottom: 1px solid #c1ced9;
        white-space: nowrap;
        font-weight: normal;
    }

    table .service,
    table .desc {
        /* text-align: left; */
        font-size: 11px;
    }

    table td {
        padding: 20px;
        text-align: right;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 11px;
        vertical-align: top;
    }

    table td.sub {
        border-top: 1px solid #c1ced9;
    }

    table td.grand {
        border-top: 1px solid #5d6975;
    }

    table tr:nth-child(2n-1) td {
        background: #eeeeee;
    }

    #details {
        margin-bottom: 30px;
    }

    .tablepdf {
        position: relative;
        left: 20px;
        width: 95%;
    }

    .text-center {
        text-align: center;
    }

    .span-left {
        margin-left: 10px;

    }
</style>

<body>
    <main>
        <h1 class="clearfix">
            Data Pengaduan</h1>
        <div class="tablepdf">
            </p>
            <table>
                <thead>
                    <tr>
                        <th width="0%" class="service text-center">No.</th>
                        <th class="service text-center">Kode Pengaduan</th>
                        <th width="5%" class="service text-center">NIK</th>
                        <th width="25%" class="service text-center">Nama Penduduk</th>
                        <th class="service text-center">Tanggal</th>
                        <th class="service text-center">Waktu</th>
                    </tr>
                </thead>
                <tbody><?php $no = 1;
                        foreach ($pengaduan as $key => $value) : ?><tr>
                            <td class="service"><?= $no++ ?></td>
                            <td class="service"><?= $value->kode_pengaduan ?></td>
                            <td class="service"><?= $value->nik ?></td>
                            <td class="service"><?= $value->nama ?></td>
                            <td class="service"><?= $value->tanggal_unggah ?></td>
                            <td class="service"><?= $value->waktu_unggah ?></td>
                        </tr><?php endforeach; ?></tbody>
            </table>
        </div>
    </main>
    <script>
        print();
    </script>
</body>

</html>