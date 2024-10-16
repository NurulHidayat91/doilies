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
        <h2>Non_passed List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Non Passed</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($nonpassed_data as $nonpassed)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nonpassed->kode_non_passed ?></td>
		      <td><?php echo $nonpassed->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>