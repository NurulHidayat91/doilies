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
        <h2 style="margin-top:0px">Transfer_fg Read</h2>
        <table class="table">
	    <tr><td>No Wo</td><td><?php echo $no_wo; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Shift</td><td><?php echo $shift; ?></td></tr>
	    <tr><td>Id Warna</td><td><?php echo $id_warna; ?></td></tr>
	    <tr><td>Id Bentuk</td><td><?php echo $id_bentuk; ?></td></tr>
	    <tr><td>Id Ukuran</td><td><?php echo $id_ukuran; ?></td></tr>
	    <tr><td>Id Lembar</td><td><?php echo $id_lembar; ?></td></tr>
	    <tr><td>Box Qty</td><td><?php echo $box_qty; ?></td></tr>
	    <tr><td>Box Kg</td><td><?php echo $box_kg; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td>Grade</td><td><?php echo $grade; ?></td></tr>
	    <tr><td>Gsm</td><td><?php echo $gsm; ?></td></tr>
	    <tr><td>No Stock</td><td><?php echo $no_stock; ?></td></tr>
	    <tr><td>Kode Sistem</td><td><?php echo $kode_sistem; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transferfg') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>