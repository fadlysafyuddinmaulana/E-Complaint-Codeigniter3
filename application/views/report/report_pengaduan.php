<!DOCTYPE html><html lang="en"><head>
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
    </title></head><body><main><h1>
    Data Pengaduan</h1><div></p><table style="border-collapse: collapse;"><thead><tr>
                        <th width="0%">No.</th>
                        <th>Kode Pengaduan</th>
                        <th width="5%">NIK</th>
                        <th width="25%">Nama Penduduk</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                    </tr></thead><tbody><?php $no = 1;
                        foreach ($pengaduan as $key => $value) : ?><tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->kode_pengaduan ?></td>
                            <td><?= $value->nik ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->tanggal_unggah ?></td>
                            <td><?= $value->waktu_unggah ?></td>
                        </tr><?php endforeach; ?></tbody></table></div></main></body></html>