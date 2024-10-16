<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA USER</h3>
            </div>
            <?= $this->session->flashdata('message'); ?>

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                <table class='table table-bordered>'>
                    <tr>
                        <td width='200'>Nik <?php echo form_error('nik') ?></td>
                        <td><input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td>
                        <td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Email <?php echo form_error('email') ?></td>
                        <td>

                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Username <?php echo form_error('username') ?></td>
                        <td>

                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                        </td>
                    </tr>




                    <tr>
                        <td width='200'>Password <?php echo form_error('password') ?></td>
                        <td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Jabatan <?php echo form_error('jabatan') ?></td>
                        <td>
                            <?=
                            cmb_dinamis('jabatan', 'jabatan', 'jabatan', 'id_jabatan', $id_jabatan);
                            ?>
                            <!-- <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="jabatan" value="" /> -->
                        </td>
                    </tr>

                    <tr>
                        <td width='200'>Divisi <?php echo form_error('divisi') ?></td>
                        <td>
                            <?=
                            cmb_dinamis('divisi', 'divisi', 'divisi', 'id_divisi', $id_divisi);
                            ?>
                            <!-- <input type="text" class="form-control" name="divisi" id="divisi" placeholder="divisi" value="" /> -->
                        </td>
                    </tr>

                    <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) { ?>
                        <tr>
                            <td width='200'>Level User <?php echo form_error('id_user_level') ?></td>
                            <td>
                                <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'DESC') ?>
                                <!--<input type="text" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" />-->
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td>
                            <td>
                                <?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?>
                                <!--<input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" />-->
                            </td>
                        </tr>
                    <?php  } else { ?>
                        <tr>
                            <td width='200'>Level User <?php echo form_error('id_user_level') ?></td>
                            <td>
                                <select class="form-control" name="id_user_level" readonly>
                                    <?php foreach ($level as $value) { ?>
                                        <option value="<?= $value->id_user_level ?>" hidden <?= $value->id_user_level == $row->id_user_level ? 'selected' : null ?>><?= $value->nama_level ?></option>

                                    <?php } ?>
                                </select>

                                <!-- <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'DESC') ?> -->
                                <!-- <input type="text" disabled class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" /> -->
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td>
                            <td>

                                <!-- <?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control', 'readonly' => 'readonly')); ?> -->
                                <input type="hidden" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" />
                                <input type="text" class="form-control" readonly placeholder="Is Aktif" value="<?php echo $is_aktif == 'y' ? 'AKTIF' : 'TIDAK AKTIF' ?>" />
                            </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td width='200'>Foto Profile <?php echo form_error('images') ?></td>
                        <td> <input type="file" name="images"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_users" value="<?php echo $id_users; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>