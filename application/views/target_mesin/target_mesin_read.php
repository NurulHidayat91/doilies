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
        <h2 style="margin-top:0px">Target_mesin Read</h2>
        <table class="table">
	    <tr><td>Id Bentuk</td><td><?php echo $id_bentuk; ?></td></tr>
	    <tr><td>Id Ukuran</td><td><?php echo $id_ukuran; ?></td></tr>
	    <tr><td>Id Lembar</td><td><?php echo $id_lembar; ?></td></tr>
	    <tr><td>Id Speed Mesin</td><td><?php echo $id_speed_mesin; ?></td></tr>
	    <tr><td>Target Mesin</td><td><?php echo $target_mesin; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('target_mesin') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>