<div class="content-wrapper">
    <section class="content">
        <div class="row-mt-6">
            <div class="col-md-6">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">FILTER DATA</h3>
                    </div>


                    <div class="box-body">
                        <form action="<?= base_url('reapack/proses_cetak') ?>" method="POST" target="blank">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control" name="dari" id="tgl_awal" value="<?= date('Y-m-d') ?>">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control" name="sampai" id="tgl_akhir" value="<?= date('Y-m-d') ?>">
                            </div>

                            <div class="form-group">
                                <label>No. Wo</label>
                                <input type="text" class="form-control" name="no_wo" id="no_wo" value="">
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="submit" class="btn btn-primary w-100"><i class="fa fa-print"></i> Cetak</button>

                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="export" class="btn btn-success w-100"><i class="fa fa-download"></i> Eksport</button>

                                    </div>
                                </div>

                            </div>
                            <!-- <button type="submit" name="submit" class="btn btn-primary btn-sm">Cetak Pdf</button> -->
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </section>


</div>
<!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>