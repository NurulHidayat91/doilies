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
                                            <label class="col-sm-6 control-label">Operator</label>
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
                        <h3 class="box-title">LAPORAN PROSES MESIN GEPREK</h3>
                    </div>

                    <div class="box-body  table-responsive">

                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Shift</th>
                                    <th>Operator1</th>
                                    <th>Operator2</th>
                                    <th>No Wo</th>
                                    <th>Customer</th>
                                    <th>Mesin</th>
                                    <th>Warna</th>
                                    <th>Bentuk</th>
                                    <th>Ukuran</th>
                                    <th>Lembar</th>
                                    <th>Target</th>
                                    <th>Hasil</th>
                                    <th>Broke</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $totalHasil = 0;
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($row->result() as $mesingeprek) {
                                    $totalHasil += (int)$mesingeprek->hasil
                                ?>
                                    <tr>
                                        <td width="10px"><?php echo $no++  ?></td>
                                        <td><?php echo $mesingeprek->tanggal ?></td>
                                        <td><?php echo $mesingeprek->waktu ?></td>
                                        <td><?php echo $mesingeprek->shift ?></td>
                                        <td><?php echo $mesingeprek->full_name ?></td>
                                        <td><?php echo $mesingeprek->operator2 ?></td>
                                        <td><?php echo $mesingeprek->no_wo ?></td>
                                        <td><?php echo $mesingeprek->nama_customer ?></td>
                                        <td><?php echo $mesingeprek->kode_mesin ?></td>
                                        <td><?php echo $mesingeprek->warna ?></td>
                                        <td><?php echo $mesingeprek->bentuk ?></td>
                                        <td><?php echo $mesingeprek->ukuran ?></td>
                                        <td><?php echo $mesingeprek->lembar ?></td>
                                        <td><?php echo $mesingeprek->target ?></td>
                                        <td><?php echo $mesingeprek->hasil ?></td>
                                        <td><?php echo $mesingeprek->rejected ?></td>
                                        <td><?php echo $mesingeprek->keterangan ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <th colspan="13">TOTAL</th>
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
                    <a class="btn btn-success" href="<?= base_url() . 'laporan/export_excel_geprek' ?>">Export Excel</a>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "lembar/json",
                "type": "POST"
            },
            columns: [{
                    "data": "id_lembar",
                    "orderable": false
                }, {
                    "data": "lembar"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script> -->