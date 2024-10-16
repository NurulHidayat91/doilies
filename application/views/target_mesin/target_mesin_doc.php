<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Target_mesin List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Bentuk</th>
		<th>Id Ukuran</th>
		<th>Id Lembar</th>
		<th>Id Speed Mesin</th>
		<th>Target Mesin</th>
		
            </tr><?php
            foreach ($target_mesin_data as $target_mesin)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $target_mesin->id_bentuk ?></td>
		      <td><?php echo $target_mesin->id_ukuran ?></td>
		      <td><?php echo $target_mesin->id_lembar ?></td>
		      <td><?php echo $target_mesin->id_speed_mesin ?></td>
		      <td><?php echo $target_mesin->target_mesin ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>