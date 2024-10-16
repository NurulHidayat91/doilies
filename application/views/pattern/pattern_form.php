<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PATTERN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Pattern <?php echo form_error('nama_pattern') ?></td><td><input type="text" class="form-control" name="nama_pattern" id="nama_pattern" placeholder="Nama Pattern" value="<?php echo $nama_pattern; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_pattern" value="<?php echo $id_pattern; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pattern') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>