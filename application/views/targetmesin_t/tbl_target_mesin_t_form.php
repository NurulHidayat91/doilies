<div class="content-wrapper">

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT TARGET MESIN TIDAK STANDAR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered'>

					<tr>
						<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_bentuk" id="id_bentuk" placeholder="Bentuk" value="<?php echo $id_bentuk; ?>" /> -->
							<?= cmb_dinamis('id_bentuk', 'bentuk', 'bentuk', 'id_bentuk', $id_bentuk) ?>

						</td>
					</tr>

					<tr>
						<td width='200'>Warna/Motif <?php echo form_error('id_warna') ?></td>
						<td>
							<?= cmb_dinamis('id_warna', 'warna', 'warna', 'id_warna', $id_warna) ?>
							<!-- <input type="text" class="form-control" name="id_pattern" id="id_pattern" placeholder="Id Pattern" value="<?php echo $id_pattern; ?>" /> -->
						</td>
					</tr>

					<tr>
						<td width='200'>Grade <?php echo form_error('id_grade') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_grade" id="id_grade" placeholder="Grade" value="<?php echo $id_grade; ?>" /> -->
							<?= cmb_dinamis('id_grade', 'grade', 'grade', 'id_grade', $id_grade) ?>

						</td>
					</tr>
					<tr>
						<td width='200'>Lembar <?php echo form_error('id_lembar') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_lembar" id="id_lembar" placeholder="Lembar" value="<?php echo $id_lembar; ?>" /> -->
							<?= cmb_dinamis('id_lembar', 'lembar_pack', 'lembar', 'id_lembar', $id_lembar) ?>
						</td>
					</tr>
					<tr>
						<td width='200'>Ukuran <?php echo form_error('id_ukuran') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_ukuran" id="id_ukuran" placeholder="Ukuran" value="<?php echo $id_ukuran; ?>" /> -->
							<?= cmb_dinamis('id_ukuran', 'ukuran', 'ukuran', 'id_ukuran', $id_ukuran) ?>

						</td>
					</tr>
					<tr>
						<td width='200'>Speed Mesin <?php echo form_error('id_speed_mesin') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_speed_mesin" id="id_speed_mesin" placeholder="Speed Mesin" value="<?php echo $id_speed_mesin; ?>" /> -->
							<?= cmb_dinamis('id_speed_mesin', 'speed_mesin', 'speed_mesin', 'id_speed_mesin', $id_speed_mesin) ?>

						</td>
					</tr>
					<tr>
						<td width='200'>Gsm <?php echo form_error('id_gsm') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_gsm" id="id_gsm" placeholder="Gsm" value="<?php echo $id_gsm; ?>" /> -->
							<?= cmb_dinamis('id_gsm', 'gsm', 'gsm', 'id_gsm', $id_gsm) ?>
						</td>
					</tr>
					<tr>
						<td width='200'>Pattern <?php echo form_error('id_pattern') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="id_pattern" id="id_pattern" placeholder="Pattern" value="<?php echo $id_pattern; ?>" /> -->
							<?= cmb_dinamis('id_pattern', 'pattern', 'nama_pattern', 'id_pattern', $id_pattern) ?>

						</td>
					</tr>
					<tr>
						<td width='200'>Ukuran Bahan <?php echo form_error('lebar_roll') ?></td>
						<td>
							<!-- <input type="text" class="form-control" name="lebar_roll" id="lebar_roll" placeholder="Ukuran Bahan" value="<?php echo $lebar_roll; ?>" /> -->
							<?= cmb_dinamis('id_lebar', 'lebar_bahan', 'lebar', 'id_lebar', $lebar_roll) ?>

						</td>
					</tr>
					<tr>
						<td width='200'>Panjang Pot <?php echo form_error('panjang_pot') ?></td>
						<td><input type="text" class="form-control" name="panjang_pot" id="panjang_pot" placeholder="Diisi jika bahan tidak standar berbentuk  roll" value="<?php echo $panjang_pot; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Jml Gambar <?php echo form_error('jml_gambar') ?></td>
						<td><input type="text" class="form-control" name="jml_gambar" id="jml_gambar" placeholder="Jml Gambar" value="<?php echo $jml_gambar; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Kebutuhan Bahan <?php echo form_error('kebutuhan_bahan') ?></td>
						<td><input type="text" class="form-control" name="kebutuhan_bahan" id="kebutuhan_bahan" placeholder="Kebutuhan Bahan" value="<?php echo $kebutuhan_bahan; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Kg Perpack <?php echo form_error('kg_perpack') ?></td>
						<td><input type="text" class="form-control" name="kg_perpack" id="kg_perpack" placeholder="Kg Perpack" value="<?php echo $kg_perpack; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Jml Orang <?php echo form_error('jml_orang') ?></td>
						<td><input type="text" class="form-control" name="jml_orang" id="jml_orang" placeholder="Jml Orang" value="<?php echo $jml_orang; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>TargetMesin <?php echo form_error('targetMesin') ?></td>
						<td><input type="text" class="form-control" name="targetMesin" id="targetMesin" placeholder="TargetMesin" value="<?php echo $targetMesin; ?>" /></td>
					</tr>
					<!-- <tr>
						<td width='200'>Created <?php echo form_error('created') ?></td>
						<td><input type="text" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Updated <?php echo form_error('updated') ?></td>
						<td><input type="text" class="form-control" name="updated" id="updated" placeholder="Updated" value="<?php echo $updated; ?>" /></td>
					</tr> -->
					<tr>
						<td></td>
						<td><input type="hidden" name="id_targetMesin_t" value="<?php echo $id_targetMesin_t; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('targetmesin_t') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>