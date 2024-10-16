<div class="content-wrapper">

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA PROSES ADMIN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'>
					<tr>
						<td width='200'>No Wo <?php echo form_error('no_wo') ?></td>
						<td><input type="text" class="form-control" name="no_wo" id="no_wo" placeholder="No Wo" value="<?php echo $no_wo; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
						<td><input type="date" readonly class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d'); ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Waktu <?php echo form_error('id_waktu') ?></td>
						<td>
							<?= cmb_dinamis('id_waktu', 'waktu', 'waktu', 'id_waktu', $id_waktu) ?>
							<!-- <input type="text" class="form-control" name="id_waktu" id="id_waktu" placeholder="Id Waktu" value="<?php echo $id_waktu; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Operator <?php echo form_error('id_user') ?></td>
						<td>
							<?php echo datalist_dinamis('id_user', 'tbl_user', 'full_name', $id_user) ?>

							<!-- <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Shift <?php echo form_error('shift') ?></td>
						<td><input type="text" class="form-control" name="shift" id="shift" placeholder="Shift" value="<?php echo $shift; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Mesin <?php echo form_error('id_mesin') ?></td>
						<td>
							<?= cmb_dinamis('id_mesin', 'mesin', 'kode_mesin', 'id_mesin', $id_mesin) ?>

							<!-- <input type="text" class="form-control" name="id_mesin" id="id_mesin" placeholder="Id Mesin" value="<?php echo $id_mesin; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Customer <?php echo form_error('id_customer') ?></td>
						<td>
							<?php echo datalist_dinamis('id_customer', 'customer', 'nama_customer', $id_customer) ?>
							<!-- <input type="text" class="form-control" name="id_customer" id="id_customer" placeholder="Id Customer" value="<?php echo $id_customer; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Jenis Pekerjaan <?php echo form_error('id_jenis_pekerjaan') ?></td>
						<td>
							<?= cmb_dinamis('id_jenis_pekerjaan', 'jenis_pekerjaan', 'nama_pekerjaan', 'id_jenis_pekerjaan', $id_jenis_pekerjaan) ?>
							<!-- <input type="text" class="form-control" name="id_jenis_pekerjaan" id="id_jenis_pekerjaan" placeholder="Id Jenis Pekerjaan" value="<?php echo $id_jenis_pekerjaan; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Warna <?php echo form_error('id_warna') ?></td>
						<td>
							<?= cmb_dinamis('id_warna', 'warna', 'warna', 'id_warna', $id_warna) ?>
							<!-- <input type="text" class="form-control" name="id_warna" id="id_warna" placeholder="Id Warna" value="<?php echo $id_warna; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
						<td>
							<?= cmb_dinamis('id_bentuk', 'bentuk', 'bentuk', 'id_bentuk', $id_bentuk) ?>
							<!-- <input type="text" class="form-control" name="id_bentuk" id="id_bentuk" placeholder="Id Bentuk" value="<?php echo $id_bentuk; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Ukuran <?php echo form_error('id_ukuran') ?></td>
						<td>
							<?= cmb_dinamis('id_ukuran', 'ukuran', 'ukuran', 'id_ukuran', $id_ukuran) ?>
							<!-- <input type="text" class="form-control" name="id_ukuran" id="id_ukuran" placeholder="Id Ukuran" value="<?php echo $id_ukuran; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Lembar <?php echo form_error('id_lembar') ?></td>
						<td>
							<?= cmb_dinamis('id_lembar', 'lembar_pack', 'lembar', 'id_lembar', $id_lembar) ?>
							<!-- <input type="text" class="form-control" name="id_lembar" id="id_lembar" placeholder="Id Lembar" value="<?php echo $id_lembar; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Speed Mesin <?php echo form_error('id_speed_mesin') ?></td>
						<td>
							<?= cmb_dinamis('id_speed_mesin', 'speed_mesin', 'speed_mesin', 'id_speed_mesin', $id_speed_mesin) ?>
							<!-- <input type="text" class="form-control" name="id_speed_mesin" id="id_speed_mesin" placeholder="Id Speed Mesin" value="<?php echo $id_speed_mesin; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Target <?php echo form_error('target') ?></td>
						<td><input type="text" class="form-control" name="target" id="target" placeholder="Target" value="<?php echo $target; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Potongan <?php echo form_error('hasil_potongan') ?></td>
						<td><input type="text" class="form-control" name="hasil_potongan" id="hasil_potongan" placeholder="Hasil Potongan" value="<?php echo $hasil_potongan; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Potongan <?php echo form_error('reject_potongan') ?></td>
						<td><input type="text" class="form-control" name="reject_potongan" id="reject_potongan" placeholder="Reject Potongan" value="<?php echo $reject_potongan; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Geprek <?php echo form_error('hasil_geprek') ?></td>
						<td><input type="text" class="form-control" name="hasil_geprek" id="hasil_geprek" placeholder="Hasil Geprek" value="<?php echo $hasil_geprek; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Geprek <?php echo form_error('reject_geprek') ?></td>
						<td><input type="text" class="form-control" name="reject_geprek" id="reject_geprek" placeholder="Reject Geprek" value="<?php echo $reject_geprek; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Sortir Polybag <?php echo form_error('hasil_sortir_polybag') ?></td>
						<td><input type="text" class="form-control" name="hasil_sortir_polybag" id="hasil_sortir_polybag" placeholder="Hasil Sortir Polybag" value="<?php echo $hasil_sortir_polybag; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Sortir Polybag <?php echo form_error('reject_sortir_polybag') ?></td>
						<td><input type="text" class="form-control" name="reject_sortir_polybag" id="reject_sortir_polybag" placeholder="Reject Sortir Polybag" value="<?php echo $reject_sortir_polybag; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Sealer <?php echo form_error('hasil_sealer') ?></td>
						<td><input type="text" class="form-control" name="hasil_sealer" id="hasil_sealer" placeholder="Hasil Sealer" value="<?php echo $hasil_sealer; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Sealer <?php echo form_error('reject_sealer') ?></td>
						<td><input type="text" class="form-control" name="reject_sealer" id="reject_sealer" placeholder="Reject Sealer" value="<?php echo $reject_sealer; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Oven <?php echo form_error('hasil_oven') ?></td>
						<td><input type="text" class="form-control" name="hasil_oven" id="hasil_oven" placeholder="Hasil Oven" value="<?php echo $hasil_oven; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Oven <?php echo form_error('reject_oven') ?></td>
						<td><input type="text" class="form-control" name="reject_oven" id="reject_oven" placeholder="Reject Oven" value="<?php echo $reject_oven; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Sticker <?php echo form_error('hasil_sticker') ?></td>
						<td><input type="text" class="form-control" name="hasil_sticker" id="hasil_sticker" placeholder="Hasil Sticker" value="<?php echo $hasil_sticker; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Sticker <?php echo form_error('reject_sticker') ?></td>
						<td><input type="text" class="form-control" name="reject_sticker" id="reject_sticker" placeholder="Reject Sticker" value="<?php echo $reject_sticker; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil Packing Box <?php echo form_error('hasil_packing_box') ?></td>
						<td><input type="text" class="form-control" name="hasil_packing_box" id="hasil_packing_box" placeholder="Hasil Packing Box" value="<?php echo $hasil_packing_box; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke Packing Box <?php echo form_error('reject_packing_box') ?></td>
						<td><input type="text" class="form-control" name="reject_packing_box" id="reject_packing_box" placeholder="Reject Packing Box" value="<?php echo $reject_packing_box; ?>" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id_proses" value="<?php echo $id_proses; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('prosesadmin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>