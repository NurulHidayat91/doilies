<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA SPEED_MESIN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Speed Mesin <?php echo form_error('speed_mesin') ?></td><td><input type="text" class="form-control" name="speed_mesin" id="speed_mesin" placeholder="Speed Mesin" value="<?php echo $speed_mesin; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_speed_mesin" value="<?php echo $id_speed_mesin; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('speedmesin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>