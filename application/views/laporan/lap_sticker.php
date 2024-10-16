<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">FILTER DATA</h3>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Date</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="date1" value="<?= @$post['date1'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">s/d</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="date2" class="form-control" value="<?= @$post['date2'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">No.Wo</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_wo" value="<?= @$post['no_wo'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Opeator</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="full_name" value="<?= @$post['full_name'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-4">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-6 control-label">Sales</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="username" value="<?= @$post['username'] ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="right">
                                        <button type="submit" name="reset" class="btn btn-flat">Reset</button>
                                        <button type="submit" name="filter" class="btn btn-info btn-flat"><i class="fa fa-search"></i>Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">LAPORAN PROSES STICKER</h3>
                    </div>

                    <div class="box-body  table-responsive">

                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Wo</th>
                                    <th>Operator</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Customer</th>
                                    <th>Shift</th>
                                    <th>Warna</th>
                                    <th>Bentuk</th>
                                    <th>Ukuran</th>
                                    <th>Lembar</th>
                                    <th>Target</th>
                                    <th>Hasil</th>
                                    <th>Brokes</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $totalHasil = 0;
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;

                                foreach ($row->result() as $sticker) {
                                    (int)$totalHasil += (int)$sticker->hasil
                                ?>
                                    <tr>
                                        <td width="10px"><?php echo $no++ ?></td>
                                        <td><?php echo $sticker->no_wo ?></td>
                                        <td><?php echo $sticker->full_name ?></td>
                                        <td><?php echo $sticker->tanggal ?></td>
                                        <td><?php echo $sticker->waktu ?></td>
                                        <td><?php echo $sticker->nama_customer ?></td>
                                        <td><?php echo $sticker->shift ?></td>
                                        <td><?php echo $sticker->warna ?></td>
                                        <td><?php echo $sticker->bentuk ?></td>
                                        <td><?php echo $sticker->ukuran ?></td>
                                        <td><?php echo $sticker->lembar ?></td>
                                        <td><?php echo $sticker->target ?></td>
                                        <td><?php echo $sticker->hasil ?></td>
                                        <td><?php echo $sticker->rejected ?></td>
                                        <td><?php echo $sticker->keterangan ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <th colspan="11">TOTAL</th>
                                <th>
                                <td style="text-align: right;" id="totalqty"><strong><?= $totalHasil ?></strong></td>
                                </th>
                            </tfoot>
                        </table>

                    </div>

                    <!-- PAGINATION -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?= $pagination ?>
                        </ul>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    <a class="btn btn-success" href="<?= base_url() . 'laporan/export_excel_laporan_sticker' ?>">Export Excel</a>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>