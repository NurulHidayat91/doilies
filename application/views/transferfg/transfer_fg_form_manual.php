<div class="content-wrapper">

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA TRANSFER FG</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'>

					<tr>
						<td width='200'>No Wo <?php echo form_error('no_wo') ?></td>
						<td><input type="text" class="form-control" name="no_wo" id="no_wo" placeholder="No Wo" value="<?php echo $no_wo; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>No Form <?php echo form_error('no_form') ?></td>
						<td><input type="text" class="form-control" name="no_form" id="no_form" placeholder="No Form" value="<?php echo $no_form; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Operator <?php echo form_error('id_user') ?></td>
						<td><input type="text" readonly class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->full_name ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
						<?php if ($button === 'Update') { ?>
							<td>
								<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" readonly value="<?php echo $tanggal ?>" />
							</td>
						<?php } else { ?>
							<td>
								<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>" />
							</td>
						<?php } ?>

					</tr>

					<tr>
						<td width='200'>Shift <?php echo form_error('shift') ?></td>
						<td><input type="text" class="form-control" name="shift" id="shift" placeholder="Shift" value="<?php echo $shift; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Waktu <?php echo form_error('waktu') ?></td>
						<td><input type="text" class="form-control" name="waktu" id="waktu" placeholder="Masukkan Jam" value="<?php echo $waktu; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>No Stock <?php echo form_error('no_stock') ?></td>
						<td><input type="text" class="form-control" name="no_stock" id="no_stock" placeholder="No Stock" value="<?php echo $no_stock; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Kode Sistem <?php echo form_error('kode_sistem') ?></td>
						<td><input type="text" class="form-control" name="kode_sistem" id="kode_sistem" placeholder="Kode Sistem" value="<?php echo $kode_sistem; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Order <?php echo form_error('id_customer') ?></td>
						<td>
							<?php echo datalist_dinamis('id_customer', 'customer', 'nama_customer', $id_customer) ?>
							<!-- <input type="text" class="form-control" name="id_customer" id="id_customer" placeholder="Id Customer" value="<?php echo $id_customer; ?>" /> -->
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
						<td width='200'>Pattern <?php echo form_error('id_pattern') ?></td>
						<td>
							<?= cmb_dinamis('id_pattern', 'pattern', 'nama_pattern', 'id_pattern', $id_pattern) ?>
							<!-- <input type="text" class="form-control" name="id_lembar" id="id_lembar" placeholder="Id Lembar" value="<?php echo $id_lembar; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Grade <?php echo form_error('grade') ?></td>
						<td>
							<?= cmb_dinamis('grade', 'grade', 'grade', 'id_grade', $id_grade) ?>
							<!-- <input type="text" class="form-control" name="grade" id="grade" placeholder="Grade" value="<?php echo $grade; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Gsm <?php echo form_error('gsm') ?></td>
						<td>
							<?= cmb_dinamis('gsm', 'gsm', 'gsm', 'id_gsm', $id_gsm) ?>

							<!-- <input type="text" class="form-control" name="gsm" id="gsm" placeholder="Gsm" value="<?php echo $gsm; ?>" /> -->
						</td>
					</tr>

					<tr>
						<td width='200'>Box Qty <?php echo form_error('box_qty') ?></td>
						<td>
							<input type="text" class="form-control" name="box_qty" id="box_qty" placeholder="Box Qty" value="<?php echo $box_qty; ?>" />
						</td>
					</tr>

					<tr>
						<td width='200'>Box Pack <?php echo form_error('box_pack') ?></td>
						<td>
							<input type="text" class="form-control" name="box_pack" id="box_pack" placeholder="Box Per pack" value="<?php echo $box_pack; ?>" />
						</td>
					</tr>

					<tr>
						<td width='200'>Box Pcs <?php echo form_error('box_pcs') ?></td>
						<td>
							<input type="text" class="form-control" name="box_pcs" id="box_pcs" placeholder="Box Per pack" value="<?php echo $box_pcs; ?>" />
						</td>
					</tr>
					<tr>
						<td width='200'>Box Kg <?php echo form_error('box_kg') ?></td>
						<td><input type="text" class="form-control" name="box_kg" id="box_kg" placeholder="Box Kg" value="<?php echo $box_kg; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id_transfer_fg" value="<?php echo $id_transfer_fg; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('transferfg') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>

<script type="text/javascript">
	function autoFill() {
		var no_wo = $("#no_wo").val()
		var bentuk = $("#id_bentuk").val()
		$.ajax({
			url: "<?= base_url() ?>transferfg/autofill",
			type: "GET",
			data: {
				'no_wo': no_wo
			},
			success: function(data) {
				var json = data,
					obj = JSON.parse(json);
				$('#shift').val(obj.shift)
				$('#id_customer').val(obj.id_customer)
				$('#id_warna').val(obj.id_warna)
				$('#id_bentuk').val(obj.id_bentuk)
				$('#id_ukuran').val(obj.id_ukuran)
				$('#id_lembar').val(obj.id_lembar)
				$('#hasil_potongan').val(obj.hasil)
			}
		});
	}
</script>