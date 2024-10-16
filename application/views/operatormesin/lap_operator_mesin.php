<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN HARIAN MESIN DOILIES</title>
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

        /* .container {
            width: 2200px;
            border: 1px solid #333;
            padding: 3px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
        } */

        /* .nonpassed {
            margin-left: 40px;

        }

        .downtime  {
            margin-right: 20px;

        } */

        /* .dibuatoleh span {
            justify-content: space-between;

        }

        .diketahuioleh span {
            justify-content: space-between;

        } */
    </style>
</head>

<body>
    <!-- <h2>PT DRAGON PACK</h2> -->
    <h3 align="center">
        LAPORAN HARIAN MESIN DOILIES <br>

        PERIODE <?= $dari ?> s/d <?= $sampai ?>
    </h3>
    <h3 style="margin-top: 20px;">NO ISO : FORM-001</h3>
    <div class="card-body table-responsive">
        <div class="row">
            <table>
                <tr>
                    <th rowspan="3">No</th>
                    <th rowspan="3">No_form</th>
                    <th rowspan="3">Tanggal</th>
                    <th rowspan="3">Shift</th>
                    <th rowspan="3">No Mesin</th>
                    <th colspan="4">NAMA OPERATOR</th>
                    <th rowspan="3">No Wo</th>

                    <th colspan="5">PRODUK</th>
                    <!-- <th>Pattern</th> -->
                    <!-- <th>Bentuk</th>
            <th>Ukuran</th> -->
                    <th colspan="6">BAHAN AWAL</th>
                    <th rowspan="3">Speed Mesin</th>
                    <th rowspan="3">Target / Jam</th>
                    <th rowspan="3">Menit Proses</th>
                    <th rowspan="3">Target Proses</th>
                    <th colspan="10">HASIL AKHIR</th>
                    <th rowspan="3">No Stamp</th>
                    <th colspan="2">JAM</th>
                    <th colspan="3">DOWNTIME</th>
                    <th rowspan="3">WIP (PACK)</th>
                    <th rowspan="3">SISA (ROLL)</th>
                    <th rowspan="3">KETERANGAN</th>
                    <th rowspan="3">PERSENTASE</th>

                    <!-- <th>Gsm</th>
            <th>Lebar</th>
            <th>Qty Roll</th>
            <th>Berat</th>
            <th>No Stamp</th>
            <th>Jam Proses</th>
            <th>Hasil Pack</th>
            <th>Hasil Kg</th>
            <th>Broke Setting</th>
            <th>Broke Trim</th> -->
                    <!-- <th>Broke Serpihan</th>
            <th>Broke Motif</th>
            <th>Sisa Roll</th>
            <th>ket</th>
            <th>Downtime</th>
            <th>Waktu Downtime</th>
            <th>Jam</th>
            <th>Jam Akhir</th>
            <th>Persentase</th> -->
                </tr>
                <tr>
                    <!-- <th>Tanggal</th> -->
                    <!-- <th>Shift</th> -->
                    <!-- <th>No. Wo</th> -->
                    <th rowspan="2">Operator1</th>
                    <th rowspan="2">Operator2</th>
                    <th rowspan="2">Operator3</th>
                    <th rowspan="2">Operator4</th>
                    <th rowspan="2">Order</th>
                    <th rowspan="2">Bentuk</th>
                    <th rowspan="2">Ukuran</th>
                    <th rowspan="2">Pattern</th>
                    <th rowspan="2">Lembar</th>
                    <th rowspan="2">Grade</th>
                    <th rowspan="2">Gsm</th>
                    <th rowspan="2">Warna</th>
                    <th rowspan="2">Lebar (cm)</th>
                    <th rowspan="2">Qty Roll</th>
                    <th rowspan="2">Berat (Kg)</th>
                    <!-- <th>Speed</th> -->
                    <!-- <th>Target Jam</th> -->
                    <th rowspan="2">Jumlah Proses</th>
                    <th colspan="2">PASSED</th>
                    <th colspan="3">NON PASSED</th>
                    <th colspan="4">BROKE</th>
                    <th rowspan="2">Awal</th>
                    <th rowspan="2">Akhir</th>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Keterangan </th>
                    <th rowspan="2">Menit</th>
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
                    <th>Pack</th>
                    <th>Kg</th>
                    <th>Kode</th>
                    <th>Pack</th>
                    <th>Kg</th>
                    <th>Setting</th>
                    <th>Trim</th>
                    <th>Serpihan</th>
                    <th>Motif</th>

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
                $ket = $this->db->query("SELECT * FROM downtime")->result_array();

                // var_dump($ket);
                // die;

                foreach ($row as $operatormesin) {

                ?>
                    <tr align="center">
                        <td width="10px"><?php echo $no++ ?></td>
                        <td><?php echo $operatormesin->no_form ?></td>
                        <td><?php echo $operatormesin->tanggal ?></td>
                        <td><?php echo $operatormesin->shift ?></td>
                        <!-- <td><?php echo $operatormesin->no_wo ?></td> -->
                        <td><?php echo $operatormesin->kode_mesin ?></td>
                        <td><?php echo $operatormesin->full_name ?></td>
                        <td><?php echo $operatormesin->operator2 ?></td>
                        <td><?php echo $operatormesin->operator3 ?></td>
                        <td><?php echo $operatormesin->operator4 ?></td>
                        <td><?php echo $operatormesin->no_wo ?></td>
                        <td><?php echo $operatormesin->nama_customer ?></td>
                        <td><?php echo $operatormesin->bentuk ?></td>
                        <td><?php echo $operatormesin->ukuran ?></td>
                        <td><?php echo $operatormesin->nama_pattern ?></td>
                        <td><?php echo $operatormesin->lembar ?></td>
                        <td><?php echo $operatormesin->grade ?></td>
                        <td><?php echo $operatormesin->gsm ?></td>
                        <td><?php echo $operatormesin->warna ?></td>
                        <td><?php echo $operatormesin->lebar ?></td>
                        <td><?php echo $operatormesin->qty_roll ?></td>
                        <td><?php echo $operatormesin->berat ?></td>
                        <td><?php echo $operatormesin->speed_mesin ?></td>
                        <td><?php echo $operatormesin->satuan_pack ?></td>
                        <td><?php echo $operatormesin->menit_proses ?></td>
                        <td><?php echo $operatormesin->target_jam ?></td>
                        <td><?php echo $operatormesin->jam_proses ?></td>
                        <td><?php echo $operatormesin->hasil_pack ?></td>
                        <td><?php echo $operatormesin->hasil_kg ?></td>
                        <td><?php echo $operatormesin->kode_non_passed ?></td>
                        <td><?php echo $operatormesin->nonpassed_pack ?></td>
                        <td><?php echo $operatormesin->nonpassed_kg ?></td>
                        <td><?php echo $operatormesin->broke_setting ?></td>
                        <td><?php echo $operatormesin->broke_trim ?></td>
                        <td><?php echo $operatormesin->broke_serpihan ?></td>
                        <td><?php echo $operatormesin->broke_motif ?></td>
                        <td><?php echo $operatormesin->no_stamp ?></td>
                        <td><?php echo $operatormesin->jam ?></td>
                        <td><?php echo $operatormesin->jam_akhir ?></td>
                        <td>
                            <?php echo $operatormesin->kode ?><br>
                            <?php echo $operatormesin->downtime2 ?> <br>
                            <?php echo $operatormesin->downtime3 ?> <br>
                            <?php echo $operatormesin->downtime4 ?> <br>

                            <hr>
                            <?php echo $operatormesin->downtime5 ?><br>
                            <?php echo $operatormesin->downtime6 ?><br>
                            <?php echo $operatormesin->downtime7 ?><br>
                            <?php echo $operatormesin->downtime8 ?><br>
                        </td>

                        <td>
                            <!-- <?php if ($operatormesin->kode == 'J') { ?>

                                <?= $operatormesin->alasan3 ?>

                            <?php } else { ?>
                                <?php echo $operatormesin->keterangan ?>
                            <?php  } ?>  

                            <?php


                            foreach ($ket as $key => $value) { ?>

                                <?php if ($value['id_downtime'] == $operatormesin->id_downtime) { ?>
                                    <?= $value['keterangan'] ?>

                                <?php } elseif ($value['kode'] == $operatormesin->downtime2) { ?><br>
                                    <?= $value['keterangan'] ?>

                                <?php } elseif ($value['kode'] == $operatormesin->downtime3) { ?> <br>
                                    <?= $value['keterangan'] ?>
                                <?php } elseif ($value['kode'] == $operatormesin->downtime4) { ?><br>
                                    <?= $value['keterangan'] ?>
                                <?php }  ?>
                            <?php } ?> -->

                            <?php echo $operatormesin->ket1 ?> <br>
                            <?php echo $operatormesin->ket_2 ?> <br>
                            <?php echo $operatormesin->ket3 ?> <br>
                            <?php echo $operatormesin->ket4 ?> <br>

                            <hr>
                            <?php echo $operatormesin->ket5 ?> <br>
                            <?php echo $operatormesin->ket6 ?> <br>
                            <?php echo $operatormesin->ket7 ?> <br>
                            <?php echo $operatormesin->ket8 ?> <br>

                        </td>

                        <td>
                            <?php echo $operatormesin->waktu_downtime ?> <br>
                            <?php echo $operatormesin->waktu_downtime2 ?> <br>
                            <?php echo $operatormesin->waktu_downtime3 ?> <br>
                            <?php echo $operatormesin->waktu_downtime4 ?> <br>
                            <hr>
                            <?php echo $operatormesin->waktu_downtime5 ?> <br>
                            <?php echo $operatormesin->waktu_downtime6 ?> <br>
                            <?php echo $operatormesin->waktu_downtime7 ?> <br>
                            <?php echo $operatormesin->waktu_downtime8 ?> <br>
                        </td>
                        <td><?php echo $operatormesin->wip ?></td>
                        <td><?php echo $operatormesin->sisa_roll ?></td>
                        <td><?php echo $operatormesin->ket ?></td>
                        <td><?php echo $operatormesin->persentase ?></td>
                        <!-- <td><?php echo $operatormesin->satuan_pack ?></td>
                <td><?php echo $operatormesin->menit_proses ?></td> -->

                    </tr>
                <?php  } ?>

            </table>
        </div>

    </div>



    <!-- <div class="container" style="display: flex;">
        <div class="nonpassed">
            <span><b>Non Passed :</b></span>
            <ul style="list-style: none;">
                <li>A. Trim Terpotong</li>
                <li>B. Lengket</li>
                <li>C. Serabut</li>
                <li>D. Kotor</li>
                <li>E. Serpihan Penuh</li>
                <li>F. Rapuh Patah</li>
                <li>G. Motif Terpotong</li>
                <li>H. Tulang Bahan Tidak Searah</li>
            </ul>
        </div>

        <div class="downtime">
            <span><b>Downtime :</b></span>
            <ul style="list-style: none;">
                <li>A. Ganti Ukuran</li>
                <li>B. Naik Roll</li>
                <li>C. Ganti Teplon</li>
                <li>D. Setting Pisau Pemotongr</li>
                <li>E. Setting Pisau Teplon</li>
                <li>G. Trim Menggulung</li>
                <li>I. Perbaikan Mesin</li>
                <li>J. Lain-Lain</li>
            </ul>
        </div>

        <div class="dibuatoleh">
            <span><b>DIBUAT OLEH,</b></span>
            <br>
            <span>Jakarta, </span>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>(__________________)</span>
            <span>(__________________)</span>
            <span>(__________________)</span>
        </div>

        <div class="diketahuioleh">
            <span><b>DIKETAHUI OLEH,</b></span>
            <br>
            <span>Jakarta, </span>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>(__________________)</span>
            <span>(__________________)</span>
            <span>(__________________)</span>
        </div>


    </div> -->


</body>

</html>