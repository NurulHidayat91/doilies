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
        <h2 style="margin-top:0px">Potongan Read</h2>
        <table class="table">
	    <tr><td>No Wo</td><td><?php echo $no_wo; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Id Waktu</td><td><?php echo $id_waktu; ?></td></tr>
	    <tr><td>Shift</td><td><?php echo $shift; ?></td></tr>
	    <tr><td>Id Warna</td><td><?php echo $id_warna; ?></td></tr>
	    <tr><td>Id Bentuk</td><td><?php echo $id_bentuk; ?></td></tr>
	    <tr><td>Id Ukuran</td><td><?php echo $id_ukuran; ?></td></tr>
	    <tr><td>Id Lembar</td><td><?php echo $id_lembar; ?></td></tr>
	    <tr><td>Target</td><td><?php echo $target; ?></td></tr>
	    <tr><td>Hasil</td><td><?php echo $hasil; ?></td></tr>
	    <tr><td>Rejected</td><td><?php echo $rejected; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('potongan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>