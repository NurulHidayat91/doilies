<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA TARGET MESIN TIDAK STANDAR</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php

                                    if ($this->session->userdata('id_users') == 4 || 1) {
                                        echo anchor(site_url('targetmesin_t/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"');
                                    }
                                    ?>

                                    <!-- <?php echo anchor(site_url('targetmesin_t/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
                                </div>
                            </div>
                            <div class=' col-md-3'>
                                <form action="<?php echo site_url('targetmesin_t/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('targetmesin_t'); ?>" class="btn btn-default">Reset</a>
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
                                <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                            </div>
                            <div class="col-md-3 text-right">

                            </div>
                        </div>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                <th>No</th>
                                <th>Bentuk</th>
                                <th>Ukuran/Motif</th>
                                <th>Grade</th>
                                <th>Lembar</th>
                                <th>Ukuran</th>
                                <th>Speed Mesin</th>
                                <th>Gsm</th>
                                <th>Pattern</th>
                                <th>Ukuran Bahan</th>
                                <th>Panjang Pot</th>
                                <th>Jml Gambar</th>
                                <th>Kebutuhan Bahan</th>
                                <th>Kg Perpack</th>
                                <th>Jml Orang</th>
                                <th>TargetMesin</th>

                                <th>Action</th>
                            </tr><?php
                                    foreach ($targetmesin_t_data as $targetmesin_t) {
                                    ?>
                                <tr>
                                    <td width="10px"><?php echo ++$start ?></td>
                                    <td><?php echo $targetmesin_t->bentuk ?></td>
                                    <td><?php echo $targetmesin_t->warna ?></td>
                                    <td><?php echo $targetmesin_t->grade ?></td>
                                    <td><?php echo $targetmesin_t->lembar ?></td>
                                    <td><?php echo $targetmesin_t->ukuran ?></td>
                                    <td><?php echo $targetmesin_t->speed_mesin ?></td>
                                    <td><?php echo $targetmesin_t->gsm ?></td>
                                    <td><?php echo $targetmesin_t->nama_pattern ?></td>
                                    <td><?php echo $targetmesin_t->lebar_roll ?></td>
                                    <td><?php echo $targetmesin_t->panjang_pot ?></td>
                                    <td><?php echo $targetmesin_t->jml_gambar ?></td>
                                    <td><?php echo $targetmesin_t->kebutuhan_bahan ?></td>
                                    <td><?php echo $targetmesin_t->kg_perpack ?></td>
                                    <td><?php echo $targetmesin_t->jml_orang ?></td>
                                    <td><?php echo $targetmesin_t->targetMesin ?></td>

                                    <td style="text-align:center" width="110px">
                                        <?php
                                        // echo anchor(site_url('targetmesin_t/read/' . $targetmesin_t->id_targetMesin_t), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        // echo '  ';
                                        echo anchor(site_url('targetmesin_t/update/' . $targetmesin_t->id_targetMesin_t), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        echo '  ';
                                        echo anchor(site_url('targetmesin_t/delete/' . $targetmesin_t->id_targetMesin_t), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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