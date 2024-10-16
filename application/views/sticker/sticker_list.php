<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA STICKER</h3>
                    </div>

                    <div class="box-body table-responsive">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('sticker/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                    <?php echo anchor(site_url('sticker/create_manual'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Manual', 'class="btn btn-primary btn-sm"'); ?>
                                    <?php echo anchor(site_url('sticker/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <form action="<?php echo site_url('sticker/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('sticker'); ?>" class="btn btn-default">Reset</a>
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
                            <table class="table table-bordered table-striped" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>No Wo</th>
                                    <th>Operator</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Customer</th>
                                    <th>Shift</th>
                                    <th>Lembar</th>
                                    <th>Target</th>
                                    <th>Hasil</th>
                                    <th>Persentase</th>
                                    <!-- <th>Warna</th>
                                <th>Bentuk</th>
                                <th>Ukuran</th>
                                <th>Brokes</th>
                                <th>Keterangan</th> -->
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($sticker_data as $sticker) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $sticker->no_wo ?></td>
                                        <td><?php echo $sticker->full_name ?></td>
                                        <td><?php echo $sticker->tanggal ?></td>
                                        <td><?php echo $sticker->waktu ?></td>
                                        <td><?php echo $sticker->nama_customer ?></td>
                                        <td><?php echo $sticker->shift ?></td>
                                        <td><?php echo $sticker->lembar ?></td>
                                        <td><?php echo $sticker->target ?></td>
                                        <td><?php echo $sticker->hasil ?></td>
                                        <td><?php echo $sticker->persentase ?></td>
                                        <!-- <td><?php echo $sticker->warna ?></td>
                                    <td><?php echo $sticker->bentuk ?></td>
                                    <td><?php echo $sticker->ukuran ?></td>
                                    <td><?php echo $sticker->rejected ?></td>
                                    <td><?php echo $sticker->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_sticker" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $sticker->no_wo ?>" data-fullname="<?= $sticker->full_name ?>" data-persentase="<?= $sticker->persentase ?>" data-customer="<?= $sticker->nama_customer ?>" data-tanggal="<?= $sticker->tanggal ?>" data-waktu="<?= $sticker->waktu ?>" data-shift="<?= $sticker->shift ?>" data-warna="<?= $sticker->warna ?>" data-bentuk="<?= $sticker->bentuk ?>" data-ukuran="<?= $sticker->ukuran ?>" data-lembar="<?= $sticker->lembar ?>" data-target1="<?= $sticker->target ?>" data-hasil="<?= $sticker->hasil ?>" data-rejected="<?= $sticker->rejected ?>" data-keterangan="<?= $sticker->keterangan ?>"><i class="fa fa-eye"></i></button>

                                            <?php
                                            // echo anchor(site_url('sticker/read/' . $sticker->id_sticker), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('sticker/update/' . $sticker->id_sticker), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo ' ';

                                            echo anchor(site_url('sticker/replay/' . $sticker->id_sticker), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo ' ';

                                            // echo anchor(site_url('sticker/replay_manual/' . $sticker->id_sticker), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo ' ';
                                            if (superadmin()) {
                                                echo anchor(site_url('sticker/delete/' . $sticker->id_sticker), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" id="btn-hapus" Delete');
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table>
                        <?php } else { ?>
                            <table class="table table-bordered table-striped" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>No Wo</th>
                                    <th>Operator</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Customer</th>
                                    <th>Shift</th>
                                    <th>Lembar</th>
                                    <th>Target</th>
                                    <th>Hasil</th>
                                    <th>Persentase</th>
                                    <!-- <th>Warna</th>
                                <th>Bentuk</th>
                                <th>Ukuran</th>
                                <th>Brokes</th>
                                <th>Keterangan</th> -->
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($sticker_data_peruser as $sticker) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $sticker->no_wo ?></td>
                                        <td><?php echo $sticker->full_name ?></td>
                                        <td><?php echo $sticker->tanggal ?></td>
                                        <td><?php echo $sticker->waktu ?></td>
                                        <td><?php echo $sticker->nama_customer ?></td>
                                        <td><?php echo $sticker->shift ?></td>
                                        <td><?php echo $sticker->lembar ?></td>
                                        <td><?php echo $sticker->target ?></td>
                                        <td><?php echo $sticker->hasil ?></td>
                                        <td><?php echo $sticker->persentase ?></td>
                                        <!-- <td><?php echo $sticker->warna ?></td>
                                    <td><?php echo $sticker->bentuk ?></td>
                                    <td><?php echo $sticker->ukuran ?></td>
                                    <td><?php echo $sticker->rejected ?></td>
                                    <td><?php echo $sticker->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_sticker" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $sticker->no_wo ?>" data-fullname="<?= $sticker->full_name ?>" data-persentase="<?= $sticker->persentase ?>" data-customer="<?= $sticker->nama_customer ?>" data-tanggal="<?= $sticker->tanggal ?>" data-waktu="<?= $sticker->waktu ?>" data-shift="<?= $sticker->shift ?>" data-warna="<?= $sticker->warna ?>" data-bentuk="<?= $sticker->bentuk ?>" data-ukuran="<?= $sticker->ukuran ?>" data-lembar="<?= $sticker->lembar ?>" data-target1="<?= $sticker->target ?>" data-hasil="<?= $sticker->hasil ?>" data-rejected="<?= $sticker->rejected ?>" data-keterangan="<?= $sticker->keterangan ?>"><i class="fa fa-eye"></i></button>

                                            <?php
                                            // echo anchor(site_url('sticker/read/' . $sticker->id_sticker), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('sticker/update/' . $sticker->id_sticker), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo ' ';

                                            echo anchor(site_url('sticker/replay/' . $sticker->id_sticker), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo ' ';

                                            // echo anchor(site_url('sticker/replay_manual/' . $sticker->id_sticker), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo ' ';
                                            // echo anchor(site_url('sticker/delete/' . $sticker->id_sticker), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" id="btn-hapus" Delete');
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table> <?php  } ?>

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


<!-- MODAL DETAIL MESIN STICKER -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Mesin Sticker</h4>
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
                            <th>Waktu</th>
                            <td><span id="waktu"></span></td>
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
                            <th>Keterangan</th>
                            <td><span id="keterangan"></span></td>
                            <th>Hasil</th>
                            <td><span id="hasil"></span></td>
                        </tr>
                        <tr>
                            <th>Persentase</th>
                            <td><span id="persentase"></span></td>
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
    $(document).on('click', '#detail_sticker', function() {
        $('#no_wo').text($(this).data('nowo'))
        $('#cust').text($(this).data('customer'))
        $('#datetime').text($(this).data('tanggal'))
        $('#operator1').text($(this).data('fullname'))
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
        $('#persentase').text($(this).data('persentase'))



    })
</script>