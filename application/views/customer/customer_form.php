<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA CUSTOMER</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered table-responsive'>

                    <tr>
                        <td width='200'>Nama Customer <?php echo form_error('nama_customer') ?></td>
                        <td><input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Nama Customer" value="<?php echo $nama_customer; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Nohp <?php echo form_error('nohp') ?></td>
                        <td><input type="text" class="form-control" name="nohp" id="nohp" placeholder="Nohp" value="<?php echo $nohp; ?>" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                        <td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
                    </tr>
                    <tr>
                        <td width='200' hidden>Created <?php echo form_error('created') ?></td>
                        <td><input type="hidden" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo date('Y-m-d h:i:s') ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('customer') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>