<div class="content-wrapper">

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA REPACK</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered'>

					<tr>
						<td width='200'>No Wo <?php echo form_error('no_wo') ?></td>
						<td><input type="text" class="form-control" name="no_wo" id="no_wo" placeholder="No Wo" value="<?php echo $no_wo; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Tanggal Terima Wo <?php echo form_error('tanggal_terima') ?></td>
						<td><input type="date" class="form-control" name="tanggal_terima" id="tanggal_terima" placeholder="Tanggal Terima" value="<?php echo $tanggal_terima; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Subjek Email <?php echo form_error('subjek_email') ?></td>
						<td><input type="text" class="form-control" name="subjek_email" id="subjek_email" placeholder="Subjek Email" value="<?php echo $subjek_email; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>User <?php echo form_error('id_user') ?></td>
						<td>
							<input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" readonly value="<?php echo $this->session->full_name ?>" />
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
						<td width='200'>Kode Item <?php echo form_error('kode_item') ?></td>
						<td><input type="text" class="form-control" name="kode_item" id="kode_item" placeholder="Kode Item" value="<?php echo $kode_item; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
						<td>
							<!-- <select id="id_bentuk" name="id_bentuk" class="form-control">
								<option value="">--Pilih--</option>
								<?php foreach ($id_bentuk as $key => $value) { ?>

									<?php if ($button === 'Update' || $button === 'Repeat') { ?>
										<option value="<?= $value->id_bentuk ?>" <?= $value->id_bentuk == $row->id_bentuk ? 'selected' : null ?>><?= $value->bentuk ?></option>

									<?php } else { ?>
										<option value="<?= $value->id_bentuk ?>"><?= $value->bentuk ?></option>

									<?php } ?>
								<?php } ?>
							</select> -->

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
						<td width='200'>Grade <?php echo form_error('id_grade') ?></td>
						<td>
							<?= cmb_dinamis('id_grade', 'grade', 'grade', 'id_grade', $id_grade) ?>
							<!-- <input type="text" class="form-control" name="id_grade" id="id_grade" placeholder="Id Grade" value="<?php echo $id_grade; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Gsm <?php echo form_error('id_gsm') ?></td>
						<td>
							<?= cmb_dinamis('id_gsm', 'gsm', 'gsm', 'id_gsm', $id_gsm) ?>
							<!-- <input type="text" class="form-control" name="id_gsm" id="id_gsm" placeholder="Id Gsm" value="<?php echo $id_gsm; ?>" /> -->
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
						<td width='200'>Pack <?php echo form_error('pack') ?></td>
						<td><input type="text" class="form-control" name="pack" id="pack" placeholder="Pack" value="<?php echo $pack; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Warna Inner <?php echo form_error('warna_inner') ?></td>
						<td>
							<select id="warna_inner" name="warna_inner" class="form-control">
								<option value="">--Pilih--</option>

								<?php foreach ($warna_inner as $value) { ?>

									<?php if ($button === 'Update' || $button === 'Repeat') { ?>
										<option value="<?= $value->warna ?>" <?= $value->warna == $row->warna_inner ? 'selected' : null ?>><?= $value->warna ?></option>

									<?php } else { ?>
										<option value="<?= $value->warna ?>"><?= $value->warna ?></option>

									<?php } ?>
								<?php } ?>
							</select>
							<!-- <?= cmb_dinamis('warna_inner', 'warna', 'warna', 'id_warna', $warna_inner) ?> -->
							<!-- <input type="text" class="form-control" name="warna_inner" id="warna_inner" placeholder="Warna Inner" value="<?php echo $warna_inner; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Pattern <?php echo form_error('id_pattern') ?></td>
						<td>
							<?= cmb_dinamis('id_pattern', 'pattern', 'nama_pattern', 'id_pattern', $id_pattern) ?>
							<!-- <input type="text" class="form-control" name="id_pattern" id="id_pattern" placeholder="Id Pattern" value="<?php echo $id_pattern; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Qty Box <?php echo form_error('qty_box') ?></td>
						<td><input type="text" class="form-control" name="qty_box" id="qty_box" placeholder="Qty Box" value="<?php echo $qty_box; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Barcode Inner <?php echo form_error('barcode_inner') ?></td>
						<td><input type="text" class="form-control" name="barcode_inner" id="barcode_inner" placeholder="Barcode Inner" value="<?php echo $barcode_inner; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Barcode Outer <?php echo form_error('barcode_outer') ?></td>
						<td><input type="text" class="form-control" name="barcode_outer" id="barcode_outer" placeholder="Barcode Outer" value="<?php echo $barcode_outer; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hal <?php echo form_error('hal') ?></td>
						<td><input type="text" class="form-control" name="hal" id="hal" placeholder="Hal" value="<?php echo $hal; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Status Transfer <?php echo form_error('status_transfer') ?></td>
						<td>
							<select name="status_transfer" id="status_transfer" class="form-control" required="required">
								<?php if ($button == 'Update') { ?>
									<option value="pending" <?= $status_transfer == 'pending' ? 'selected' : '' ?>>PENDING</option>
									<option value="close" <?= $status_transfer == 'close' ? 'selected' : '' ?>>CLOSE</option>
								<?php } else { ?>
									<option value="finish">PENDING</option>
									<option value="close">CLOSE</option>
								<?php } ?>

							</select>
							<!-- <input type="text" class="form-control" name="status_transfer" id="status_transfer" placeholder="Status Transfer" value="<?php echo $status_transfer; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id_repack" value="<?php echo $id_repack; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('reapack') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>