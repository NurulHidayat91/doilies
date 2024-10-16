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
        <h2 style="margin-top:0px">Tbl_target_mesin_t Read</h2>
        <table class="table">
	    <tr><td>Id Bentuk</td><td><?php echo $id_bentuk; ?></td></tr>
	    <tr><td>Id Grade</td><td><?php echo $id_grade; ?></td></tr>
	    <tr><td>Id Lembar</td><td><?php echo $id_lembar; ?></td></tr>
	    <tr><td>Id Ukuran</td><td><?php echo $id_ukuran; ?></td></tr>
	    <tr><td>Id Speed Mesin</td><td><?php echo $id_speed_mesin; ?></td></tr>
	    <tr><td>Id Gsm</td><td><?php echo $id_gsm; ?></td></tr>
	    <tr><td>Id Pattern</td><td><?php echo $id_pattern; ?></td></tr>
	    <tr><td>Lebar Roll</td><td><?php echo $lebar_roll; ?></td></tr>
	    <tr><td>Panjang Pot</td><td><?php echo $panjang_pot; ?></td></tr>
	    <tr><td>Jml Gambar</td><td><?php echo $jml_gambar; ?></td></tr>
	    <tr><td>Kebutuhan Bahan</td><td><?php echo $kebutuhan_bahan; ?></td></tr>
	    <tr><td>Kg Perpack</td><td><?php echo $kg_perpack; ?></td></tr>
	    <tr><td>Jml Orang</td><td><?php echo $jml_orang; ?></td></tr>
	    <tr><td>TargetMesin</td><td><?php echo $targetMesin; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('targetmesin_t') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>