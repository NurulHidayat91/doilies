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
        <h2 style="margin-top:0px">Tbl_repack Read</h2>
        <table class="table">
	    <tr><td>Tanggal Terima</td><td><?php echo $tanggal_terima; ?></td></tr>
	    <tr><td>Subjek Email</td><td><?php echo $subjek_email; ?></td></tr>
	    <tr><td>No Wo</td><td><?php echo $no_wo; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td>Kode Item</td><td><?php echo $kode_item; ?></td></tr>
	    <tr><td>Id Bentuk</td><td><?php echo $id_bentuk; ?></td></tr>
	    <tr><td>Id Ukuran</td><td><?php echo $id_ukuran; ?></td></tr>
	    <tr><td>Id Lembar</td><td><?php echo $id_lembar; ?></td></tr>
	    <tr><td>Id Grade</td><td><?php echo $id_grade; ?></td></tr>
	    <tr><td>Id Gsm</td><td><?php echo $id_gsm; ?></td></tr>
	    <tr><td>Id Warna</td><td><?php echo $id_warna; ?></td></tr>
	    <tr><td>Pack</td><td><?php echo $pack; ?></td></tr>
	    <tr><td>Warna Inner</td><td><?php echo $warna_inner; ?></td></tr>
	    <tr><td>Id Pattern</td><td><?php echo $id_pattern; ?></td></tr>
	    <tr><td>Qty Box</td><td><?php echo $qty_box; ?></td></tr>
	    <tr><td>Barcode Inner</td><td><?php echo $barcode_inner; ?></td></tr>
	    <tr><td>Barcode Outer</td><td><?php echo $barcode_outer; ?></td></tr>
	    <tr><td>Hal</td><td><?php echo $hal; ?></td></tr>
	    <tr><td>Status Transfer</td><td><?php echo $status_transfer; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('reapack') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>