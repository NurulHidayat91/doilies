<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA REPACK</h3>
                    </div>

                    <div class="box-body table-responsive">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('reapack/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                    <!-- <?php echo anchor(site_url('reapack/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <form action="<?php echo site_url('reapack/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('reapack'); ?>" class="btn btn-default">Reset</a>
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
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                <th>No</th>
                                <th>Tgl Terima Wo</th>
                                <!-- <th>Subjek Email</th> -->
                                <th>No Wo</th>
                                <th>Karyawan</th>
                                <th>Customer</th>
                                <th>Kode Item</th>
                                <th>Bentuk</th>
                                <th>Ukuran</th>
                                <th>Lembar</th>
                                <!-- <th>Grade</th>
                                <th>Gsm</th>
                                <th>Warna</th> -->
                                <th>Pack</th>
                                <!-- <th>Warna Inner</th> -->
                                <!-- <th>Pattern</th> -->
                                <th>Qty Box</th>
                                <!-- <th>Barcode Inner</th>
                                <th>Barcode Outer</th>
                                <th>Hal</th> -->
                                <th>Status Transfer</th>
                                <th>Action</th>
                            </tr><?php
                                    foreach ($reapack_data as $reapack) {
                                    ?>
                                <tr>
                                    <td width="10px"><?php echo ++$start ?></td>
                                    <td><?php echo $reapack->tanggal_terima ?></td>
                                    <!-- <td><?php echo $reapack->subjek_email ?></td> -->
                                    <td><?php echo $reapack->no_wo ?></td>
                                    <td><?php echo $reapack->full_name ?></td>
                                    <td><?php echo $reapack->nama_customer ?></td>
                                    <td><?php echo $reapack->kode_item ?></td>
                                    <td><?php echo $reapack->bentuk ?></td>
                                    <td><?php echo $reapack->ukuran ?></td>
                                    <td><?php echo $reapack->lembar ?></td>
                                    <!-- <td><?php echo $reapack->id_grade ?></td>
                                    <td><?php echo $reapack->gsm ?></td>
                                    <td><?php echo $reapack->warna ?></td> -->
                                    <td><?php echo $reapack->pack ?></td>
                                    <!-- <td><?php echo $reapack->warna_inner ?></td>
                                    <td><?php echo $reapack->pattern ?></td> -->
                                    <td><?php echo $reapack->qty_box ?></td>
                                    <!-- <td><?php echo $reapack->barcode_inner ?></td>
                                    <td><?php echo $reapack->barcode_outer ?></td>
                                    <td><?php echo $reapack->hal ?></td> -->
                                    <td><?php echo $reapack->status_transfer ?></td>
                                    <td style="text-align:center" width="140px">
                                        <button type="button" class="btn btn-info btn-sm" id="detail_repack" data-target="#modal-detail" title="Lihat Data" data-toggle="modal" data-tanggal_terima="<?= $reapack->tanggal_terima ?>" data-no_wo="<?= $reapack->no_wo ?>" data-fullname="<?= $reapack->full_name ?>" data-subjek_email="<?= $reapack->subjek_email ?>" data-customer="<?= $reapack->nama_customer ?>" data-kode_item="<?= $reapack->kode_item ?>" data-pack="<?= $reapack->pack ?>" data-warna_inner="<?= $reapack->warna_inner ?>" data-qty_box="<?= $reapack->qty_box ?>" data-barcode_inner="<?= $reapack->barcode_inner ?>" data-barcode_outer="<?= $reapack->barcode_outer ?>" data-hal="<?= $reapack->hal ?>" data-status_transfer="<?= $reapack->status_transfer ?>" data-pattern="<?= $reapack->nama_pattern ?>" data-warna="<?= $reapack->warna ?>" data-bentuk="<?= $reapack->bentuk ?>" data-ukuran="<?= $reapack->ukuran ?>" data-lembar="<?= $reapack->lembar ?>" data-grade="<?= $reapack->grade ?>" data-gsm="<?= $reapack->gsm ?>"><i class="fa fa-eye"></i></button>

                                        <?php
                                        // echo anchor(site_url('reapack/read/' . $reapack->id_repack), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        // echo '  ';
                                        echo anchor(site_url('reapack/update/' . $reapack->id_repack), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" title="Edit Data"');
                                        echo '  ';
                                        echo anchor(site_url('reapack/replay/' . $reapack->id_repack), '<i class="fa fa-history" aria-hidden="true"></i>', 'class="btn btn-success btn-sm" title="Reapet Data" id="reapet"');
                                        echo '  ';
                                        if (superadmin()) {
                                            echo anchor(site_url('reapack/delete/' . $reapack->id_repack), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" id="btn-hapus" Delete');
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                    }
                            ?>
                        </table>
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

<!-- MODAL DETAIL OPERATOR MESIN -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Repack</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin border-3">
                    <tbody>
                        <tr>
                            <th>Tanggal Penerima</th>
                            <td><span id="tanggal_terima"></span></td>
                            <th>Subjek Email</th>
                            <td><span id="subject_email"></span></td>
                            <th>No. Wo</th>
                            <td><span id="no_wo"></span></td>
                        </tr>
                        <tr>
                            <th>Customer</th>
                            <td><span id="customer"></span></td>
                            <th>Kode Item</th>
                            <td><span id="kode_item"></span></td>
                            <th>Bentuk</th>
                            <td><span id="bentuk"></span></td>

                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td><span id="ukuran"></span></td>
                            <th>lembar</th>
                            <td><span id="lembar"></span></td>
                            <th>Pack</th>
                            <td><span id="pack"></span></td>

                        <tr>
                            <th>Grade</th>
                            <td><span id="grade"></span></td>
                            <th>GSM</th>
                            <td><span id="gsm"></span></td>
                            <th>Warna</th>
                            <td><span id="warna"></span></td>
                        </tr>
                        <tr>
                            <th>Warna Inner</th>
                            <td><span id="warna_inner"></span></td>
                            <th>Qty (BOX) </th>
                            <td><span id="qty_box"></span></td>
                            <th>Barcode_inner</th>
                            <td><span id="barcode_inner"></span></td>
                        </tr>
                        <tr>
                            <th>Barcode Outer</th>
                            <td><span id="barcode_outer"></span></td>
                            <th>Hal</th>
                            <td><span id="hal"></span></td>
                            <th>Status Transfer</th>
                            <td><span id="status_transfer"></span></td>
                        </tr>

                        <tr>
                            <th>Karyawan</th>
                            <td><span id="fullname"></span></td>
                            <th>Pattern</th>
                            <td><span id="pattern"></span></td>
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
    $(document).on('click', '#detail_repack', function() {
        $('#no_wo').text($(this).data('no_wo'))
        $('#tanggal_terima').text($(this).data('tanggal_terima'))
        $('#subject_email').text($(this).data('subjek_email'))
        $('#fullname').text($(this).data('fullname'))
        $('#customer').text($(this).data('customer'))
        $('#kode_item').text($(this).data('kode_item'))
        $('#warna').text($(this).data('warna'))
        $('#bentuk').text($(this).data('bentuk'))
        $('#grade').text($(this).data('grade'))
        $('#gsm').text($(this).data('gsm'))
        $('#lembar').text($(this).data('lembar'))
        $('#ukuran').text($(this).data('ukuran'))
        $('#lebar').text($(this).data('lebar'))
        $('#warna_inner').text($(this).data('warna_inner'))
        $('#pack').text($(this).data('pack'))
        $('#pattern').text($(this).data('pattern'))
        $('#qty_box').text($(this).data('qty_box'))
        $('#barcode_inner').text($(this).data('barcode_inner'))
        $('#barcode_outer').text($(this).data('barcode_outer'))
        $('#hal').text($(this).data('hal'))
        $('#status_transfer').text($(this).data('status_transfer'))

    })

    function buzz() {

        var name = document.getElementById("reapet");
        name.removeAttr('comment')
        // document.querySelector('div').name.remove('comment'); // document.getElementById("reapet").modal('comment').hidden();
        // var display = document.querySelector('[id="notif"]').innerHTML;
    }
</script>