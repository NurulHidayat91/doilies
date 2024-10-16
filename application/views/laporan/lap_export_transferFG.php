<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN TRANSFER FG</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        table,
        th,
        td {
            padding: 10px;
            font-size: 14px;
        }


        th {
            font-size: 16px;
            /* background-color: #2972ba; */
        }
    </style>
</head>

<body>
    <!-- <h2>PT DRAGON PACK</h2> -->
    <h3 align="center">
        LAPORAN TRANSFER FINISHGOOD DOILIES<br>

    </h3>

    <table>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Tanggal</th>
            <th rowspan="3">No.Wo</th>
            <th rowspan="3">Waktu</th>
            <th rowspan="3">Operator</th>
            <th rowspan="3">Shift</th>
            <th rowspan="3">Order</th>
            <th rowspan="3">No Stock</th>
            <th rowspan="3">Kode Sistem</th>
            <th colspan="7">PRODUK</th>
            <th rowspan="3">BOX</th>
            <th rowspan="3">PACK</th>
            <th rowspan="3">PCS</th>
            <th rowspan="3">KG</h>
            <th rowspan="3">KETERANGAN</th>
        </tr>
        <tr>

            <th rowspan="2">Bentuk</th>
            <th rowspan="2">Ukuran(inch)</th>
            <th rowspan="2">Warna</th>
            <th rowspan="2">Lembar</th>
            <th rowspan="2">Grade</th>
            <th rowspan="2">Gsm</th>
            <th rowspan="2">Pattern</th>
        </tr>
        <tr>
            <!-- <th>Shift</th> -->
            <!-- <th>No.wo</th> -->
            <!-- <th>Tanggal</th> -->
            <!-- <th>Operator</th>
            <th>Operator2</th>
            <th>Operator3</th>
            <th>Operator4</th> -->
            <!-- <th>Order</th> -->
            <!-- <th>Bentuk</th>
            <th>Ukuran</th> -->
            <!-- <th>Pattern</th> -->
            <!-- <th>Lembar</th> -->
            <!-- <th>Grade</th>
            <th>Gsm</th> -->
            <!-- <th>Warna</th> -->
            <!-- <th>Lebar</th> -->
            <!-- <th>Qty Roll</th> -->
            <!-- <th>Berat</th> -->
            <!-- <th>Speed</th> -->
            <!-- <th>Target Jam</th> -->
            <!-- <th>Jam Proses</th> -->

            <!-- <th>Satuan Pack</th>
            <th>Menit Proses</th>
            <th>No Stamp</th>
            <th>Sisa Roll</th>
            <th>ket</th>
            <th>Downtime</th>
            <th>Waktu Downtime</th>
            <th>Jam</th>
            <th>Jam Akhir</th>
            <th>Persentase</th> -->
        </tr>
        <?php
        $no = 1;
        foreach ($row as $transferfg) {
        ?>
            <tr>
                <td width="10px"><?php echo $no++ ?></td>
                <td><?php echo $transferfg->tanggal ?></td>
                <td><?php echo $transferfg->no_wo ?></td>
                <td><?php echo $transferfg->waktu ?></td>
                <td><?php echo $transferfg->full_name ?></td>
                <td><?php echo $transferfg->shift ?></td>
                <td><?php echo $transferfg->nama_customer ?></td>
                <td><?php echo $transferfg->no_stock ?></td>
                <td><?php echo $transferfg->kode_sistem ?></td>
                <td><?php echo $transferfg->bentuk ?></td>
                <td><?php echo $transferfg->ukuran ?></td>
                <td><?php echo $transferfg->warna ?></td>
                <td><?php echo $transferfg->lembar ?></td>
                <td><?php echo $transferfg->grade ?></td>
                <td><?php echo $transferfg->gsm ?></td>
                <td><?php echo $transferfg->nama_pattern ?></td>
                <td><?php echo $transferfg->box_qty ?></td>
                <td><?php echo $transferfg->box_pack ?></td>
                <td><?php echo $transferfg->box_pcs ?></td>
                <td><?php echo $transferfg->box_kg ?></td>
                <td><?php echo $transferfg->keterangan ?></td>


            </tr>
        <?php  } ?>

    </table>

</body>

</html>