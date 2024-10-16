<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MESIN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered>'>

                    <tr>
                        <td width='200'>Kode Mesin <?php echo form_error('kode_mesin') ?></td>
                        <td><input type="text" class="form-control" name="kode_mesin" id="kode_mesin" placeholder="Kode Mesin" value="<?php echo $kode_mesin; ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_mesin" value="<?php echo $id_mesin; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('mesin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>