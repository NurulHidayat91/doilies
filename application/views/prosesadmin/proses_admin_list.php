<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-warning box-solid">

					<div class="box-header">
						<h3 class="box-title">KELOLA DATA PROSES ADMIN</h3>
					</div>

					<div class="box-body table-responsive">
						<div class='row'>
							<div class='col-md-9'>
								<div style="padding-bottom: 10px;">
									<?php echo anchor(site_url('prosesadmin/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
									<?php echo anchor(site_url('prosesadmin/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
							</div>
							<div class='col-md-3'>
								<form action="<?php echo site_url('prosesadmin/index'); ?>" class="form-inline" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
										<span class="input-group-btn">
											<?php
											if ($q <> '') {
											?>
												<a href="<?php echo site_url('prosesadmin'); ?>" class="btn btn-default">Reset</a>
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
						<table class="table table-bordered" style="margin-bottom: 10px">
							<tr>
								<th>No</th>
								<th>No Wo</th>
								<th>Tanggal</th>
								<th>Waktu</th>
								<th>Operator</th>
								<th>Shift</th>
								<th>Mesin</th>
								<th>Customer</th>
								<th>Sub Bagian</th>
								<th>Warna</th>
								<th>Bentuk</th>
								<th>Ukuran</th>
								<th>Lembar</th>
								<th>Speed Mesin</th>
								<th>Target</th>
								<!-- <th>Hasil Potongan</th>
								<th>Reject Potongan</th>
								<th>Hasil Geprek</th>
								<th>Reject Geprek</th>
								<th>Hasil Sortir Polybag</th>
								<th>Reject Sortir Polybag</th>
								<th>Hasil Sealer</th>
								<th>Reject Sealer</th>
								<th>Hasil Oven</th>
								<th>Reject Oven</th>
								<th>Hasil Sticker</th>
								<th>Reject Sticker</th>
								<th>Hasil Packing Box</th>
								<th>Reject Packing Box</th> -->
								<th>Action</th>
							</tr><?php
									foreach ($prosesadmin_data as $prosesadmin) {
									?>
								<tr>
									<td width="10px"><?php echo ++$start ?></td>
									<td><?php echo $prosesadmin->no_wo ?></td>
									<td><?php echo $prosesadmin->tanggal ?></td>
									<td><?php echo $prosesadmin->waktu ?></td>
									<td><?php echo $prosesadmin->full_name ?></td>
									<td><?php echo $prosesadmin->shift ?></td>
									<td><?php echo $prosesadmin->kode_mesin ?></td>
									<td><?php echo $prosesadmin->nama_customer ?></td>
									<td><?php echo $prosesadmin->nama_pekerjaan ?></td>
									<td><?php echo $prosesadmin->warna ?></td>
									<td><?php echo $prosesadmin->bentuk ?></td>
									<td><?php echo $prosesadmin->ukuran ?></td>
									<td><?php echo $prosesadmin->lembar ?></td>
									<td><?php echo $prosesadmin->speed_mesin ?></td>
									<td><?php echo $prosesadmin->target ?></td>
									<!-- <td><?php echo $prosesadmin->hasil_potongan ?></td>
									<td><?php echo $prosesadmin->reject_potongan ?></td>
									<td><?php echo $prosesadmin->hasil_geprek ?></td>
									<td><?php echo $prosesadmin->reject_geprek ?></td>
									<td><?php echo $prosesadmin->hasil_sortir_polybag ?></td>
									<td><?php echo $prosesadmin->reject_sortir_polybag ?></td>
									<td><?php echo $prosesadmin->hasil_sealer ?></td>
									<td><?php echo $prosesadmin->reject_sealer ?></td>
									<td><?php echo $prosesadmin->hasil_oven ?></td>
									<td><?php echo $prosesadmin->reject_oven ?></td>
									<td><?php echo $prosesadmin->hasil_sticker ?></td>
									<td><?php echo $prosesadmin->reject_sticker ?></td>
									<td><?php echo $prosesadmin->hasil_packing_box ?></td>
									<td><?php echo $prosesadmin->reject_packing_box ?></td> -->
									<td style="text-align:center" width="130px">
										<button type="button" class="btn btn-info btn-sm" id="detail_prosesadmin" data-target="#modal-detail" data-toggle="modal" data-nowo="<?= $prosesadmin->no_wo ?>" data-fullname="<?= $prosesadmin->full_name ?>" data-customer="<?= $prosesadmin->nama_customer ?>" data-speed_mesin="<?= $prosesadmin->speed_mesin ?>" data-jenis_pekerjaan="<?= $prosesadmin->nama_pekerjaan ?>" data-tanggal="<?= $prosesadmin->tanggal ?>" data-waktu="<?= $prosesadmin->waktu ?>" data-shift="<?= $prosesadmin->shift ?>" data-target1="<?= $prosesadmin->target ?>" data-warna="<?= $prosesadmin->warna ?>" data-bentuk="<?= $prosesadmin->bentuk ?>" data-ukuran="<?= $prosesadmin->ukuran ?>" data-lembar="<?= $prosesadmin->lembar ?>" data-hasil_potongan="<?= $prosesadmin->hasil_potongan ?>" data-reject_potongan="<?= $prosesadmin->reject_potongan ?>" data-kode_mesin="<?= $prosesadmin->kode_mesin ?>" data-hasil_sortir_polybag="<?= $prosesadmin->hasil_sortir_polybag ?>" data-reject_sortir_polybag="<?= $prosesadmin->reject_sortir_polybag ?>" data-hasil_potongan="<?= $prosesadmin->hasil_potongan ?>" data-reject_sticker="<?= $prosesadmin->reject_sticker ?>" data-hasil_sticker="<?= $prosesadmin->hasil_sticker ?>" data-reject_potongan="<?= $prosesadmin->reject_potongan ?>" data-hasil_geprek="<?= $prosesadmin->hasil_geprek ?>" data-broke_geprek="<?= $prosesadmin->reject_geprek ?>" data-reject_geprek="<?= $prosesadmin->reject_geprek ?>" data-hasil_sealer="<?= $prosesadmin->hasil_sealer ?>" data-reject_sealer="<?= $prosesadmin->reject_sealer ?>" data-hasil_oven="<?= $prosesadmin->hasil_oven ?>" data-reject_oven="<?= $prosesadmin->reject_oven ?>" data-hasil_packing_box="<?= $prosesadmin->hasil_packing_box ?>" data-reject_packing_box="<?= $prosesadmin->reject_packing_box ?>"><i class="fa fa-eye"></i></button>
										<?php
										// echo anchor(site_url('prosesadmin/read/' . $prosesadmin->id_proses), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
										// echo '  ';
										echo anchor(site_url('prosesadmin/update/' . $prosesadmin->id_proses), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
										echo '  ';
										echo anchor(site_url('prosesadmin/delete/' . $prosesadmin->id_proses), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" id="btn-hapus" Delete');
										?>
									</td>
								</tr>
							<?php
									}
							?>
						</table>
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

<!-- MODAL DETAIL PROSES INPUT ADMIN -->
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Detail Proses Input Admin</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered no-margin border-3">
					<tbody>
						<tr>
							<th>No WO</th>
							<td><span id="no_wo"></span></td>
							<th>Customer</th>
							<td><span id="cust"></span></td>
							<th>Speed Mesin</th>
							<td><span id="speed_mesin"></span></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><span id="datetime"></span></td>
							<th>Shift</th>
							<td><span id="shift"></span></td>
							<th>Jenis Pekerjaan</th>
							<td><span id="jenis_pekerjaan"></span></td>
						</tr>
						<tr>
							<th>Operator</th>
							<td><span id="operator1"></span></td>
							<th>Waktu</th>
							<td><span id="waktu"></span></td>
							<th>Warna</th>
							<td><span id="warna"></span></td>
						</tr>

						<tr>
							<th>Ukuran</th>
							<td><span id="ukuran"></span></td>
							<th>lembar</th>
							<td><span id="lembar"></span></td>
							<th>Bentuk</th>
							<td><span id="bentuk"></span></td>
						</tr>
						<tr>
							<th>Hasil Packing Box</th>
							<td><span id="hasil_packing_box"></span></td>
							<th>Broke Packing Box</th>
							<td><span id="reject_packing_box"></span></td>
							<th>Target</th>
							<td><span id="target1"></span></td>
						</tr>
						<tr>
							<th>Kode Mesin</th>
							<td><span id="kode_mesin"></span></td>
							<th>Hasil potongan</th>
							<td><span id="hasil_potongan"></span></td>
							<th>Broke potongan</th>
							<td><span id="reject_potongan"></span></td>
						</tr>
						<tr>
							<th>Hasil Geprek</th>
							<td><span id="hasil_geprek"></span></td>
							<th>Broke Geprek</th>
							<td><span id="broke_geprek"></span></td>
							<th>Hasil Sortir Polybag</th>
							<td><span id="hasil_sortir_polybag"></span></td>
						</tr>
						<tr>
							<th>Broke Sortir Polybag</th>
							<td><span id="reject_sortir_polybag"></span></td>
							<th>Hasil Sealer</th>
							<td><span id="hasil_sealer"></span></td>
							<th>Broke Sealer</th>
							<td><span id="reject_sealer"></span></td>
						</tr>
						<tr>
							<th>Hasil Oven</th>
							<td><span id="hasil_oven"></span></td>
							<th>Broke Oven</th>
							<td><span id="reject_oven"></span></td>
							<th>Hasil Sticker</th>
							<td><span id="hasil_sticker"></span></td>
						</tr>
						<tr>
							<th>Broke Sticker</th>
							<td><span id="reject_sticker"></span></td>

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
	$(document).on('click', '#detail_prosesadmin', function() {
		$('#no_wo').text($(this).data('nowo'))
		$('#cust').text($(this).data('customer'))
		$('#datetime').text($(this).data('tanggal'))
		$('#operator1').text($(this).data('fullname'))
		$('#waktu').text($(this).data('waktu'))
		$('#shift').text($(this).data('shift'))
		$('#warna').text($(this).data('warna'))
		$('#bentuk').text($(this).data('bentuk'))
		$('#target1').text($(this).data('target1'))
		$('#speed_mesin').text($(this).data('speed_mesin'))
		$('#broke').text($(this).data('rejected'))
		$('#lembar').text($(this).data('lembar'))
		$('#ukuran').text($(this).data('ukuran'))
		$('#jenis_pekerjaan').text($(this).data('jenis_pekerjaan'))
		$('#hasil_potongan').text($(this).data('hasil_potongan'))
		$('#reject_potongan').text($(this).data('reject_potongan'))
		$('#hasil_geprek').text($(this).data('hasil_geprek'))
		$('#broke_geprek').text($(this).data('broke_geprek'))
		$('#hasil_sortir_polybag').text($(this).data('hasil_sortir_polybag'))
		$('#reject_sortir_polybag').text($(this).data('reject_sortir_polybag'))
		$('#hasil_sealer').text($(this).data('hasil_sealer'))
		$('#reject_sealer').text($(this).data('reject_sealer'))
		$('#hasil_sticker').text($(this).data('hasil_sticker'))
		$('#reject_sticker').text($(this).data('reject_sticker'))
		$('#hasil_oven').text($(this).data('hasil_oven'))
		$('#reject_oven').text($(this).data('reject_oven'))
		$('#kode_mesin').text($(this).data('kode_mesin'))
		$('#hasil_packing_box').text($(this).data('hasil_packing_box'))
		$('#reject_packing_box').text($(this).data('reject_packing_box'))



	})
</script>