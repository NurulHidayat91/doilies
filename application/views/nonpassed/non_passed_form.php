<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA NON PASSED</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered>'>

                    <tr>
                        <td width='200'>Kode Non Passed <?php echo form_error('kode_non_passed') ?></td>
                        <td><input type="text" class="form-control" name="kode_non_passed" id="kode_non_passed" placeholder="Kode Non Passed" value="<?php echo $kode_non_passed; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
                        <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_non_passed" value="<?php echo $id_non_passed; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('nonpassed') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>