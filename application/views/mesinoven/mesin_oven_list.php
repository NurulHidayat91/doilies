<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA MESIN OVEN</h3>
                    </div>

                    <div class="box-body table-responsive">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('mesinoven/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                    <!-- <?php echo anchor(site_url('mesinoven/create_manual'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Manual', 'class="btn btn-primary btn-sm"'); ?> -->
                                    <!-- <?php echo anchor(site_url('mesinoven/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
                                </div>
                            </div>
                            <div class=' col-md-3'>
                                <form action="<?php echo site_url('mesinoven/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('mesinoven'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                            }
                                            ?>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4 text-center">
                                <!-- <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div> -->
                                <div id="flash" data-flash="<?= $this->session->userdata('message') ?>"></div>

                            </div>
                            <div class="col-md-1 text-right">
                            </div>
                            <div class="col-md-3 text-right">

                            </div>
                        </div>
                        <?php if (superadmin() || admin()) { ?>
                            <table class="table table-bordered" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>No Wo</th>
                                    <th>Operator</th>
                                    <th>Operator 2</th>
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>No Mesin</th>
                                    <th>Suhu</th>
                                    <th>Shift</th>
                                    <th>Lembar</th>
                                    <th>Target</th>
                                    <th>Hasil</th>
                                    <th>Persentase</th>
                                    <!-- <th>Warna</th>
                                    <th>Bentuk</th>
                                    <th>Ukuran</th>
                                    <th>Rejected</th>
                                    <th>Keterangan</th> -->
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($mesinoven_data as $mesinoven) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $mesinoven->no_wo ?></td>
                                        <td><?php echo $mesinoven->full_name ?></td>
                                        <td><?php echo $mesinoven->operator2 ?></td>
                                        <td><?php echo $mesinoven->nama_customer ?></td>
                                        <td><?php echo $mesinoven->tanggal ?></td>
                                        <td><?php echo $mesinoven->waktu ?></td>
                                        <td><?php echo $mesinoven->no_mesin ?></td>
                                        <td><?php echo $mesinoven->speed ?></td>
                                        <td><?php echo $mesinoven->shift ?></td>
                                        <td><?php echo $mesinoven->lembar ?></td>
                                        <td><?php echo $mesinoven->target ?></td>
                                        <td><?php echo $mesinoven->hasil ?></td>
                                        <td><?php echo $mesinoven->persentase ?></td>
                                        <!-- <td><?php echo $mesinoven->warna ?></td>
                                        <td><?php echo $mesinoven->bentuk ?></td>
                                        <td><?php echo $mesinoven->ukuran ?></td>
                                        
                                        <td><?php echo $mesinoven->rejected ?></td>
                                        <td><?php echo $mesinoven->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_mesinoven" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $mesinoven->no_wo ?>" data-no_mesin="<?= $mesinoven->no_mesin ?>" data-speed="<?= $mesinoven->speed ?>" data-persentase="<?= $mesinoven->persentase ?>" data-fullname="<?= $mesinoven->full_name ?>" data-customer="<?= $mesinoven->nama_customer ?>" data-tanggal="<?= $mesinoven->tanggal ?>" data-waktu="<?= $mesinoven->waktu ?>" data-shift="<?= $mesinoven->shift ?>" data-warna="<?= $mesinoven->warna ?>" data-bentuk="<?= $mesinoven->bentuk ?>" data-ukuran="<?= $mesinoven->ukuran ?>" data-lembar="<?= $mesinoven->lembar ?>" data-target1="<?= $mesinoven->target ?>" data-hasil="<?= $mesinoven->hasil ?>" data-rejected="<?= $mesinoven->rejected ?>" data-keterangan="<?= $mesinoven->keterangan ?>"><i class="fa fa-eye"></i></button>

                                            <?php
                                            // echo anchor(site_url('mesinoven/read/' . $mesinoven->id_mesin_oven), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('mesinoven/update/' . $mesinoven->id_mesin_oven), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';

                                            echo anchor(site_url('mesinoven/replay/' . $mesinoven->id_mesin_oven), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo '  ';

                                            // echo anchor(site_url('mesinoven/replay_manual/' . $mesinoven->id_mesin_oven), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo '  ';
                                            // echo anchor(site_url('mesinoven/delete/' . $mesinoven->id_mesin_oven), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                            ?>
                                            <?php if (superadmin()) { ?>
                                                <a id="btn-hapus" href="<?= site_url('mesinoven/delete/' . $mesinoven->id_mesin_oven) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table>
                        <?php  } else { ?>
                            <table class="table table-bordered" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>No Wo</th>
                                    <th>Operator</th>
                                    <th>Operator2</th>
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>No Mesin</th>
                                    <th>Suhu</th>
                                    <th>Shift</th>
                                    <th>Lembar</th>
                                    <th>Target</th>
                                    <th>Hasil</th>
                                    <th>Persentase</th>
                                    <!-- <th>Warna</th>
                                    <th>Bentuk</th>
                                    <th>Ukuran</th>
                                    <th>Rejected</th>
                                    <th>Keterangan</th> -->
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($mesinoven_data_peruser as $mesinoven) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $mesinoven->no_wo ?></td>
                                        <td><?php echo $mesinoven->full_name ?></td>
                                        <td><?php echo $mesinoven->operator2 ?></td>
                                        <td><?php echo $mesinoven->nama_customer ?></td>
                                        <td><?php echo $mesinoven->tanggal ?></td>
                                        <td><?php echo $mesinoven->waktu ?></td>
                                        <td><?php echo $mesinoven->no_mesin ?></td>
                                        <td><?php echo $mesinoven->speed ?></td>
                                        <td><?php echo $mesinoven->shift ?></td>
                                        <td><?php echo $mesinoven->lembar ?></td>
                                        <td><?php echo $mesinoven->target ?></td>
                                        <td><?php echo $mesinoven->hasil ?></td>
                                        <td><?php echo $mesinoven->persentase ?></td>
                                        <!-- <td><?php echo $mesinoven->warna ?></td>
                                        <td><?php echo $mesinoven->bentuk ?></td>
                                        <td><?php echo $mesinoven->ukuran ?></td>
                                        
                                        <td><?php echo $mesinoven->rejected ?></td>
                                        <td><?php echo $mesinoven->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_mesinoven" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $mesinoven->no_wo ?>" data-no_mesin="<?= $mesinoven->no_mesin ?>" data-speed="<?= $mesinoven->speed ?>" data-persentase="<?= $mesinoven->persentase ?>" data-fullname="<?= $mesinoven->full_name ?>" data-customer="<?= $mesinoven->nama_customer ?>" data-tanggal="<?= $mesinoven->tanggal ?>" data-waktu="<?= $mesinoven->waktu ?>" data-shift="<?= $mesinoven->shift ?>" data-warna="<?= $mesinoven->warna ?>" data-bentuk="<?= $mesinoven->bentuk ?>" data-ukuran="<?= $mesinoven->ukuran ?>" data-lembar="<?= $mesinoven->lembar ?>" data-target1="<?= $mesinoven->target ?>" data-hasil="<?= $mesinoven->hasil ?>" data-rejected="<?= $mesinoven->rejected ?>" data-keterangan="<?= $mesinoven->keterangan ?>"><i class="fa fa-eye"></i></button>

                                            <?php
                                            // echo anchor(site_url('mesinoven/read/' . $mesinoven->id_mesin_oven), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('mesinoven/update/' . $mesinoven->id_mesin_oven), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';

                                            echo anchor(site_url('mesinoven/replay/' . $mesinoven->id_mesin_oven), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo '  ';

                                            // echo anchor(site_url('mesinoven/replay_manual/' . $mesinoven->id_mesin_oven), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo '  ';
                                            // echo anchor(site_url('mesinoven/delete/' . $mesinoven->id_mesin_oven), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                            ?>
                                            <!-- <a id="btn-hapus" href="<?= site_url('mesinoven/delete/' . $mesinoven->id_mesin_oven) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->

                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table> <?php } ?>

                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL DETAIL MESIN POLYBAG -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Mesin Mesin Oven</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin border-3">
                    <tbody>
                        <tr>
                            <th style="width:20%">No WO</th>
                            <td style="width:30%"><span id="no_wo"></span></td>
                            <th style="width:20%">Customer</th>
                            <td style="width:30%"><span id="cust"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><span id="datetime"></span></td>
                            <th>Shift</th>
                            <td><span id="shift"></span></td>
                        </tr>
                        <tr>
                            <th>Operator</th>
                            <td><span id="operator1"></alspan>
                            </td>
                            <th>Operator2</th>
                            <td><span id="operator2"></span></td>

                        </tr>

                        <tr>
                            <th>Warna</th>
                            <td><span id="warna"></span></td>
                            <th>Bentuk</th>
                            <td><span id="bentuk"></span></td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td><span id="ukuran"></span></td>
                            <th>lembar</th>
                            <td><span id="lembar"></span></td>
                        </tr>
                        <tr>
                            <th>Target</th>
                            <td><span id="target1"></span></td>
                            <th>Broke</th>
                            <td><span id="broke"></span></td>
                        </tr>
                        <tr>
                            <th>No. Mesin</th>
                            <td><span id="no_mesin"></span></td>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></span></td>
                        </tr>
                        <tr>
                            <th>Suhu</th>
                            <td><span id="speed"></span></td>
                            <th>Hasil</th>
                            <td><span id="hasil"></span></td>
                        </tr>
                        <tr>
                            <th>Persentase</th>
                            <td><span id="persentase"></span></td>
                            <th>Waktu</th>
                            <td><span id="waktu"></span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script>
    $(document).on('click', '#detail_mesinoven', function() {
        $('#no_wo').text($(this).data('nowo'))
        $('#cust').text($(this).data('customer'))
        $('#datetime').text($(this).data('tanggal'))
        $('#operator1').text($(this).data('fullname'))
        $('#operator2').text($(this).data('operator2'))
        $('#waktu').text($(this).data('waktu'))
        $('#shift').text($(this).data('shift'))
        $('#warna').text($(this).data('warna'))
        $('#bentuk').text($(this).data('bentuk'))
        $('#target1').text($(this).data('target1'))
        $('#hasil').text($(this).data('hasil'))
        $('#broke').text($(this).data('rejected'))
        $('#lembar').text($(this).data('lembar'))
        $('#ukuran').text($(this).data('ukuran'))
        $('#keterangan').text($(this).data('keterangan'))
        $('#no_mesin').text($(this).data('no_mesin'))
        $('#speed').text($(this).data('speed'))
        $('#persentase').text($(this).data('persentase'))



    })
</script>