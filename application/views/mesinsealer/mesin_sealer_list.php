<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA MESIN SEALER</h3>
                    </div>

                    <div class="box-body table-responsive">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('mesinsealer/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                    <!-- <?php echo anchor(site_url('mesinsealer/create_manual'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Manual', 'class="btn btn-primary btn-sm"'); ?> -->
                                    <!-- <?php echo anchor(site_url('mesinsealer/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <form action="<?php echo site_url('mesinsealer/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('mesinsealer'); ?>" class="btn btn-default">Reset</a>
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
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>No Mesin</th>
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
                                        foreach ($mesinsealer_data as $mesinsealer) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $mesinsealer->no_wo ?></td>
                                        <td><?php echo $mesinsealer->full_name ?></td>
                                        <td><?php echo $mesinsealer->nama_customer ?></td>
                                        <td><?php echo $mesinsealer->tanggal ?></td>
                                        <td><?php echo $mesinsealer->waktu ?></td>
                                        <td><?php echo $mesinsealer->no_mesin ?></td>
                                        <td><?php echo $mesinsealer->shift ?></td>
                                        <td><?php echo $mesinsealer->lembar ?></td>
                                        <td><?php echo $mesinsealer->target ?></td>
                                        <td><?php echo $mesinsealer->hasil ?></td>
                                        <td><?php echo $mesinsealer->persentase ?></td>
                                        <!-- <td><?php echo $mesinsealer->warna ?></td>
                                    <td><?php echo $mesinsealer->bentuk ?></td>
                                    <td><?php echo $mesinsealer->ukuran ?></td>
                                    
                                    <td><?php echo $mesinsealer->rejected ?></td>
                                    <td><?php echo $mesinsealer->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_mesinsealer" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $mesinsealer->no_wo ?>" data-no_mesin="<?= $mesinsealer->no_mesin ?>" data-fullname="<?= $mesinsealer->full_name ?>" data-persentase="<?= $mesinsealer->persentase ?>" data-customer="<?= $mesinsealer->nama_customer ?>" data-tanggal="<?= $mesinsealer->tanggal ?>" data-waktu="<?= $mesinsealer->waktu ?>" data-shift="<?= $mesinsealer->shift ?>" data-warna="<?= $mesinsealer->warna ?>" data-bentuk="<?= $mesinsealer->bentuk ?>" data-ukuran="<?= $mesinsealer->ukuran ?>" data-lembar="<?= $mesinsealer->lembar ?>" data-target1="<?= $mesinsealer->target ?>" data-hasil="<?= $mesinsealer->hasil ?>" data-rejected="<?= $mesinsealer->rejected ?>" data-keterangan="<?= $mesinsealer->keterangan ?>"><i class="fa fa-eye"></i></button>

                                            <?php
                                            // echo anchor(site_url('mesinsealer/read/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('mesinsealer/update/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(site_url('mesinsealer/replay/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo '  ';
                                            // echo anchor(site_url('mesinsealer/reapet_manual/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo '  ';
                                            // echo anchor(site_url('mesinsealer/delete/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="return confirm("Apakah anda yakin??")"');
                                            ?>
                                            <?php if (superadmin()) { ?>
                                                <a href="<?= site_url('mesinsealer/delete/' . $mesinsealer->id_mesin_sealer) ?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="fa fa-trash"></i></a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table>
                        <?php } else { ?>
                            <table class="table table-bordered" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>No Wo</th>
                                    <th>Operator</th>
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>No Mesin</th>
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
                                        foreach ($mesinsealer_data_peruser as $mesinsealer) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $mesinsealer->no_wo ?></td>
                                        <td><?php echo $mesinsealer->full_name ?></td>
                                        <td><?php echo $mesinsealer->nama_customer ?></td>
                                        <td><?php echo $mesinsealer->tanggal ?></td>
                                        <td><?php echo $mesinsealer->waktu ?></td>
                                        <td><?php echo $mesinsealer->no_mesin ?></td>
                                        <td><?php echo $mesinsealer->shift ?></td>
                                        <td><?php echo $mesinsealer->lembar ?></td>
                                        <td><?php echo $mesinsealer->target ?></td>
                                        <td><?php echo $mesinsealer->hasil ?></td>
                                        <td><?php echo $mesinsealer->persentase ?></td>
                                        <!-- <td><?php echo $mesinsealer->warna ?></td>
                                    <td><?php echo $mesinsealer->bentuk ?></td>
                                    <td><?php echo $mesinsealer->ukuran ?></td>
                                    
                                    <td><?php echo $mesinsealer->rejected ?></td>
                                    <td><?php echo $mesinsealer->keterangan ?></td> -->
                                        <td style="text-align:center" width="160px">
                                            <button type="button" class="btn btn-info btn-sm" id="detail_mesinsealer" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $mesinsealer->no_wo ?>" data-no_mesin="<?= $mesinsealer->no_mesin ?>" data-fullname="<?= $mesinsealer->full_name ?>" data-persentase="<?= $mesinsealer->persentase ?>" data-customer="<?= $mesinsealer->nama_customer ?>" data-tanggal="<?= $mesinsealer->tanggal ?>" data-waktu="<?= $mesinsealer->waktu ?>" data-shift="<?= $mesinsealer->shift ?>" data-warna="<?= $mesinsealer->warna ?>" data-bentuk="<?= $mesinsealer->bentuk ?>" data-ukuran="<?= $mesinsealer->ukuran ?>" data-lembar="<?= $mesinsealer->lembar ?>" data-target1="<?= $mesinsealer->target ?>" data-hasil="<?= $mesinsealer->hasil ?>" data-rejected="<?= $mesinsealer->rejected ?>" data-keterangan="<?= $mesinsealer->keterangan ?>"><i class="fa fa-eye"></i></button>

                                            <?php
                                            // echo anchor(site_url('mesinsealer/read/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            // echo '  ';
                                            echo anchor(site_url('mesinsealer/update/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(site_url('mesinsealer/replay/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-reply" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
                                            echo '  ';
                                            // echo anchor(site_url('mesinsealer/reapet_manual/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-paper-plane" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm"');
                                            // echo '  ';
                                            // echo anchor(site_url('mesinsealer/delete/' . $mesinsealer->id_mesin_sealer), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="return confirm("Apakah anda yakin??")"');
                                            ?>
                                            <!-- <a href="<?= site_url('mesinsealer/delete/' . $mesinsealer->id_mesin_sealer) ?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="fa fa-trash"></i></a> -->

                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table>
                        <?php } ?>

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

<!-- MODAL DETAIL MESIN MESIN SEALER -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Mesin Mesin Sealer</h4>
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
                            <td><span id="operator1"></span>
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
                            <th>No. Mesin</th>
                            <td><span id="no_mesin"></span></td>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></span></td>
                        </tr>
                        <tr>
                            <th>Hasil</th>
                            <td><span id="hasil"></span></td>
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
    $(document).on('click', '#detail_mesinsealer', function() {
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
        $('#no_mesin').text($(this).data('no_mesin'))
        $('#persentase').text($(this).data('persentase'))
    })
</script>

<!-- <script>
    var flash = $('#flash').data('flash')
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flash,
        })
    }
</script> -->