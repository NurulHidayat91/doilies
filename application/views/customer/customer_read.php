<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Customer Read</h2>
        <table class="table">
	    <tr><td>Nama Customer</td><td><?php echo $nama_customer; ?></td></tr>
	    <tr><td>Nohp</td><td><?php echo $nohp; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>