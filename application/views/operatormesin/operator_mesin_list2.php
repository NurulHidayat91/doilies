<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-warning box-solid">

					<div class="box-header">
						<h3 class="box-title">DATA OPERATOR MESIN TIDAK STANDAR</h3>
					</div>

					<div class="box-body table-responsive">
						<div class='row'>
							<div class='col-md-9'>
								<div style="padding-bottom: 10px;">
									<?php echo anchor(site_url('operatormesin2/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
									<!-- <?php echo anchor(site_url('operatormesin2/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
								</div>
							</div>
							<div class='col-md-3'>
								<form action="<?php echo site_url('operatormesin2/index'); ?>" class="form-inline" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
										<span class="input-group-btn">
											<?php
											if ($q <> '') {
											?>
												<a href="<?php echo site_url('operatormesin2'); ?>" class="btn btn-default">Reset</a>
											<?php
											}
											?>
											<button class="btn btn-primary" type="submit">Search</button>
										</span>
									</div>
								</form>
							</div>
						</div>


						<div class="row" style="margin-bottom: 10px">
							<div class="col-md-4 text-center">
								<!-- <div style="margin-top: 8px" id="message">
									<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
								</div> -->
								<div id="flash" data-flash="<?= $this->session->userdata('message') ?>"></div>

							</div>
							<div class="col-md-1 text-right">
							</div>
							<div class="col-md-3 text-right">

							</div>
						</div>

						<?php
						if (superadmin() || admin()) { ?>
							<table class="table table-bordered" style="margin-bottom: 10px">
								<tr>
									<th>No</th>
									<th>No Form</th>
									<th>No Wo</th>
									<th>Tanggal</th>
									<th>Operator</th>
									<!-- <th>Operator2</th>
								<th>Operator3</th>
								<th>Operator4</th> -->
									<th>Customer</th>
									<!-- <th>Shift</th> -->
									<th>Mesin</th>
									<th>Lembar</th>
									<th>Target Mesin</th>
									<th>Menit Proses</th>
									<th>Target Jam</th>
									<th>Hasil Pack</th>
									<th>Hasil Kg</th>
									<!-- <th>Pattern</th>
								<th>Bentuk</th>
								<th>Ukuran</th> -->
									<!-- <th>Grade</th>
								<th>Gsm</th>
								<th>Lebar</th>
								<th>Qty Roll</th>
								<th>Berat</th>
								<th>Speed</th>
								<th>No Stamp</th>
								<th>Jam Proses</th>
								
								<th>Broke Setting</th>
								<th>Broke Trim</th>
								<th>Broke Serpihan</th>
								<th>Broke Motif</th>
								<th>Sisa Roll</th>
								<th>ket</th>
								<th>Downtime</th>
								<th>Waktu Downtime</th>
								<th>Jam</th>
								<th>Jam Akhir</th>
								<th>Persentase</th> -->
									<th>Action</th>
								</tr>
								<?php
								foreach ($operatormesin_data as $operatormesin) {
								?>
									<tr id="cart-table">
										<td width="10px"><?php echo ++$start ?></td>
										<td><?php echo $operatormesin->no_form ?></td>
										<td><?php echo $operatormesin->no_wo ?></td>
										<td><?php echo $operatormesin->tanggal ?></td>
										<td><?php echo $operatormesin->full_name ?></td>
										<!-- <td><?php echo $operatormesin->operator2 ?></td>
									<td><?php echo $operatormesin->operator3 ?></td>
									<td><?php echo $operatormesin->operator4 ?></td> -->
										<td><?php echo $operatormesin->nama_customer ?></td>
										<!-- <td><?php echo $operatormesin->shift ?></td> -->
										<td><?php echo $operatormesin->kode_mesin ?></td>
										<td><?php echo $operatormesin->lembar ?></td>
										<td><?php echo $operatormesin->satuan_pack ?></td>
										<td><?php echo $operatormesin->menit_proses ?></td>
										<td><?php echo $operatormesin->target_jam ?></td>
										<td><?php echo $operatormesin->hasil_pack ?></td>
										<td><?php echo $operatormesin->hasil_kg ?></td>
										<!-- <td><?php echo $operatormesin->nama_pattern ?></td>
									<td><?php echo $operatormesin->bentuk ?></td>
									<td><?php echo $operatormesin->ukuran ?></td> -->
										<!-- <td><?php echo $operatormesin->grade ?></td>
									<td><?php echo $operatormesin->gsm ?></td>
									<td><?php echo $operatormesin->lebar ?></td>
									<td><?php echo $operatormesin->qty_roll ?></td>
									<td><?php echo $operatormesin->berat ?></td>
									<td><?php echo $operatormesin->speed_mesin ?></td>
									<td><?php echo $operatormesin->no_stamp ?></td>
									<td><?php echo $operatormesin->jam_proses ?></td>
									<td><?php echo $operatormesin->broke_setting ?></td>
									<td><?php echo $operatormesin->broke_trim ?></td>
									<td><?php echo $operatormesin->broke_serpihan ?></td>
									<td><?php echo $operatormesin->broke_motif ?></td>
									<td><?php echo $operatormesin->sisa_roll ?></td>
									<td><?php echo $operatormesin->ket ?></td>
									<td><?php echo $operatormesin->kode ?></td>
									<td><?php echo $operatormesin->waktu_downtime ?></td>
									<td><?php echo $operatormesin->jam ?></td>
									<td><?php echo $operatormesin->jam_akhir ?></td>
									<td><?php echo $operatormesin->persentase ?></td> -->
										<td style="text-align:center" width="200px">
											<!-- <div class="direct-chat-text coment" id="comment">
											REAPET ORDER
										</div> -->
											<button type="button" class="btn btn-info btn-sm" id="detail_operatormesin" title="Lihat data" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $operatormesin->no_wo ?>" data-fullname="<?= $operatormesin->full_name ?>" data-sisa_roll="<?= $operatormesin->sisa_roll ?>" data-customer="<?= $operatormesin->nama_customer ?>" data-nonpassed_kode="<?= $operatormesin->kode_non_passed ?>" data-wip="<?= $operatormesin->wip ?>" data-nonpassed_pack="<?= $operatormesin->nonpassed_pack ?>" data-nonpassed_kg="<?= $operatormesin->nonpassed_kg ?>" data-tanggal="<?= $operatormesin->tanggal ?>" data-operator2="<?= $operatormesin->operator2 ?>" data-operator3="<?= $operatormesin->operator3 ?>" data-operator4="<?= $operatormesin->operator4 ?>" data-satuan_pack="<?= $operatormesin->satuan_pack ?>" data-menit_proses="<?= $operatormesin->menit_proses ?>" data-target_jam="<?= $operatormesin->target_jam ?>" data-nama_pattern="<?= $operatormesin->nama_pattern ?>" data-lebar="<?= $operatormesin->lebar ?>" data-qty_roll="<?= $operatormesin->qty_roll ?>" data-berat="<?= $operatormesin->berat ?>" data-speed_mesin="<?= $operatormesin->id_speed ?>" data-mesin="<?= $operatormesin->kode_mesin ?>" data-shift="<?= $operatormesin->shift ?>" data-warna="<?= $operatormesin->warna ?>" data-bentuk="<?= $operatormesin->bentuk ?>" data-ukuran="<?= $operatormesin->ukuran ?>" data-lembar="<?= $operatormesin->lembar ?>" data-no_stamp="<?= $operatormesin->no_stamp ?>" data-jam_proses="<?= $operatormesin->jam_proses ?>" data-grade="<?= $operatormesin->grade ?>" data-gsm="<?= $operatormesin->gsm ?>" data-hasil_pack="<?= $operatormesin->hasil_pack ?>" data-hasil_kg="<?= $operatormesin->hasil_kg ?>" data-ket="<?= $operatormesin->ket ?>" data-broke_setting="<?= $operatormesin->broke_setting ?>" data-broke_trim="<?= $operatormesin->broke_trim ?>" data-broke_serpihan="<?= $operatormesin->broke_serpihan ?>" data-broke_motif="<?= $operatormesin->broke_motif ?>" data-sisa_roll="<?= $operatormesin->sisa_roll ?>" data-kode_downtime="<?= $operatormesin->kode ?>" data-kode_downtime2="<?= $operatormesin->downtime2 ?>" data-kode_downtime3="<?= $operatormesin->downtime3 ?>" data-kode_downtime4="<?= $operatormesin->downtime4 ?>" data-waktu_downtime="<?= $operatormesin->waktu_downtime ?>" data-waktu_downtime2="<?= $operatormesin->waktu_downtime2 ?>" data-waktu_downtime3="<?= $operatormesin->waktu_downtime3 ?>" data-waktu_downtime4="<?= $operatormesin->waktu_downtime4 ?>" data-jam_awal="<?= $operatormesin->jam ?>" data-jam_akhir="<?= $operatormesin->jam_akhir ?>" data-persentase="<?= $operatormesin->persentase ?>"><i class="fa fa-eye"></i></button>
											<?php
											// echo anchor(site_url('operatormesin/read/' . $operatormesin->id_operator_mesin), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
											// echo '  ';
											echo anchor(site_url('operatormesin2/update/' . $operatormesin->id_operator_mesin), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm edit" title="Edit Data"');
											echo '  ';
											echo anchor(site_url('operatormesin2/replay/' . $operatormesin->id_operator_mesin), '<i class="fa fa-history" aria-hidden="true"></i>', 'class="btn btn-success btn-sm" id="reapet" title="Reapet Data"');
											echo '  ';
											echo anchor(site_url('operatormesin2/delete/' . $operatormesin->id_operator_mesin), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" title="Hapus Data" id="btn-hapus" Delete');
											?>
										</td>
									</tr>
								<?php
								}
								?>
							</table> <?php } else { ?>
							<table class="table table-bordered" style="margin-bottom: 10px">
								<tr>
									<th>No</th>
									<th>No Form</th>
									<th>No Wo</th>
									<th>Tanggal</th>
									<th>Operator</th>
									<!-- <th>Operator2</th>
									<th>Operator3</th>
									<th>Operator4</th> -->
									<th>Customer</th>
									<!-- <th>Shift</th> -->
									<th>Mesin</th>
									<th>Lembar</th>
									<th>Target Mesin</th>
									<th>Menit Proses</th>
									<th>Target Jam</th>
									<th>Hasil Pack</th>
									<th>Hasil Kg</th>
									<!-- <th>Pattern</th>
									<th>Bentuk</th>
									<th>Ukuran</th> -->
									<!-- <th>Grade</th>
									<th>Gsm</th>
									<th>Lebar</th>
									<th>Qty Roll</th>
									<th>Berat</th>
									<th>Speed</th>
									<th>No Stamp</th>
									<th>Jam Proses</th>
									
									<th>Broke Setting</th>
									<th>Broke Trim</th>
									<th>Broke Serpihan</th>
									<th>Broke Motif</th>
									<th>Sisa Roll</th>
									<th>ket</th>
									<th>Downtime</th>
									<th>Waktu Downtime</th>
									<th>Jam</th>
									<th>Jam Akhir</th>
									<th>Persentase</th> -->
									<th>Action</th>
								</tr>
								<?php
										foreach ($get_limit_peruser as $operatormesin) {
								?>
									<tr id="cart-table">
										<td width="10px"><?php echo ++$start ?></td>
										<td><?php echo $operatormesin->no_form ?></td>
										<td><?php echo $operatormesin->no_wo ?></td>
										<td><?php echo $operatormesin->tanggal ?></td>
										<td><?php echo $operatormesin->full_name ?></td>
										<!-- <td><?php echo $operatormesin->operator2 ?></td>
										<td><?php echo $operatormesin->operator3 ?></td>
										<td><?php echo $operatormesin->operator4 ?></td> -->
										<td><?php echo $operatormesin->nama_customer ?></td>
										<!-- <td><?php echo $operatormesin->shift ?></td> -->
										<td><?php echo $operatormesin->kode_mesin ?></td>
										<td><?php echo $operatormesin->lembar ?></td>
										<td><?php echo $operatormesin->satuan_pack ?></td>
										<td><?php echo $operatormesin->menit_proses ?></td>
										<td><?php echo $operatormesin->target_jam ?></td>
										<td><?php echo $operatormesin->hasil_pack ?></td>
										<td><?php echo $operatormesin->hasil_kg ?></td>
										<!-- <td><?php echo $operatormesin->nama_pattern ?></td>
										<td><?php echo $operatormesin->bentuk ?></td>
										<td><?php echo $operatormesin->ukuran ?></td> -->
										<!-- <td><?php echo $operatormesin->grade ?></td>
										<td><?php echo $operatormesin->gsm ?></td>
										<td><?php echo $operatormesin->lebar ?></td>
										<td><?php echo $operatormesin->qty_roll ?></td>
										<td><?php echo $operatormesin->berat ?></td>
										<td><?php echo $operatormesin->speed_mesin ?></td>
										<td><?php echo $operatormesin->no_stamp ?></td>
										<td><?php echo $operatormesin->jam_proses ?></td>
										<td><?php echo $operatormesin->broke_setting ?></td>
										<td><?php echo $operatormesin->broke_trim ?></td>
										<td><?php echo $operatormesin->broke_serpihan ?></td>
										<td><?php echo $operatormesin->broke_motif ?></td>
										<td><?php echo $operatormesin->sisa_roll ?></td>
										<td><?php echo $operatormesin->ket ?></td>
										<td><?php echo $operatormesin->kode ?></td>
										<td><?php echo $operatormesin->waktu_downtime ?></td>
										<td><?php echo $operatormesin->jam ?></td>
										<td><?php echo $operatormesin->jam_akhir ?></td>
										<td><?php echo $operatormesin->persentase ?></td> -->
										<td style="text-align:center" width="160px">
											<!-- <div class="direct-chat-text coment" id="comment">
												REAPET ORDER
											</div> -->
											<button type="button" class="btn btn-info btn-sm" id="detail_operatormesin" title="Lihat data" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $operatormesin->no_wo ?>" data-fullname="<?= $operatormesin->full_name ?>" data-sisa_roll="<?= $operatormesin->sisa_roll ?>" data-customer="<?= $operatormesin->nama_customer ?>" data-nonpassed_kode="<?= $operatormesin->kode_non_passed ?>" data-wip="<?= $operatormesin->wip ?>" data-nonpassed_pack="<?= $operatormesin->nonpassed_pack ?>" data-nonpassed_kg="<?= $operatormesin->nonpassed_kg ?>" data-tanggal="<?= $operatormesin->tanggal ?>" data-operator2="<?= $operatormesin->operator2 ?>" data-operator3="<?= $operatormesin->operator3 ?>" data-operator4="<?= $operatormesin->operator4 ?>" data-satuan_pack="<?= $operatormesin->satuan_pack ?>" data-menit_proses="<?= $operatormesin->menit_proses ?>" data-target_jam="<?= $operatormesin->target_jam ?>" data-nama_pattern="<?= $operatormesin->nama_pattern ?>" data-lebar="<?= $operatormesin->lebar ?>" data-qty_roll="<?= $operatormesin->qty_roll ?>" data-berat="<?= $operatormesin->berat ?>" data-speed_mesin="<?= $operatormesin->id_speed ?>" data-mesin="<?= $operatormesin->kode_mesin ?>" data-shift="<?= $operatormesin->shift ?>" data-warna="<?= $operatormesin->warna ?>" data-bentuk="<?= $operatormesin->bentuk ?>" data-ukuran="<?= $operatormesin->ukuran ?>" data-lembar="<?= $operatormesin->lembar ?>" data-no_stamp="<?= $operatormesin->no_stamp ?>" data-jam_proses="<?= $operatormesin->jam_proses ?>" data-grade="<?= $operatormesin->grade ?>" data-gsm="<?= $operatormesin->gsm ?>" data-hasil_pack="<?= $operatormesin->hasil_pack ?>" data-hasil_kg="<?= $operatormesin->hasil_kg ?>" data-ket="<?= $operatormesin->ket ?>" data-broke_setting="<?= $operatormesin->broke_setting ?>" data-broke_trim="<?= $operatormesin->broke_trim ?>" data-broke_serpihan="<?= $operatormesin->broke_serpihan ?>" data-broke_motif="<?= $operatormesin->broke_motif ?>" data-sisa_roll="<?= $operatormesin->sisa_roll ?>" data-kode_downtime="<?= $operatormesin->kode ?>" data-kode_downtime2="<?= $operatormesin->downtime2 ?>" data-kode_downtime3="<?= $operatormesin->downtime3 ?>" data-kode_downtime4="<?= $operatormesin->downtime4 ?>" data-waktu_downtime="<?= $operatormesin->waktu_downtime ?>" data-waktu_downtime2="<?= $operatormesin->waktu_downtime2 ?>" data-waktu_downtime3="<?= $operatormesin->waktu_downtime3 ?>" data-waktu_downtime4="<?= $operatormesin->waktu_downtime4 ?>" data-jam_awal="<?= $operatormesin->jam ?>" data-jam_akhir="<?= $operatormesin->jam_akhir ?>" data-persentase="<?= $operatormesin->persentase ?>"><i class="fa fa-eye"></i></button>
											<?php
											// echo anchor(site_url('operatormesin/read/' . $operatormesin->id_operator_mesin), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
											// echo '  ';
											echo anchor(site_url('operatormesin/update/' . $operatormesin->id_operator_mesin), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm edit" title="Edit Data"');
											echo '  ';
											echo anchor(site_url('operatormesin/replay/' . $operatormesin->id_operator_mesin), '<i class="fa fa-history" aria-hidden="true"></i>', 'class="btn btn-success btn-sm" id="reapet" title="Reapet Data"');
											echo '  ';
											// echo anchor(site_url('operatormesin/delete/' . $operatormesin->id_operator_mesin), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" title="Hapus Data" id="btn-hapus" Delete');
											?>
										</td>
									</tr>
								<?php
										}
								?>
							</table> <?php }
										?>

						<div class="row">
							<div class="col-md-6">

							</div>
							<div class="col-md-6 text-right">
								<?php echo $pagination ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- MODAL DETAIL OPERATOR MESIN -->
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Detail Operator Mesin</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered no-margin border-3">
					<tbody>
						<tr>
							<th>No WO</th>
							<td><span id="no_wo"></span></td>
							<th>Kode Mesin</th>
							<td><span id="kode_mesin"></span></td>
							<th>Customer</th>
							<td><span id="cust"></span></td>
						</tr>
						<tr>
							<th>lembar</th>
							<td><span id="lembar"></span></td>
							<th>Target Mesin</th>
							<td><span id="satuan_pack"></span></td>
							<th>Target Jam</th>
							<td><span id="target_jam"></span></td>

						</tr>
						<tr>
							<th>Menit Proses</th>
							<td><span id="menit_proses"></alspan>
							</td>
							<th>Ukuran</th>
							<td><span id="ukuran"></span></td>
							<th>Speed Mesin</th>
							<td><span id="speed_mesin"></span></td>
						<tr>
							<th>Jam Proses</th>
							<td><span id="jam_proses"></span></td>
							<th>Hasil Kg</th>
							<td><span id="hasil_kg"></span></td>
							<th>Hasil Pack</th>
							<td><span id="hasil_pack"></span></td>
						</tr>
						<tr>
							<th>Non Passed (Kode)</th>
							<td><span id="nonpassed_kode"></span></td>
							<th>Non Passed (Pack)</th>
							<td><span id="nonpassed_pack"></span></td>
							<th>Non Passed (Kg)</th>
							<td><span id="nonpassed_kg"></span></td>
						</tr>
						<tr>
							<th>Broke Serpihan</th>
							<td><span id="broke_serpihan"></span></td>
							<th>Broke Setting</th>
							<td><span id="broke_setting"></span></td>
							<th>Broke Trim</th>
							<td><span id="broke_trim"></span></td>
						</tr>
						<tr>
							<th>Broke Motif</th>
							<td><span id="broke_motif"></span></td>
							<th>QTY Roll</th>
							<td><span id="qty_roll"></span></td>
							<th>Sisa Roll</th>
							<td><span id="sisa_roll"></span></td>
						</tr>
						<tr>
							<th>Downtime 1</th>
							<td><span id="kode_downtime"></span></td>
							<th>Waktu Downtime</th>
							<td><span id="waktu_downtime"></span></td>
							<th>Jam Awal</th>
							<td><span id="jam_awal"></span></td>
						</tr>
						<tr>
							<th>Jam Akhir</th>
							<td><span id="jam_akhir"></span></td>

							<th>Nama Pattern</th>
							<td><span id="nama_pattern"></span></td>
							<th>Lebar</th>
							<td><span id="lebar"></span></td>
						</tr>
						<tr>
							<th>Karyawan</th>
							<td><span id="operator1"></alspan>
							</td>
							<th>No Stamp</th>
							<td><span id="no_stamp"></span></td>
							</td>
							<th>Shift</th>
							<td><span id="shift"></span></td>

						</tr>

						<tr>
							<th>Operator2</th>
							<td><span id="operator2"></span></td>
							<th>Warna</th>
							<td><span id="warna"></span></td>
							<th>Bentuk</th>
							<td><span id="bentuk"></span></td>
						</tr>
						<tr>
							<th>Operator3</th>
							<td><span id="operator3"></span></td>
							<th>Berat</th>
							<td><span id="berat"></span></td>
							<th>Tanggal</th>
							<td><span id="datetime"></span></td>
						</tr>
						<tr>
							<th>Operator4</th>
							<td><span id="operator4"></span></td>
							<th>Grade</th>
							<td><span id="grade"></span></td>
							<th>Gsm</th>
							<td><span id="gsm"></span></td>
						</tr>
						<tr>
							<th>ket</th>
							<td><span id="ket"></span></td>
							<th>Persentase</th>
							<td><span id="persentase"></span></td>
							<th>WIP (PACK)</th>
							<td><span id="wip"></span></td>
						</tr>
						<tr>
							<th>Downtime 2</th>
							<td><span id="downtime2"></span></td>
							<th>Downtime 3</th>
							<td><span id="downtime3"></span></td>
							<th>Downtime 4</th>
							<td><span id="downtime4"></span></td>
						</tr>
						<tr>
							<th>Waktu Downtime 2</th>
							<td><span id="waktu_downtime2"></span></td>
							<th>Waktu Downtime 3</th>
							<td><span id="waktu_downtime3"></span></td>
							<th>Waktu Downtime 4</th>
							<td><span id="waktu_downtime4"></span></td>
						</tr>


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script>
	$(document).on('click', '#detail_operatormesin', function() {
		$('#no_wo').text($(this).data('nowo'))
		$('#cust').text($(this).data('customer'))
		$('#datetime').text($(this).data('tanggal'))
		$('#operator1').text($(this).data('fullname'))
		$('#jam_awal').text($(this).data('jam_awal'))
		$('#jam_akhir').text($(this).data('jam_akhir'))
		$('#shift').text($(this).data('shift'))
		$('#warna').text($(this).data('warna'))
		$('#bentuk').text($(this).data('bentuk'))
		$('#grade').text($(this).data('grade'))
		$('#gsm').text($(this).data('gsm'))
		$('#no_stock').text($(this).data('no_stock'))
		$('#lembar').text($(this).data('lembar'))
		$('#ukuran').text($(this).data('ukuran'))
		$('#ket').text($(this).data('ket'))
		$('#operator2').text($(this).data('operator2'))
		$('#operator3').text($(this).data('operator3'))
		$('#operator4').text($(this).data('operator4'))
		$('#lebar').text($(this).data('lebar'))
		$('#menit_proses').text($(this).data('menit_proses'))
		$('#persentase').text($(this).data('persentase'))
		$('#nama_pattern').text($(this).data('nama_pattern'))
		$('#target_jam').text($(this).data('target_jam'))
		$('#hasil_pack').text($(this).data('hasil_pack'))
		$('#hasil_kg').text($(this).data('hasil_kg'))
		$('#broke_trim').text($(this).data('broke_trim'))
		$('#broke_serpihan').text($(this).data('broke_serpihan'))
		$('#broke_motif').text($(this).data('broke_motif'))
		$('#sisa_roll').text($(this).data('sisa_roll'))
		$('#berat').text($(this).data('berat'))
		$('#broke_setting').text($(this).data('broke_setting'))
		$('#jam_proses').text($(this).data('jam_proses'))
		$('#speed_mesin').text($(this).data('speed_mesin'))
		$('#waktu_downtime').text($(this).data('waktu_downtime'))
		$('#kode_downtime').text($(this).data('kode_downtime'))
		$('#waktu_downtime2').text($(this).data('waktu_downtime2'))
		$('#downtime2').text($(this).data('kode_downtime2'))
		$('#waktu_downtime3').text($(this).data('waktu_downtime3'))
		$('#downtime3').text($(this).data('kode_downtime3'))
		$('#waktu_downtime4').text($(this).data('waktu_downtime4'))
		$('#downtime4').text($(this).data('kode_downtime4'))
		$('#qty_roll').text($(this).data('qty_roll'))
		$('#no_stamp').text($(this).data('no_stamp'))
		$('#kode_mesin').text($(this).data('mesin'))
		$('#satuan_pack').text($(this).data('satuan_pack'))
		$('#nonpassed_kode').text($(this).data('nonpassed_kode'))
		$('#nonpassed_pack').text($(this).data('nonpassed_pack'))
		$('#nonpassed_kg').text($(this).data('nonpassed_kg'))
		$('#wip').text($(this).data('wip'))

	})
</script>