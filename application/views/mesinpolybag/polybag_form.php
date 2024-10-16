<div class="content-wrapper">

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<?php if ($button === "Update") { ?>
					<h3 class="box-title">UPDATE DATA POLYBAG</h3>
				<?php } elseif ($button === "Repeat") { ?>
					<h3 class="box-title">REPEAT DATA POLYBAG</h3>
				<?php } else { ?>
					<h3 class="box-title">INPUT DATA POLYBAG</h3>
				<?php } ?>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'>

					<tr>
						<td width='200'>No Wo <?php echo form_error('no_wo') ?></td>
						<td><input type="text" class="form-control" onkeyup="autoFill()" name="no_wo" id="no_wo" placeholder="No Wo" value="<?php echo $no_wo; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Operator <?php echo form_error('id_user') ?></td>
						<td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" readonly value="<?php echo $this->session->full_name ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
						<?php if ($button === 'Update') { ?>
							<td>
								<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal ?>" />
							</td>
						<?php } else { ?>
							<td>
								<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>" />
							</td>
						<?php } ?>
					</tr>
					<tr>
						<td width='200'>Waktu <?php echo form_error('id_waktu') ?></td>
						<td>
							<?= cmb_dinamis('id_waktu', 'waktu', 'waktu', 'id_waktu', $id_waktu) ?>
							<!-- <input type="text" class="form-control" name="id_waktu" id="id_waktu" placeholder="Id Waktu" value="<?php echo $id_waktu; ?>" /> -->
						</td>
					</tr>
					<tr>
						<td width='200'>Shift <?php echo form_error('shift') ?></td>
						<td><input type="text" class="form-control" name="shift" id="shift" placeholder="Shift" value="<?php echo $shift; ?>" /></td>
					</tr>

					<?php if ($button == 'Update') { ?>
						<tr>
							<td width='200'>Customer <?php echo form_error('id_customer') ?></td>
							<td>
								<?php echo datalist_dinamis('id_customer', 'customer', 'nama_customer', $id_customer) ?>
								<!-- <input type="text" class="form-control" name="id_customer" id="id_customer" placeholder="Id Customer" value="<?php echo $id_customer; ?>" /> -->
							</td>
						</tr>
						<tr>
							<td width='200'>Warna <?php echo form_error('id_warna') ?></td>
							<td>
								<?= cmb_dinamis('id_warna', 'warna', 'warna', 'id_warna', $id_warna) ?>
								<!-- <input type="text" readonly class="form-control" name="id_warna" id="id_warna" placeholder="Warna" value="<?php echo $id_warna; ?>" /> -->
							</td>
						</tr>
						<tr>
							<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
							<td>
								<?= cmb_dinamis('id_bentuk', 'bentuk', 'bentuk', 'id_bentuk', $id_bentuk) ?>
								<!-- <input type="text" readonly class="form-control" name="id_bentuk" id="id_bentuk" placeholder="Bentuk" value="<?php echo $id_bentuk; ?>" /> -->
							</td>
						</tr>
						<tr>
							<td width='200'>Ukuran <?php echo form_error('id_ukuran') ?></td>
							<td>
								<?= cmb_dinamis('id_ukuran', 'ukuran', 'ukuran', 'id_ukuran', $id_ukuran) ?>
								<!-- <input type="text" readonly class="form-control" name="id_ukuran" id="id_ukuran" placeholder="Ukuran" value="<?php echo $id_ukuran; ?>" /> -->
							</td>
						</tr>
						<tr>
							<td width='200'>Lembar <?php echo form_error('id_lembar') ?></td>
							<td>
								<?= cmb_dinamis('id_lembar', 'lembar_pack', 'lembar', 'id_lembar', $id_lembar) ?>
								<!-- <input type="text" readonly class="form-control" name="id_lembar" id="id_lembar" placeholder="Lembar" value="<?php echo $id_lembar; ?>" /> -->
							</td>
						</tr>
					<?php } else { ?>

						<tr>
							<td width='200'>Customer <?php echo form_error('id_customer') ?></td>
							<td>
								<!-- <?php echo datalist_dinamis('id_customer', 'customer', 'nama_customer', $id_customer) ?> -->
								<input type="text" readonly class="form-control" name="id_customer" id="id_customer" placeholder="Masukkan Customer" value="<?php echo $id_customer; ?>" />
							</td>
						</tr>
						<tr>
							<td width='200'>Warna <?php echo form_error('id_warna') ?></td>
							<td>
								<!-- <?= cmb_dinamis('id_warna', 'warna', 'warna', 'id_warna', $id_warna) ?> -->
								<input type="text" readonly class="form-control" name="id_warna" id="id_warna" placeholder="Warna" value="<?php echo $id_warna; ?>" />
							</td>
						</tr>
						<tr>
							<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
							<td>
								<!-- <?= cmb_dinamis('id_bentuk', 'bentuk', 'bentuk', 'id_bentuk', $id_bentuk) ?> -->
								<input type="text" readonly class="form-control" name="id_bentuk" id="id_bentuk" placeholder="Bentuk" value="<?php echo $id_bentuk; ?>" />
							</td>
						</tr>
						<tr>
							<td width='200'>Ukuran <?php echo form_error('id_ukuran') ?></td>
							<td>
								<!-- <?= cmb_dinamis('id_ukuran', 'ukuran', 'ukuran', 'id_ukuran', $id_ukuran) ?> -->
								<input type="text" readonly class="form-control" name="id_ukuran" id="id_ukuran" placeholder="Ukuran" value="<?php echo $id_ukuran; ?>" />
							</td>
						</tr>
						<tr>
							<td width='200'>Lembar <?php echo form_error('id_lembar') ?></td>
							<td>
								<!-- <?= cmb_dinamis('id_lembar', 'lembar_pack', 'lembar', 'id_lembar', $id_lembar) ?> -->
								<input type="text" readonly class="form-control" name="id_lembar" id="id_lembar" placeholder="Lembar" value="<?php echo $id_lembar; ?>" />
							</td>
						</tr>
					<?php } ?>

					<tr>
						<td width='200'>Target <?php echo form_error('target') ?></td>
						<td><input type="text" class="form-control" name="target" id="target" placeholder="Target" value="<?php echo $target; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Hasil <?php echo form_error('hasil') ?></td>
						<td><input type="text" class="form-control" name="hasil" id="hasil" placeholder="Hasil" value="<?php echo $hasil; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Broke <?php echo form_error('rejected') ?></td>
						<td><input type="text" class="form-control" name="rejected" id="rejected" placeholder="Broke" value="<?php echo $rejected; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Persentase (%) <?php echo form_error('persentase') ?></td>
						<td><input type="text" readonly class="form-control" name="persentase" id="persentase" placeholder="persentase" value="<?php echo $persentase; ?>" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id_mesin_polybag" value="<?php echo $id_mesin_polybag; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('mesinpolybag') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>


<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script>
	$(document).ready(function() {
		function calculate_persentase() {
			var hasil_persentase = 0;
			var target_jam = $('#target').val();
			var hasil_pack = $('#hasil').val();

			var hasil_persentase = Math.round((hasil_pack / target_jam) * 100)


			if (isNaN(hasil_persentase)) {
				$('#persentase').text(0)
			} else {
				$('#persentase').val(hasil_persentase)
			}

		}

		$(document).on('keyup mouseup', '#hasil, #target', function() {
			calculate_persentase()

		})

	})
</script>

<script type="text/javascript">
	function autoFill() {
		var no_wo = $("#no_wo").val()
		var bentuk = $("#id_bentuk").val()
		$.ajax({
			url: "<?= base_url() ?>mesinpolybag/autofill",
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