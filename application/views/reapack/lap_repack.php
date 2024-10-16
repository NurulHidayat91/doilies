<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/dp.ico">
    <title>LAPORAN REPACK</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 2px solid black;
        }

        table,
        th,
        td {
            padding: 10px;
            font-size: 13px;
        }


        th {
            font-size: 16px;
            background-color: #2972ba;
        }
    </style>
</head>

<body>
    <h2>PT DRAGON PACK</h2>
    <h3>
        LAPORAN REPACK <br>

        PERIODE <?= indo_date($dari) ?> s/d <?= indo_date($sampai) ?>
    </h3>

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal Terima WO</th>
            <th>Subject Email</th>
            <th>No WO</th>
            <th>Customer</th>
            <th>Kode Item</th>
            <th>Bentuk</th>
            <th>Ukuran</th>
            <th>Lembar</th>
            <th>Pack</th>
            <th>Warna</th>
            <th>Warna Inner</th>
            <th>Pattern</th>
            <th>Grade</th>
            <th>GSM</th>
            <th>Target QTY (Box)</th>
            <th>Barcode Inner</th>
            <th>Barcode Outer</th>
            <th>Hal</th>
            <th>Status Transfer</th>

        </tr>
        <?php
        $no = 1;

        foreach ($row as $key => $value) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= indo_date($value->tanggal_terima) ?></td>
                <td><?= $value->subjek_email ?></td>
                <td><?= $value->no_wo ?></td>
                <td><?= $value->nama_customer ?></td>
                <td><?= $value->kode_item ?></td>
                <td><?= $value->bentuk ?></td>
                <td><?= $value->ukuran ?></td>
                <td><?= $value->lembar ?></td>
                <td><?= $value->pack ?></td>
                <td><?= $value->warna ?></td>
                <td><?= $value->warna_inner ?></td>
                <td><?= $value->nama_pattern ?></td>
                <td><?= $value->grade ?></td>
                <td><?= $value->gsm ?></td>
                <td><?= $value->qty_box ?></td>
                <td><?= $value->barcode_inner ?></td>
                <td><?= $value->barcode_outer ?></td>
                <td><?= $value->hal ?></td>
                <td><?= $value->status_transfer ?></td>

            </tr>
        <?php }
        ?>


    </table>

</body>

</html>