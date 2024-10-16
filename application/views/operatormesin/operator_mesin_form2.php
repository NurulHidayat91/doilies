<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<section class="content">

				<div class="col-md-6">
					<div class="box box-warning box-solid">
						<div class="box-header with-border">
							<?php if ($button === 'Create') { ?>
								<h3 class="box-title">INPUT OPERATOR MESIN TIDAK STANDAR</h3>
							<?php } elseif ($button === 'Update') { ?>
								<h3 class="box-title">UPDATE OPERATOR MESIN TIDAK STANDAR</h3>
							<?php } else { ?>
								<h3 class="box-title">REPEAT OPERATOR MESIN TIDAK STANDAR</h3>
							<?php } ?>
						</div>
						<form action="<?php echo $action; ?>" method="post">

							<table class='table table-bordered>'>

								<tr>
									<td width='200'>No Form <?php echo form_error('no_form') ?></td>
									<td>
										<input type="text" class="form-control" name="no_form" id="no_form" readonly value="form tidak standard" />
										<!-- <select name="no_form" id="no_form" class="form-control">
											<option value="standard">Form Standard</option>
											<option value="tidak_standard">Form Tidak Standard</option>
										</select> -->
									</td>

								</tr>

								<tr>
									<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
									<?php if ($button === 'Update') { ?>
										<td>
											<input type="date" readonly class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal ?>" />
										</td>
									<?php } else { ?>
										<td>
											<input type="date" readonly class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>" />
										</td>
									<?php } ?>

								</tr>

								<tr>
									<td width='200'>Shift <?php echo form_error('shift') ?></td>
									<td><input type="text" class="form-control" name="shift" id="shift" placeholder="Shift" value="<?php echo $shift; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>No Mesin <?php echo form_error('id_mesin') ?></td>
									<td>
										<?= cmb_dinamis('id_mesin', 'mesin', 'kode_mesin', 'id_mesin', $id_mesin) ?>
										<!-- <input type="text" class="form-control" name="id_mesin" id="id_mesin" placeholder="Id Mesin" value="<?php echo $id_mesin; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Operator1 <?php echo form_error('id_user') ?></td>
									<td>
										<input type="text" class="form-control" readonly name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->full_name ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Operator2 <?php echo form_error('operator2') ?></td>
									<td>
										<?php echo datalist_dinamis('operator2', 'tbl_user', 'full_name', $operator2) ?>

										<!-- <input type="text" class="form-control" name="operator2" id="operator2" placeholder="Operator2" value="<?php echo $operator2; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Operator3 <?php echo form_error('operator3') ?></td>
									<td>
										<?php echo datalist_dinamis('operator3', 'tbl_user', 'full_name', $operator3) ?>

										<!-- <input type="text" class="form-control" name="operator3" id="operator3" placeholder="Operator3" value="<?php echo $operator3; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Operator4 <?php echo form_error('operator4') ?></td>
									<td>
										<?php echo datalist_dinamis('operator4', 'tbl_user', 'full_name', $operator4) ?>
										<!-- <input type="text" class="form-control" name="operator4" id="operator4" placeholder="Operator4" value="<?php echo $operator4; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>No Wo <?php echo form_error('no_wo') ?></td>
									<td><input type="text" class="form-control" name="no_wo" id="no_wo" placeholder="No Wo" value="<?php echo $no_wo; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Order <?php echo form_error('id_customer') ?></td>
									<td>
										<?php echo datalist_dinamis('id_customer', 'customer', 'nama_customer', $id_customer) ?>
										<!-- <input type="text" class="form-control" name="id_customer" id="id_customer" placeholder="Id Customer" value="<?php echo $id_customer; ?>" /> -->
									</td>
								</tr>


								<tr>
									<td width='200'>Grade <?php echo form_error('id_grade') ?></td>
									<td>
										<select id="id_grade" name="id_grade" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($id_grade as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_grade ?>" <?= $value->id_grade == $row->id_grade ? 'selected' : null ?>><?= $value->grade ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_grade ?>"><?= $value->grade ?></option>

												<?php } ?>
											<?php } ?>
										</select>
										<!-- <input type="text" class="form-control" name="id_grade" id="id_grade" placeholder="Id Grade" value="<?php echo $id_grade; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Ukuran <?php echo form_error('id_ukuran') ?></td>
									<td>
										<select id="id_ukuran" name="id_ukuran" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($ukuran as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_ukuran ?>" <?= $value->id_ukuran == $row->id_ukuran ? 'selected' : null ?>><?= $value->ukuran ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_ukuran ?>"><?= $value->ukuran ?></option>

												<?php } ?>
											<?php } ?>
										</select>
										<!-- <?= cmb_dinamis('id_ukuran', 'ukuran', 'ukuran', 'id_ukuran', $id_ukuran) ?> -->
										<!-- <input type="text" class="form-control" name="id_ukuran" id="id_ukuran" placeholder="Id Ukuran" value="<?php echo $id_ukuran; ?>" /> -->
									</td>
								</tr>


								<tr>
									<td width='200'>Lembar <?php echo form_error('id_lembar') ?></td>
									<td>
										<select id="id_lembar" name="id_lembar" class="form-control">
											<option value="">--Pilih--</option>

											<?php foreach ($lembar as $key => $value) { ?>

												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_lembar ?>" <?= $value->id_lembar == $row->id_lembar ? 'selected' : null ?>><?= $value->lembar ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_lembar ?>"><?= $value->lembar ?></option>

												<?php } ?>
											<?php } ?>


										</select>
										<!-- <?= cmb_dinamis('id_lembar', 'lembar_pack', 'lembar', 'id_lembar', $id_lembar) ?> -->

										<!-- <input type="text" class="form-control" name="id_lembar" id="id_lembar" placeholder="Id Lembar" value="<?php echo $id_lembar; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Gsm <?php echo form_error('id_gsm') ?></td>
									<td>
										<select id="id_gsm" name="id_gsm" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($id_gsm as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_gsm ?>" <?= $value->id_gsm == $row->id_gsm ? 'selected' : null ?>><?= $value->gsm ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_gsm ?>"><?= $value->gsm ?></option>

												<?php } ?>
											<?php } ?>
										</select>
										<!-- <?= cmb_dinamis('id_gsm', 'gsm', 'gsm', 'id_gsm', $id_gsm) ?> -->
										<!-- <input type="text" class="form-control" name="id_gsm" id="id_gsm" placeholder="Gsm" value="<?php echo $id_gsm; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Warna/Motif <?php echo form_error('id_warna') ?></td>
									<td>

										<select id="id_warna" name="id_warna" class="form-control">
											<option value="">--Pilih--</option>

											<?php foreach ($id_warna as $key => $value) { ?>

												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_warna ?>" <?= $value->id_warna == $row->id_warna ? 'selected' : null ?>><?= $value->warna ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_warna ?>"><?= $value->warna ?></option>

												<?php } ?>
											<?php } ?>


										</select>
										<!-- <?= cmb_dinamis('id_warna', 'warna', 'warna', 'id_warna', $id_warna) ?> -->
										<!-- <input type="text" readonly class="form-control" name="id_warna" id="id_warna" placeholder="Id Warna" value="<?php echo $id_warna; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Ukuran Bahan(cm) <?php echo form_error('lebar') ?></td>
									<td>
										<select id="lebar" name="lebar" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($lebar as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->lebar ?>" <?= $value->lebar == $row->lebar ? 'selected' : null ?>><?= $value->lebar ?></option>

												<?php } else { ?>
													<option value="<?= $value->lebar ?>"><?= $value->lebar ?></option>

												<?php } ?>
											<?php } ?>
										</select>
										<!-- <input type="text" class="form-control" name="lebar" id="lebar" placeholder="Ukuran bahan" value="<?php echo $lebar; ?>" /> -->
										<!-- <?= cmb_dinamis('id_lebar', 'lebar_bahan', 'lebar', 'id_lebar', $lebar) ?> -->

									</td>
								</tr>


								<tr>
									<td width='200'>Pattern <?php echo form_error('id_pattern') ?></td>
									<td>
										<!-- <?= cmb_dinamis('id_pattern', 'pattern', 'nama_pattern', 'id_pattern', $id_pattern) ?> -->
										<input type="text" readonly class="form-control" name="id_pattern" id="id_pattern" placeholder="Id Pattern" value="<?php echo $id_pattern; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Speed Mesin <?php echo form_error('id_speed') ?></td>
									<td>
										<!-- <select id="id_speed" onchange="getValueId()" name="id_speed" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($speed_mesin as $key => $value) { ?>

												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_speed_mesin ?>" <?= $value->id_speed_mesin == $row->id_speed ? 'selected' : null ?>><?= $value->speed_mesin ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_speed_mesin ?>"><?= $value->speed_mesin ?></option>

												<?php } ?>
											<?php } ?>
										</select> -->
										<!-- <?= cmb_dinamis('id_speed', 'speed_mesin', 'speed_mesin', 'id_speed_mesin', $id_speed) ?> -->
										<input type="text" readonly class="form-control" name="id_speed" id="id_speed" placeholder="Speed" value="<?php echo $id_speed; ?>" />
									</td>
								</tr>


								<tr>
									<td width='200'>Bentuk <?php echo form_error('id_bentuk') ?></td>
									<td>
										<!-- <select id="id_bentuk" onchange="getValueId()" name="id_bentuk" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($bentuk as $key => $value) { ?>

												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_bentuk ?>" <?= $value->id_bentuk == $row->id_bentuk ? 'selected' : null ?>><?= $value->bentuk ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_bentuk ?>"><?= $value->bentuk ?></option>

												<?php } ?>
											<?php } ?>
										</select> -->

										<!-- <?= cmb_dinamis('id_bentuk', 'bentuk', 'bentuk', 'id_bentuk', $id_bentuk) ?> -->
										<input type=" text" class="form-control" name="id_bentuk" readonly id="id_bentuk" placeholder="Bentuk" value="<?php echo $id_bentuk; ?>" />
									</td>
								</tr>


								<tr>
									<td width='200'>Panjang Pot(Cm) <?php echo form_error('panjang_pot') ?></td>
									<td>
										<input type="text" readonly class="form-control" name="panjang_pot" id="panjang_pot" placeholder="panjang_pot" value="<?php echo $panjang_pot; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Jumlah Gambar <?php echo form_error('jml_gambar') ?></td>
									<td>
										<input type="text" readonly class="form-control" name="jml_gambar" id="jml_gambar" placeholder="jml_gambar" value="<?php echo $jml_gambar; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Kebutuhan Bahan Perbox(kg) <?php echo form_error('kebutuhan_bahan') ?></td>
									<td>
										<input type="text" readonly class="form-control" name="kebutuhan_bahan" id="kebutuhan_bahan" placeholder="kebutuhan_bahan" value="<?php echo $kebutuhan_bahan; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Jumlah Operator <?php echo form_error('jml_operator') ?></td>
									<td>
										<input type="text" readonly class="form-control" name="jml_operator" id="jml_operator" placeholder="jml_operator" value="<?php echo $jml_operator; ?>" />
									</td>
								</tr>


								<tr>
									<td width='200'>Target / Jam <?php echo form_error('satuan_pack') ?></td>
									<td><input type="text" readonly class="form-control" name="satuan_pack" id="satuan_pack" placeholder="Satuan Pack" value="<?php echo $satuan_pack; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Menit Proses <?php echo form_error('menit_proses') ?></td>
									<td><input type="text" class="form-control" name="menit_proses" id="menit_proses" placeholder="Menit Proses" value="<?php echo $menit_proses; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Target Proses<?php echo form_error('target_jam') ?></td>
									<td>
										<input type="text" class="form-control" readonly name="target_jam" id="target_jam" placeholder="Target Jam" value="<?php echo $target_jam; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Hasil Pack <?php echo form_error('hasil_pack') ?></td>
									<td><input type="text" class="form-control" name="hasil_pack" id="hasil_pack" placeholder="Hasil Pack" value="<?php echo $hasil_pack; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Hasil Kg <?php echo form_error('hasil_kg') ?></td>
									<td><input type="text" class="form-control" name="hasil_kg" id="hasil_kg" placeholder="Hasil Kg" value="<?php echo $hasil_kg; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Kg Perpack <?php echo form_error('kg_perpack') ?></td>
									<td>
										<input type="text" readonly class="form-control" name="kg_perpack" id="kg_perpack" placeholder="kg_perpack" value="<?php echo $kg_perpack; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Broke Setting <?php echo form_error('broke_setting') ?></td>
									<td><input type="text" class="form-control" name="broke_setting" id="broke_setting" placeholder="Broke Setting" value="<?php echo $broke_setting; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Broke Trim <?php echo form_error('broke_trim') ?></td>
									<td><input type="text" class="form-control" name="broke_trim" id="broke_trim" placeholder="Broke Trim" value="<?php echo $broke_trim; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Broke Serpihan <?php echo form_error('broke_serpihan') ?></td>
									<td><input type="text" class="form-control" name="broke_serpihan" id="broke_serpihan" placeholder="Broke Serpihan" value="<?php echo $broke_serpihan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Broke Motif <?php echo form_error('broke_motif') ?></td>
									<td><input type="text" class="form-control" name="broke_motif" id="broke_motif" placeholder="Broke Motif" value="<?php echo $broke_motif; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Qty Roll <?php echo form_error('qty_roll') ?></td>
									<td><input type="text" class="form-control" name="qty_roll" id="qty_roll" placeholder="Qty Roll" value="<?php echo $qty_roll; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Berat <?php echo form_error('berat') ?></td>
									<td><input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" value="<?php echo $berat; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>No Stamp <?php echo form_error('no_stamp') ?></td>
									<td><input type="text" class="form-control" name="no_stamp" id="no_stamp" placeholder="No Stamp" value="<?php echo $no_stamp; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Jumlah Proses <?php echo form_error('jam_proses') ?></td>
									<td><input type="text" class="form-control" name="jam_proses" id="jam_proses" placeholder="Jumlah Proses" value="<?php echo $jam_proses; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>(Non Passed) Kode <?php echo form_error('nonpassed_kode') ?></td>
									<td>
										<select id="nonpassed_kode" name="nonpassed_kode" class="form-control">
											<option value="-">--Pilih--</option>
											<?php foreach ($nonpassed_kode as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_non_passed ?>" <?= $value->id_non_passed == $row->nonpassed_kode ? 'selected' : null ?>><?= $value->kode_non_passed ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_non_passed ?>"><?= $value->kode_non_passed ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>
										</select>
										<!-- <?= cmb_dinamis('nonpassed_kode', 'non_passed', 'kode_non_passed', 'id_non_passed', $nonpassed_kode) ?> -->
										<!-- <input type="text" class="form-control" name="nonpassed_kode" id="nonpassed_kode" placeholder="Non Passed (Kode)" value="<?php echo $nonpassed_kode; ?>" /> -->
									</td>
								</tr>
								<tr>
									<td width='200'>(Non Passed) Pack <?php echo form_error('nonpassed_pack') ?></td>
									<td><input type="text" class="form-control" name="nonpassed_pack" id="nonpassed_pack" placeholder="Non Passed Pack" value="<?php echo $nonpassed_pack; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>(Non Passed) Kg <?php echo form_error('nonpassed_kg') ?></td>
									<td><input type="text" class="form-control" name="nonpassed_kg" id="nonpassed_kg" placeholder="Non Passed Kg" value="<?php echo $nonpassed_kg; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Sisa Roll <?php echo form_error('sisa_roll') ?></td>
									<td><input type="text" class="form-control" name="sisa_roll" id="sisa_roll" placeholder="Sisa Roll" value="<?php echo $sisa_roll; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Jam Awal <?php echo form_error('id_jam') ?></td>
									<td>
										<?= cmb_dinamis('id_jam', 'jam', 'jam', 'id_jam', $id_jam) ?>

										<!-- <input type="text" class="form-control" name="id_jam" id="id_jam" placeholder="Jam Awal" value="<?php echo $id_jam; ?>" /> -->
									</td>
								</tr>
								<tr>
									<td width='200'>Jam Akhir <?php echo form_error('jam_akhir') ?></td>
									<td>
										<?php echo datalist_dinamis('jam_akhir', 'jam', 'jam', $jam_akhir) ?>

										<!-- <input type="text" class="form-control" name="jam_akhir" id="jam_akhir" placeholder="Jam Akhir" value="<?php echo $jam_akhir; ?>" /> -->
									</td>
								</tr>
								<tr>
									<td width='200'>WIP (pack) <?php echo form_error('wip') ?></td>
									<td>
										<input type="text" class="form-control" name="wip" id="wip" placeholder="WIP (PACK)" value="<?php echo $wip; ?>" />
									</td>
								</tr>

								<tr>
									<td width='200'>Keterangan <?php echo form_error('ket') ?></td>
									<td>
										<input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan" value="<?php echo $ket; ?>" />
										<!-- <textarea name="ket" class="form-control" id="ket" cols="30" rows="10"><?php echo $ket; ?></textarea> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Persentase (%) <?php echo form_error('persentase') ?></td>
									<td><input type="text" readonly class="form-control" name="persentase" id="persentase" placeholder="Persentase" value="<?php echo $persentase; ?>" /></td>
								</tr>
								<!-- <tr>
									<td></td>
									<td><input type="hidden" name="id_operator_mesin" value="<?php echo $id_operator_mesin; ?>" />
										<button type="submit" name="<?php echo $button ?>" id="create" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('operatormesin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
									</td>
								</tr> -->
							</table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box box-warning box-solid">
						<div class="box-header with-border">
							<?php if ($button === 'Create') { ?>
								<h3 class="box-title">INPUT FORM TIDAK STANDAR</h3>
							<?php } elseif ($button === 'Update') { ?>
								<h3 class="box-title">UPDATE FORM TIDAK STANDAR</h3>
							<?php } else { ?>
								<h3 class="box-title">REPEAT FORM TIDAK STANDAR</h3>
							<?php } ?>
						</div>
						<form action="<?php echo $action; ?>" method="post">

							<table class='table table-bordered>'>

								<tr>
									<td width='200'>Downtime 1 <?php echo form_error('id_downtime') ?></td>
									<td>
										<select id="id_downtime" name="id_downtime" class="form-control" onchange="getValueKet()">
											<option value="-">--Pilih--</option>
											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->id_downtime ?>" <?= $value->id_downtime == $row->id_downtime ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->id_downtime ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="hidden" readonly name="ket1" id="ket1" class="form-control" value="<?= $ket1 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="hidden" readonly name="ket1" id="ket1" class="form-control" value="<?= $ket1 ?>" onkeyup="getValueKet()">

											<?php } ?>

										</select>

										<!-- <?php if ($button === 'Update') { ?>
									<input type='text' name='alasan1' readonly placeholder='Masukkan Alasan' value='<?= $alasan1 ?>' id='alasan1' class='form-control'>
										<?php } else { ?>
									<div id="tindakan_lain_lain"></div>
										<?php } ?> -->

										<!-- <div id="tindakan_lain_lain"></div> -->
										<!-- <?= cmb_dinamis('id_downtime', 'downtime', 'kode', 'id_downtime', $id_downtime) ?> -->
										<!-- <input type="text" class="form-control" name="id_downtime" id="id_downtime" placeholder="Id Downtime" value="<?php echo $id_downtime; ?>" /> -->
									</td>
								</tr>

								<tr>
									<td width='200'>Waktu Downtime 1 (Menit)<?php echo form_error('waktu_downtime') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime" id="waktu_downtime" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Downtime 2 <?php echo form_error('id_downtime2') ?></td>
									<td>
										<select id="downtime2" name="downtime2" class="form-control" onchange="getValueKet2()">
											<option value="-">--Pilih--</option>
											<!-- <?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime2 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>
											-->

											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime2 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="hidden" readonly name="ket2" id="ket2" class="form-control" value="<?= $ket2 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="hidden" readonly name="ket2" id="ket2" class="form-control" value="<?= $ket2 ?>" onkeyup="getValueKet()">

											<?php } ?>

										</select>


										<!-- 
									<?php if ($button === 'Update') { ?>

										<input type='text' name='alasan2' readonly placeholder='Masukkan Alasan' value='<?= $alasan2 ?>' id='alasan2' class='form-control'>


									<?php } else { ?>
										<div id="tindakan_lain_lain2"></div>
									<?php } ?> -->
										<!-- <?php echo datalist_dinamis('downtime2', 'downtime', 'kode', $downtime2) ?> -->
										<!-- <input type="text" class="form-control" name="id_downtime" id="id_downtime" placeholder="Id Downtime" value="<?php echo $id_downtime; ?>" /> -->
									</td>
								</tr>
								<tr>
									<td width='200'>Waktu Downtime 2 (Menit) <?php echo form_error('waktu_downtime2') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime2" id="waktu_downtime2" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime2; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Downtime 3 <?php echo form_error('id_downtime3') ?></td>
									<td>
										<select id="downtime3" name="downtime3" class="form-control" onchange="getValueKet3()">
											<option value="-">--Pilih--</option>
											<!-- <?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime3 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?> -->


											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime3 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="hidden" readonly name="ket3" id="ket3" class="form-control" value="<?= $ket3 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="hidden" readonly name="ket3" id="ket3" class="form-control" value="<?= $ket3 ?>" onkeyup="getValueKet()">

											<?php } ?>
										</select>


										<!-- <?php if ($button === 'Update') { ?>

										<input type='text' readonly name='alasan3' placeholder='Masukkan Alasan' value='<?= $alasan3 ?>' id='alasan3' class='form-control'>

									<?php } else { ?>
										<div id="tindakan_lain_lain3"></div>
									<?php } ?> -->
										<!-- <?php echo datalist_dinamis('downtime3', 'downtime', 'kode', $downtime3) ?> -->
										<!-- <input type="text" class="form-control" name="id_downtime" id="id_downtime" placeholder="Id Downtime" value="<?php echo $id_downtime; ?>" /> -->
									</td>
								</tr>
								<tr>
									<td width='200'>Waktu Downtime 3 (Menit) <?php echo form_error('waktu_downtime3') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime3" id="waktu_downtime3" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime3; ?>" /></td>
								</tr>

								<tr>
									<td width='200'>Downtime 4 <?php echo form_error('id_downtime4') ?></td>
									<td>

										<select id="downtime4" name="downtime4" class="form-control" onchange="getValueKet4()">
											<option value="-">--Pilih--</option>
											<!-- <?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime4 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?> -->


											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime4 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="hidden" readonly name="ket4" id="ket4" class="form-control" value="<?= $ket4 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="hidden" readonly name="ket4" id="ket4" class="form-control" value="<?= $ket4 ?>" onkeyup="getValueKet()">

											<?php } ?>
										</select>


										<!-- <?php if ($button === 'Update') { ?>

											<input type='text' name='alasan4' readonly placeholder='Masukkan Alasan' value='<?= $alasan4 ?>' id='alasan4' class='form-control'>

										<?php } else { ?>
											<div id="tindakan_lain_lain4"></div>
										<?php } ?> -->

										<!-- <?php echo datalist_dinamis('downtime4', 'downtime', 'kode', $downtime4) ?> -->
										<!-- <input type="text" class="form-control" name="id_downtime" id="id_downtime" placeholder="Id Downtime" value="<?php echo $id_downtime; ?>" /> -->
									</td>
								</tr>
								<tr>
									<td width='200'>Waktu Downtime 4 (Menit) <?php echo form_error('waktu_downtime4') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime4" id="waktu_downtime4" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime4; ?>" /></td>
								</tr>


								<!-- DOWNTIME YANG TIDAK MENGURANGI TARGET DAN MENIT PROSES -->
								<tr>
									<td width='200' style="color: red; font-weight: bold;">Downtime 1 (tidak mengurangi target) <?php echo form_error('downtime5') ?></td>
									<td>
										<select id="downtime5" name="downtime5" class="form-control" onchange="getValueKet5()">
											<option value="-">--Pilih--</option>
											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime5 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="text" readonly name="ket5" id="ket5" class="form-control" value="<?= $ket5 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="text" readonly name="ket5" id="ket5" class="form-control" value="<?= $ket5 ?>" onkeyup="getValueKet()">

											<?php } ?>

										</select>
									</td>
								</tr>

								<tr>
									<td width='200' style="color: red; font-weight: bold;">Waktu Downtime 1 (Menit)<?php echo form_error('waktu_downtime') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime5" id="waktu_downtime5" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime5; ?>" /></td>
								</tr>

								<tr>
									<td width='200' style="color: red; font-weight: bold;">Downtime 2 (Tidak mengurangi target) <?php echo form_error('downtime6') ?></td>
									<td>
										<select id="downtime6" name="downtime6" class="form-control" onchange="getValueKet6()">
											<option value="-">--Pilih--</option>

											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime6 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="text" readonly name="ket6" id="ket6" class="form-control" value="<?= $ket6 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="text" readonly name="ket6" id="ket6" class="form-control" value="<?= $ket6 ?>" onkeyup="getValueKet()">

											<?php } ?>

										</select>

									</td>
								</tr>
								<tr>
									<td width='200' style="color: red; font-weight: bold;">Waktu Downtime 2 (Menit) <?php echo form_error('waktu_downtime6') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime6" id="waktu_downtime6" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime6; ?>" /></td>
								</tr>

								<tr>
									<td width='200' style="color: red; font-weight: bold;">Downtime 3 (Tidak mengurangi target) <?php echo form_error('downtime7') ?></td>
									<td>
										<select id="downtime7" name="downtime7" class="form-control" onchange="getValueKet7()">
											<option value="-">--Pilih--</option>

											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime7 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="text" readonly name="ket7" id="ket7" class="form-control" value="<?= $ket7 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="text" readonly name="ket7" id="ket7" class="form-control" value="<?= $ket7 ?>" onkeyup="getValueKet()">

											<?php } ?>
										</select>

									</td>
								</tr>
								<tr>
									<td width='200' style="color: red; font-weight: bold;">Waktu Downtime 3 (Menit) <?php echo form_error('waktu_downtime7') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime7" id="waktu_downtime7" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime7; ?>" /></td>
								</tr>

								<tr>
									<td width='200' style="color: red; font-weight: bold;">Downtime 4 (Tidak mengurangi target) <?php echo form_error('id_downtime4') ?></td>
									<td>

										<select id="downtime8" name="downtime8" class="form-control" onchange="getValueKet8()">
											<option value="-">--Pilih--</option>

											<?php foreach ($id_downtime as $key => $value) { ?>
												<?php if ($button === 'Update' || $button === 'Repeat') { ?>
													<option value="<?= $value->kode ?>" <?= $value->kode == $row->downtime8 ? 'selected' : null ?>><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } else { ?>
													<option value="<?= $value->kode ?>"><?= $value->kode ?> || <?= $value->keterangan ?></option>

												<?php } ?>
											<?php } ?>

											<?php if ($button === 'Update' || $button === 'Repeat') { ?>
												<input type="text" readonly name="ket8" id="ket8" class="form-control" value="<?= $ket8 ?>" onkeyup="getValueKet()">
											<?php } else { ?>
												<input type="text" readonly name="ket8" id="ket8" class="form-control" value="<?= $ket8 ?>" onkeyup="getValueKet()">

											<?php } ?>
										</select>

									</td>
								</tr>
								<tr>
									<td width='200' style="color: red; font-weight: bold;">Waktu Downtime 4 (Menit) <?php echo form_error('waktu_downtime8') ?></td>
									<td><input type="number" class="form-control" name="waktu_downtime8" id="waktu_downtime8" placeholder="Waktu Downtime" value="<?php echo $waktu_downtime8; ?>" /></td>
								</tr>

								<tr>
									<td></td>
									<td><input type="hidden" name="id_operator_mesin" value="<?php echo $id_operator_mesin; ?>" />
										<button type="submit" name="<?php echo $button ?>" id="create" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('operatormesin2') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>


		</div>

	</div>


</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script>
	$(document).ready(function() {

		function calculate() {
			var targetperjam = 0;
			var menit_proses = $('#menit_proses').val()

			var satuan_pack = $('#satuan_pack').val()


			var totalTarget = Math.round((satuan_pack / 60) * menit_proses)
			console.log(totalTarget)


			if (isNaN(totalTarget)) {
				$('#target_jam').text(0)
			} else {
				$('#target_jam').val(totalTarget)
			}

		}

		$(document).on('keyup mouseup mouseenter mouseleave', '#menit_proses, #id_lembar, #id_ukuran,#waktu_downtime, #waktu_downtime2, #waktu_downtime3, #waktu_downtime4', function() {
			calculate()
			calculate_persentase()

		})


		function calculate_persentase() {
			var hasil_persentase = 0;
			var target_jam = $('#target_jam').val();
			var hasil_pack = $('#hasil_pack').val();
			var persentase = $('#persentase').val();

			var hasil_persentase = Math.round((hasil_pack / target_jam) * 100)

			if (isNaN(hasil_persentase)) {
				$('#persentase').text(0)
			} else {
				$('#persentase').val(hasil_persentase)
			}

		}

		$(document).on('keyup mouseup change', '#hasil_pack', function() {
			calculate_persentase()
			calculate()


		})


		function calculate_Menitproses() {

			var hasil_pengurangan1 = 0;
			var menit_downtime1 = $('#waktu_downtime').val();
			var menit_downtime2 = $('#waktu_downtime2').val();
			var menit_downtime3 = $('#waktu_downtime3').val();
			var menit_downtime4 = $('#waktu_downtime4').val();


			var hasil_pengurangan1 = parseInt((((60 - menit_downtime1) - menit_downtime2) - menit_downtime3) - menit_downtime4);


			if (menit_downtime1 != '') {
				$('#menit_proses').val(hasil_pengurangan1)
			} else if (menit_downtime2 != '') {
				$('#menit_proses').val(hasil_pengurangan1)

			} else if (menit_downtime3 != '') {
				$('#menit_proses').val(hasil_pengurangan1)

			} else if (menit_downtime4 != '') {
				$('#menit_proses').val(hasil_pengurangan1)

			} else {
				$('#menit_proses').val(hasil_pengurangan1)

			}

		}
		$(document).on(' keyup mouseup', '#waktu_downtime, #menit_proses, #waktu_downtime2, #waktu_downtime3, #waktu_downtime4', function() {
			calculate_Menitproses()


		})

	})

	$(document).on('click', '#create', function() {
		var menit_proses = $('#menit_proses').val();


		if (menit_proses <= 0) {
			alert('JUMLAH MENIT PROSES TIDAK BOLEH MINUS')
			return false;
		}
	})
</script>

<script type="text/javascript">
	$(document).ready(function() {
		function getValueId() {
			var lembar = document.getElementById('id_lembar').value
			var ukuran = document.getElementById('id_ukuran').value
			var grade = document.getElementById('id_grade').value
			var gsm = document.getElementById('id_gsm').value
			var lebar = document.getElementById('lebar').value
			var warna = document.getElementById('id_warna').value


			// var speed_mesin = document.getElementById('id_speed').value

			$.ajax({
				url: "<?= base_url() ?>operatormesin2/autofill",
				type: "POST",
				data: {
					'id_lembar': lembar,
					'id_ukuran': ukuran,
					'id_grade': grade,
					'id_gsm': gsm,
					'lebar': lebar,
					'warna': warna,
				},
				// dataType: 'json',
				success: function(data) {

					if (data) {
						var json = data,
							obj = JSON.parse(json)
						$("#satuan_pack").val(obj.satuan_pack)
						// $("#id_gsm").val(obj.gsm)
						$("#id_speed").val(obj.speed_mesin)
						// $("#lebar").val(obj.lebar_roll)
						$("#panjang_pot").val(obj.panjang_pot)
						// $("#id_warna").val(obj.warna)
						$("#jml_gambar").val(obj.jml_gambar)
						$("#kebutuhan_bahan").val(obj.kebutuhan_bahan)
						$("#kg_perpack").val(obj.kg_perpack)
						$("#jml_operator").val(obj.jml_operator)
						$("#id_bentuk").val(obj.bentuk)
						$("#id_pattern").val(obj.pattern)

					}
				}
			});
		}

		$(document).on('change keyup ', '#id_lembar, #id_ukuran,#id_gsm, #id_grade, #lebar, #id_warna', function() {
			getValueId()

		})

	})



	function getValueKet() {
		var id_downtime = document.getElementById('id_downtime').value
		var downtime2 = document.getElementById('downtime2').value
		var downtime3 = document.getElementById('downtime3').value
		var downtime4 = document.getElementById('downtime4').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime",
			type: "POST",
			data: {
				'id_downtime': id_downtime,
				'downtime2': downtime2,
				'downtime3': downtime3,
				'downtime4': downtime4,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket1").val(obj.ket1)

				}

			}
		});
	}

	function getValueKet2() {
		var downtime2 = document.getElementById('downtime2').value
		var downtime3 = document.getElementById('downtime3').value
		var downtime4 = document.getElementById('downtime4').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime2",
			type: "POST",
			data: {
				'downtime2': downtime2,
				'downtime3': downtime3,
				'downtime4': downtime4,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket2").val(obj.ket2)

				}

			}
		});
	}


	function getValueKet3() {
		var downtime3 = document.getElementById('downtime3').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime3",
			type: "POST",
			data: {
				'downtime3': downtime3,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket3").val(obj.ket3)

				}

			}
		});
	}

	function getValueKet4() {
		var downtime4 = document.getElementById('downtime4').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime4",
			type: "POST",
			data: {
				'downtime4': downtime4,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket4").val(obj.ket4)

				}

			}
		});
	}

	function getValueKet5() {
		var downtime5 = document.getElementById('downtime5').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime5",
			type: "POST",
			data: {
				'downtime5': downtime5,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket5").val(obj.ket5)

				}

			}
		});
	}

	function getValueKet6() {
		var downtime6 = document.getElementById('downtime6').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime6",
			type: "POST",
			data: {
				'downtime6': downtime6,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket6").val(obj.ket6)

				}

			}
		});
	}

	function getValueKet7() {
		var downtime7 = document.getElementById('downtime7').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime7",
			type: "POST",
			data: {
				'downtime7': downtime7,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket7").val(obj.ket7)

				}

			}
		});
	}

	function getValueKet8() {
		var downtime8 = document.getElementById('downtime8').value

		$.ajax({
			url: "<?= base_url() ?>operatormesin/autofill_downtime8",
			type: "POST",
			data: {
				'downtime8': downtime8,
			},
			// dataType: 'json',
			success: function(data) {

				if (data) {
					var json = data,
						obj = JSON.parse(json)
					$("#ket8").val(obj.ket8)

				}

			}
		});
	}


	// function tindakan_lain_lain() {
	// 	var id_downtime = $('#id_downtime').val()

	// 	$.ajax({
	// 		url: "<?= base_url() ?>operatormesin/tindakan_lain_lain_ajax",
	// 		data: {
	// 			'id_downtime': id_downtime,
	// 		},
	// 		success: function(html) {
	// 			$('#tindakan_lain_lain').html(html)
	// 		}
	// 	})
	// }

	// function tindakan_lain_lain2() {
	// 	var id_downtime2 = $('#downtime2').val()

	// 	$.ajax({
	// 		url: "<?= base_url() ?>operatormesin/tindakan_lain_lain2_ajax",
	// 		data: {
	// 			'downtime2': id_downtime2,
	// 		},
	// 		success: function(html) {
	// 			$('#tindakan_lain_lain2').html(html)
	// 		}
	// 	})
	// }

	// function tindakan_lain_lain3() {
	// 	var id_downtime3 = $('#downtime3').val()

	// 	console.log(id_downtime3)
	// 	$.ajax({
	// 		url: "<?= base_url() ?>operatormesin/tindakan_lain_lain3_ajax",
	// 		data: {
	// 			'downtime3': id_downtime3,
	// 		},
	// 		success: function(html) {
	// 			$('#tindakan_lain_lain3').html(html)
	// 		}
	// 	})
	// }


	// function tindakan_lain_lain4() {
	// 	var id_downtime4 = $('#downtime4').val()

	// 	$.ajax({
	// 		url: "<?= base_url() ?>operatormesin/tindakan_lain_lain4_ajax",
	// 		data: {
	// 			'downtime4': id_downtime4,
	// 		},
	// 		success: function(html) {
	// 			$('#tindakan_lain_lain4').html(html)
	// 		}
	// 	})
	// }
</script>

<script type="text/javascript">
	$(function() {
		$(document).ready(function() {
			$("#nonpassed_kode").select2()
		});
	});
</script>