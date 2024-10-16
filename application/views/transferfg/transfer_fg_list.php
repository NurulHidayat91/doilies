<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TRANSFER FG</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('transferfg/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                    <!-- <?php echo anchor(site_url('transferfg/create_manual'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Manual', 'class="btn btn-primary btn-sm"'); ?> -->
                                    <!-- <?php echo anchor(site_url('transferfg/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
                                </div>
                            </div>
                            <div class=' col-md-3'>
                                <form action="<?php echo site_url('transferfg/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('transferfg'); ?>" class="btn btn-default">Reset</a>
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
                                    <th>No Form</th>
                                    <th>Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Shift</th>
                                    <th>Customer</th>
                                    <th>Box Qty</th>
                                    <th>Box Pack</th>
                                    <th>Box Pcs</th>
                                    <th>Box Kg</th>
                                    <!-- <th>Warna</th>
                                <th>Bentuk</th>
                                <th>Ukuran</th>
                                <th>Lembar</th>
                                <th>Pattern</th>
                            
                                <th>Grade</th>
                                <th>Gsm</th>
                                <th>No Stock</th>
                                <th>Kode Sistem</th>
                                <th>Keterangan</th> -->
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($transferfg_data as $transferfg) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $transferfg->no_wo ?></td>
                                        <td><?php echo $transferfg->no_form ?></td>
                                        <td><?php echo $transferfg->full_name ?></td>
                                        <td><?php echo $transferfg->tanggal ?></td>
                                        <td><?php echo $transferfg->waktu ?></td>
                                        <td><?php echo $transferfg->shift ?></td>
                                        <td><?php echo $transferfg->nama_customer ?></td>
                                        <td><?php echo $transferfg->box_qty ?></td>
                                        <td><?php echo $transferfg->box_pack ?></td>
                                        <td><?php echo $transferfg->box_pcs ?></td>
                                        <td><?php echo $transferfg->box_kg ?></td>
                                        <!-- <td><?php echo $transferfg->warna ?></td>
                                    <td><?php echo $transferfg->bentuk ?></td>
                                    <td><?php echo $transferfg->ukuran ?></td>
                                    <td><?php echo $transferfg->lembar ?></td>
                                    <td><?php echo $transferfg->nama_pattern ?></td>
                                    <td><?php echo $transferfg->grade ?></td>
                                    <td><?php echo $transferfg->gsm ?></td>
                                    <td><?php echo $transferfg->no_stock ?></td>
                                    <td><?php echo $transferfg->kode_sistem ?></td>
                                    <td><?php echo $transferfg->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_transferfg" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $transferfg->no_wo ?>" data-noform="<?= $transferfg->no_form ?>" data-fullname="<?= $transferfg->full_name ?>" data-customer="<?= $transferfg->nama_customer ?>" data-box_qty="<?= $transferfg->box_qty ?>" data-box_pack="<?= $transferfg->box_pack ?>" data-box_pcs="<?= $transferfg->box_pcs ?>" data-box_kg="<?= $transferfg->box_kg ?>" data-pattern="<?= $transferfg->nama_pattern ?>" data-tanggal="<?= $transferfg->tanggal ?>" data-waktu="<?= $transferfg->waktu ?>" data-shift="<?= $transferfg->shift ?>" data-warna="<?= $transferfg->warna ?>" data-bentuk="<?= $transferfg->bentuk ?>" data-ukuran="<?= $transferfg->ukuran ?>" data-lembar="<?= $transferfg->lembar ?>" data-boxQty="<?= $transferfg->box_qty ?>" data-boxKg="<?= $transferfg->box_kg ?>" data-grade="<?= $transferfg->grade ?>" data-gsm="<?= $transferfg->gsm ?>" data-no_stock="<?= $transferfg->no_stock ?>" data-kode_sistem="<?= $transferfg->kode_sistem ?>" data-keterangan="<?= $transferfg->keterangan ?>" data-no_stock="<?= $transferfg->no_stock ?>"><i class="fa fa-eye"></i></button>
                                            <?php
                                            // echo anchor(site_url('transferfg/read/' . $transferfg->id_transfer_fg), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('transferfg/update/' . $transferfg->id_transfer_fg), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(site_url('transferfg/replay/' . $transferfg->id_transfer_fg), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo '  ';

                                            // echo anchor(site_url('transferfg/replay_manual/' . $transferfg->id_transfer_fg), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo '  ';
                                            if (superadmin()) {
                                                echo anchor(site_url('transferfg/delete/' . $transferfg->id_transfer_fg), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" id="btn-hapus" Delete');
                                            }
                                            ?>
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
                                    <th>No Form</th>
                                    <th>Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Shift</th>
                                    <th>Customer</th>
                                    <th>Box Qty</th>
                                    <th>Box Pack</th>
                                    <th>Box Pcs</th>
                                    <th>Box Kg</th>
                                    <!-- <th>Warna</th>
                                <th>Bentuk</th>
                                <th>Ukuran</th>
                                <th>Lembar</th>
                                <th>Pattern</th>
                            
                                <th>Grade</th>
                                <th>Gsm</th>
                                <th>No Stock</th>
                                <th>Kode Sistem</th>
                                <th>Keterangan</th> -->
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($transferfg_data_peruser as $transferfg) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $transferfg->no_wo ?></td>
                                        <td><?php echo $transferfg->no_form ?></td>
                                        <td><?php echo $transferfg->full_name ?></td>
                                        <td><?php echo $transferfg->tanggal ?></td>
                                        <td><?php echo $transferfg->waktu ?></td>
                                        <td><?php echo $transferfg->shift ?></td>
                                        <td><?php echo $transferfg->nama_customer ?></td>
                                        <td><?php echo $transferfg->box_qty ?></td>
                                        <td><?php echo $transferfg->box_pack ?></td>
                                        <td><?php echo $transferfg->box_pcs ?></td>
                                        <td><?php echo $transferfg->box_kg ?></td>
                                        <!-- <td><?php echo $transferfg->warna ?></td>
                                    <td><?php echo $transferfg->bentuk ?></td>
                                    <td><?php echo $transferfg->ukuran ?></td>
                                    <td><?php echo $transferfg->lembar ?></td>
                                    <td><?php echo $transferfg->nama_pattern ?></td>
                                    <td><?php echo $transferfg->grade ?></td>
                                    <td><?php echo $transferfg->gsm ?></td>
                                    <td><?php echo $transferfg->no_stock ?></td>
                                    <td><?php echo $transferfg->kode_sistem ?></td>
                                    <td><?php echo $transferfg->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_transferfg" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $transferfg->no_wo ?>" data-noform="<?= $transferfg->no_form ?>" data-fullname="<?= $transferfg->full_name ?>" data-customer="<?= $transferfg->nama_customer ?>" data-box_qty="<?= $transferfg->box_qty ?>" data-box_pack="<?= $transferfg->box_pack ?>" data-box_pcs="<?= $transferfg->box_pcs ?>" data-box_kg="<?= $transferfg->box_kg ?>" data-pattern="<?= $transferfg->nama_pattern ?>" data-tanggal="<?= $transferfg->tanggal ?>" data-waktu="<?= $transferfg->waktu ?>" data-shift="<?= $transferfg->shift ?>" data-warna="<?= $transferfg->warna ?>" data-bentuk="<?= $transferfg->bentuk ?>" data-ukuran="<?= $transferfg->ukuran ?>" data-lembar="<?= $transferfg->lembar ?>" data-boxQty="<?= $transferfg->box_qty ?>" data-boxKg="<?= $transferfg->box_kg ?>" data-grade="<?= $transferfg->grade ?>" data-gsm="<?= $transferfg->gsm ?>" data-no_stock="<?= $transferfg->no_stock ?>" data-kode_sistem="<?= $transferfg->kode_sistem ?>" data-keterangan="<?= $transferfg->keterangan ?>" data-no_stock="<?= $transferfg->no_stock ?>"><i class="fa fa-eye"></i></button>
                                            <?php
                                            // echo anchor(site_url('transferfg/read/' . $transferfg->id_transfer_fg), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('transferfg/update/' . $transferfg->id_transfer_fg), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(site_url('transferfg/replay/' . $transferfg->id_transfer_fg), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo '  ';

                                            // echo anchor(site_url('transferfg/replay_manual/' . $transferfg->id_transfer_fg), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo '  ';
                                            // echo anchor(site_url('transferfg/delete/' . $transferfg->id_transfer_fg), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" id="btn-hapus" Delete');
                                            ?>
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


<!-- MODAL DETAIL TRANSFER FG -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Mesin Transfer FG</h4>
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
                            <th>Karyawan</th>
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
                            <th>Grade</th>
                            <td><span id="grade"></span></td>
                            <th>Gsm</th>
                            <td><span id="gsm"></span></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></span></td>
                            <th>No Stock</th>
                            <td><span id="no_stock"></span></td>
                        </tr>
                        <tr>
                            <th>Kode_sistem</th>
                            <td><span id="kode_sistem"></span></td>
                            <th>Pattern</th>
                            <td><span id="pattern"></span></td>
                        </tr>
                        <tr>
                            <th>Box</th>
                            <td><span id="box_qty"></span></td>
                            <th>Pack</th>
                            <td><span id="box_pack"></span></td>
                        </tr>
                        <tr>
                            <th>Pcs</th>
                            <td><span id="box_pcs"></span></td>
                            <th>Kg</th>
                            <td><span id="box_kg"></span></td>
                        </tr>

                        <tr>
                            <th>No.Form</th>
                            <td><span id="no_form"></span></td>
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
    $(document).on('click', '#detail_transferfg', function() {
        $('#no_wo').text($(this).data('nowo'))
        $('#cust').text($(this).data('customer'))
        $('#datetime').text($(this).data('tanggal'))
        $('#operator1').text($(this).data('fullname'))
        $('#waktu').text($(this).data('waktu'))
        $('#shift').text($(this).data('shift'))
        $('#warna').text($(this).data('warna'))
        $('#bentuk').text($(this).data('bentuk'))
        $('#grade').text($(this).data('grade'))
        $('#gsm').text($(this).data('gsm'))
        $('#no_stock').text($(this).data('no_stock'))
        $('#lembar').text($(this).data('lembar'))
        $('#ukuran').text($(this).data('ukuran'))
        $('#keterangan').text($(this).data('keterangan'))
        $('#kode_sistem').text($(this).data('kode_sistem'))
        $('#pattern').text($(this).data('pattern'))
        $('#box_kg').text($(this).data('box_kg'))
        $('#box_qty').text($(this).data('box_qty'))
        $('#box_pack').text($(this).data('box_pack'))
        $('#box_pcs').text($(this).data('box_pcs'))
        $('#no_form').text($(this).data('noform'))

    })
</script>