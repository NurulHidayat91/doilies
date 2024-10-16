<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN REKAP OPERATOR</title>
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
        LAPORAN REKAP KERJA OPERATOR<br>

    </h3>

    <table>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Tanggal</th>
            <th rowspan="2">Shift</th>
            <th rowspan="2">Waktu</th>
            <th rowspan="2">Operator</th>
            <th rowspan="2">No.Wo</th>
            <th rowspan="2">Customer</th>
            <th rowspan="2">Bentuk</th>
            <th rowspan="2">Ukuran(inch)</th>
            <th rowspan="2">Warna</th>
            <th rowspan="2">Lembar</th>
            <th rowspan="2">Target</th>
            <th rowspan="2">Hasil</th>
            <th rowspan="2">KETERANGAN</th>
            <th rowspan="2">Persentase</th>
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
        foreach ($row as $rekap_operator) {
        ?>
            <tr>
                <td width="10px"><?php echo $no++ ?></td>
                <td><?php echo $rekap_operator->tanggal ?></td>
                <td><?php echo $rekap_operator->shift ?></td>
                <td><?php echo $rekap_operator->waktu ?></td>
                <td><?php echo $rekap_operator->full_name ?></td>
                <td><?php echo $rekap_operator->no_wo ?></td>
                <td><?php echo $rekap_operator->nama_customer ?></td>
                <td><?php echo $rekap_operator->bentuk ?></td>
                <td><?php echo $rekap_operator->ukuran ?></td>
                <td><?php echo $rekap_operator->warna ?></td>
                <td><?php echo $rekap_operator->lembar ?></td>
                <td><?php echo $rekap_operator->target ?></td>
                <td><?php echo $rekap_operator->hasil ?></td>
                <td><?php echo $rekap_operator->keterangan ?></td>
                <td><?php echo $rekap_operator->persentase ?></td>


            </tr>
        <?php  } ?>

    </table>

</body>

</html>