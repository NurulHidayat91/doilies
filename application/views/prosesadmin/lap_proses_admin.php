<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN HARIAN PACKAGING DOILIES</title>
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
        LAPORAN HARIAN PACKAGING DOILIES <br>

        PERIODE <?= $dari ?> s/d <?= $sampai ?>
    </h3>

    <table>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Tanggal</th>
            <th rowspan="3">Waktu</th>
            <th rowspan="3">OPERATOR</th>
            <th rowspan="3">Shift</th>
            <th rowspan="3">No Wo</th>
            <th rowspan="3">No Mesin</th>
            <th rowspan="3">Order</th>
            <th rowspan="3">Sub Bagian</th>
            <!-- <th colspan="5">PRODUK</th> -->
            <!-- <th>Pattern</th> -->
            <!-- <th>Bentuk</th>
            <th>Ukuran</th> -->
            <th colspan="4">PRODUK</th>
            <th rowspan="3">Speed Mesin</th>
            <th rowspan="3">Target</th>
            <th rowspan="3">Hasil Potongan(pack)</th>
            <th rowspan="3">Broke(kg)</th>
            <th rowspan="3">Hasil MC Geprek</th>
            <th rowspan="3">Broke(kg)</th>
            <th rowspan="3">Hasil Sortir Polybag</th>
            <th rowspan="3">Broke(kg)</th>
            <th rowspan="3">Hasil Sealer</th>
            <th rowspan="3">Broke(kg)</th>
            <th rowspan="3">Hasil Oven</th>
            <th rowspan="3">Broke(kg)</th>
            <th rowspan="3">Hasil Sticker</th>
            <th rowspan="3">Broke(kg)</th>
            <th rowspan="3">Hasil Packing Box</th>
            <th rowspan="3">Broke(kg)</th>


        </tr>
        <tr>
            <!-- <th>Tanggal</th> -->
            <!-- <th>Shift</th> -->
            <!-- <th>No. Wo</th> -->
            <th rowspan="2">Warna / Motif</th>
            <th rowspan="2">Bentuk</th>
            <th rowspan="2">Ukuran(Inchi)</th>
            <th rowspan="2">Lembar / Pack</th>
            <!-- <th rowspan="2">Order</th>
            <th rowspan="2">Bentuk</th>
            <th rowspan="2">Ukuran</th>
            <th rowspan="2">Pattern</th>
            <th rowspan="2">Lembar</th>
            <th rowspan="2">Grade</th>
            <th rowspan="2">Gsm</th>
            <th rowspan="2">Warna</th>
            <th rowspan="2">Lebar (cm)</th>
            <th rowspan="2">Qty Roll</th>
            <th rowspan="2">Berat (Kg)</th> -->
            <!-- <th>Speed</th> -->
            <!-- <th>Target Jam</th> -->
            <!-- <th rowspan="2">Jam Proses</th>
            <th colspan="2">PASSED</th>
            <th colspan="3">NON PASSED</th>
            <th colspan="4">BROKE</th>
            <th rowspan="2">Awal</th>
            <th rowspan="2">Akhir</th>
            <th rowspan="2">Kode</th>
            <th rowspan="2">Menit</th> -->
            <!-- <th>Satuan Pack</th>
            <th>Menit Proses</th>
            <th>No Stamp</th>
            <th>Hasil Pack</th>
            <th>Hasil Kg</th>
            <th>Broke Setting</th>
            <th>Broke Trim</th>
            <th>Broke Serpihan</th>
            <th>Broke Motif</th>
            <th>Sisa Roll</th>
            <th>ket</th>
            <th>Waktu Downtime</th>
            <th>Jam Akhir</th>
            <th>Persentase</th> -->
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
            <!-- <th>Pack</th>
            <th>Kg</th>
            <th>Kode</th>
            <th>Pack</th>
            <th>Kg</th>
            <th>Setting</th>
            <th>Trim</th>
            <th>Serpihan</th>
            <th>Motif</th> -->

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
        foreach ($row as $prosesadmin) {
        ?>
            <tr>
                <td width="10px"><?php echo $no++ ?></td>
                <td><?php echo $prosesadmin->tanggal ?></td>
                <td><?php echo $prosesadmin->waktu ?></td>
                <td><?php echo $prosesadmin->full_name ?></td>
                <td><?php echo $prosesadmin->shift ?></td>
                <td><?php echo $prosesadmin->no_wo ?></td>
                <td><?php echo $prosesadmin->kode_mesin ?></td>
                <td><?php echo $prosesadmin->nama_customer ?></td>
                <td><?php echo $prosesadmin->nama_pekerjaan ?></td>
                <td><?php echo $prosesadmin->warna ?></td>
                <td><?php echo $prosesadmin->bentuk ?></td>
                <td><?php echo $prosesadmin->ukuran ?></td>
                <td><?php echo $prosesadmin->lembar ?></td>
                <td><?php echo $prosesadmin->speed_mesin ?></td>
                <td><?php echo $prosesadmin->target ?></td>
                <td><?php echo $prosesadmin->hasil_potongan ?></td>
                <td><?php echo $prosesadmin->reject_potongan ?></td>
                <td><?php echo $prosesadmin->hasil_geprek ?></td>
                <td><?php echo $prosesadmin->reject_geprek ?></td>
                <td><?php echo $prosesadmin->hasil_sortir_polybag ?></td>
                <td><?php echo $prosesadmin->reject_sortir_polybag ?></td>
                <td><?php echo $prosesadmin->hasil_sealer ?></td>
                <td><?php echo $prosesadmin->reject_sealer ?></td>
                <td><?php echo $prosesadmin->hasil_oven ?></td>
                <td><?php echo $prosesadmin->reject_oven ?></td>
                <td><?php echo $prosesadmin->hasil_sticker ?></td>
                <td><?php echo $prosesadmin->reject_sticker ?></td>
                <td><?php echo $prosesadmin->hasil_packing_box ?></td>
                <td><?php echo $prosesadmin->reject_packing_box ?></td>

            </tr>
        <?php  } ?>

    </table>

</body>

</html>