<div class="content-wrapper">

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA TARGET MESIN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'>

					<tr>
						<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
						<td>
							<?= cmb_dinamis('id_bentuk', 'bentuk', 'bentuk', 'id_bentuk', $id_bentuk) ?>
							<!-- <input type="text" class="form-control" name="id_bentuk" id="id_bentuk" placeholder="Bentuk" value="<?php echo $id_bentuk; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Ukuran <?php echo form_error('id_ukuran') ?></td>
						<td>
							<?= cmb_dinamis('id_ukuran', 'ukuran', 'ukuran', 'id_ukuran', $id_ukuran) ?>

							<!-- <input type="text" class="form-control" name="id_ukuran" id="id_ukuran" placeholder="Ukuran" value="<?php echo $id_ukuran; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Lembar <?php echo form_error('id_lembar') ?></td>
						<td>
							<?= cmb_dinamis('id_lembar', 'lembar_pack', 'lembar', 'id_lembar', $id_lembar) ?>
							<!-- <input type="text" class="form-control" name="id_lembar" id="id_lembar" placeholder="Lembar" value="<?php echo $id_lembar; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Speed Mesin <?php echo form_error('id_speed_mesin') ?></td>
						<td>
							<?= cmb_dinamis('id_speed_mesin', 'speed_mesin', 'speed_mesin', 'id_speed_mesin', $id_speed_mesin) ?>
							<!-- <input type="text" class="form-control" name="id_speed_mesin" id="id_speed_mesin" placeholder="Speed Mesin" value="<?php echo $id_speed_mesin; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Target Mesin <?php echo form_error('target_mesin') ?></td>
						<td><input type="text" class="form-control" name="target_mesin" id="target_mesin" placeholder="Target Mesin" value="<?php echo $target_mesin; ?>" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id_target_mesin" value="<?php echo $id_target_mesin; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('target_mesin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>