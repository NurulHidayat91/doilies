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
        <h2 style="margin-top:0px">Proses_admin Read</h2>
        <table class="table">
	    <tr><td>No Wo</td><td><?php echo $no_wo; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Id Waktu</td><td><?php echo $id_waktu; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Shift</td><td><?php echo $shift; ?></td></tr>
	    <tr><td>Id Mesin</td><td><?php echo $id_mesin; ?></td></tr>
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td>Id Jenis Pekerjaan</td><td><?php echo $id_jenis_pekerjaan; ?></td></tr>
	    <tr><td>Id Warna</td><td><?php echo $id_warna; ?></td></tr>
	    <tr><td>Id Bentuk</td><td><?php echo $id_bentuk; ?></td></tr>
	    <tr><td>Id Ukuran</td><td><?php echo $id_ukuran; ?></td></tr>
	    <tr><td>Id Lembar</td><td><?php echo $id_lembar; ?></td></tr>
	    <tr><td>Id Speed Mesin</td><td><?php echo $id_speed_mesin; ?></td></tr>
	    <tr><td>Target</td><td><?php echo $target; ?></td></tr>
	    <tr><td>Hasil Potongan</td><td><?php echo $hasil_potongan; ?></td></tr>
	    <tr><td>Reject Potongan</td><td><?php echo $reject_potongan; ?></td></tr>
	    <tr><td>Hasil Geprek</td><td><?php echo $hasil_geprek; ?></td></tr>
	    <tr><td>Reject Geprek</td><td><?php echo $reject_geprek; ?></td></tr>
	    <tr><td>Hasil Sortir Polybag</td><td><?php echo $hasil_sortir_polybag; ?></td></tr>
	    <tr><td>Reject Sortir Polybag</td><td><?php echo $reject_sortir_polybag; ?></td></tr>
	    <tr><td>Hasil Sealer</td><td><?php echo $hasil_sealer; ?></td></tr>
	    <tr><td>Reject Sealer</td><td><?php echo $reject_sealer; ?></td></tr>
	    <tr><td>Hasil Oven</td><td><?php echo $hasil_oven; ?></td></tr>
	    <tr><td>Reject Oven</td><td><?php echo $reject_oven; ?></td></tr>
	    <tr><td>Hasil Sticker</td><td><?php echo $hasil_sticker; ?></td></tr>
	    <tr><td>Reject Sticker</td><td><?php echo $reject_sticker; ?></td></tr>
	    <tr><td>Hasil Packing Box</td><td><?php echo $hasil_packing_box; ?></td></tr>
	    <tr><td>Reject Packing Box</td><td><?php echo $reject_packing_box; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('prosesadmin') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>