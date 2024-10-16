<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Operatormesin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Operator_mesin_model');
		$this->load->model('laporan_model');
		// $this->load->model('bentuk_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'index.php/operatormesin/index?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/operatormesin/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/operatormesin/index/';
			$config['first_url'] = base_url() . 'index.php/operatormesin/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Operator_mesin_model->total_rows($q);
		$operatormesin = $this->Operator_mesin_model->get_limit_data($config['per_page'], $start, $q);
		$data_peruser = $this->Operator_mesin_model->get_limit_peruser($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'operatormesin_data' => $operatormesin,
			'get_limit_peruser' => $data_peruser,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'operatormesin/operator_mesin_list', $data);
	}

	public function read($id)
	{
		$row = $this->Operator_mesin_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_operator_mesin' => $row->id_operator_mesin,
				'id_user' => $row->id_user,
				'operator2' => $row->operator2,
				'operator3' => $row->operator3,
				'operator4' => $row->operator4,
				'shift' => $row->shift,
				'id_mesin' => $row->id_mesin,
				'id_customer' => $row->id_customer,
				'no_wo' => $row->no_wo,
				'id_pattern' => $row->id_pattern,
				'tanggal' => $row->tanggal,
				'id_bentuk' => $row->id_bentuk,
				'id_ukuran' => $row->id_ukuran,
				'id_grade' => $row->id_grade,
				'id_gsm' => $row->id_gsm,
				'lebar' => $row->lebar,
				'id_lembar' => $row->id_lembar,
				'satuan_pack' => $row->satuan_pack,
				'qty_roll' => $row->qty_roll,
				'berat' => $row->berat,
				'id_speed' => $row->id_speed,
				'no_stamp' => $row->no_stamp,
				'target_jam' => $row->target_jam,
				'jam_proses' => $row->jam_proses,
				'hasil_pack' => $row->hasil_pack,
				'hasil_kg' => $row->hasil_kg,
				'broke_setting' => $row->broke_setting,
				'broke_trim' => $row->broke_trim,
				'menit_proses' => $row->menit_proses,
				'broke_serpihan' => $row->broke_serpihan,
				'broke_motif' => $row->broke_motif,
				'sisa_roll' => $row->sisa_roll,
				'ket' => $row->ket,
				'id_downtime' => $row->id_downtime,
				'waktu_downtime' => $row->waktu_downtime,
				'id_jam' => $row->id_jam,
				'jam_akhir' => $row->jam_akhir,
				'persentase' => $row->persentase,
			);
			$this->template->load('template', 'operatormesin/operator_mesin_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('operatormesin'));
		}
	}

	public function create()
	{
		$row = $this->Operator_mesin_model->get_all();

		$grade = $this->grade_model->get_all();
		$lembar = $this->lembar_pack_model->get_all();
		$warna = $this->warna_model->get_all();
		$ukuran = $this->ukuran_model->get_all();
		// $speed_mesin = $this->speed_mesin_model->get_all();
		$non_passed = $this->non_passed_model->get_all();
		$downtime = $this->downtime_model->get_all();
		$data = array(
			'button' => 'Create',
			'row'	 => $row,
			'action' => site_url('operatormesin/create_action'),
			'id_operator_mesin' => set_value('id_operator_mesin'),
			'id_user' => set_value('id_user'),
			'no_form' => set_value('no_form'),
			'operator2' => set_value('operator2'),
			'operator3' => set_value('operator3'),
			'operator4' => set_value('operator4'),
			'shift' => set_value('shift'),
			'id_mesin' => set_value('id_mesin'),
			'id_customer' => set_value('id_customer'),
			'no_wo' => set_value('no_wo'),
			'id_pattern' => set_value('id_pattern'),
			'tanggal' => set_value('tanggal'),
			// 'bentuk' => $bentuk,
			'id_bentuk' => set_value('id_bentuk'),
			'id_warna' => $warna,
			// 'id_warna' => set_value('id_warna'),
			// 'id_ukuran' => set_value('id_ukuran'),
			'ukuran' => $ukuran,
			// 'id_grade' => set_value('id_grade'),
			'id_grade' => $grade,
			'id_gsm' => set_value('id_gsm'),
			'lebar' => set_value('lebar'),
			'lembar' => $lembar,
			// 'id_lembar' => set_value('id_lembar'),
			'satuan_pack' => set_value('satuan_pack'),
			'qty_roll' => set_value('qty_roll'),
			'berat' => set_value('berat'),
			'id_speed' => set_value('id_speed'),
			// 'speed_mesin' => $speed_mesin,
			'no_stamp' => set_value('no_stamp'),
			'target_jam' => set_value('target_jam'),
			'jam_proses' => set_value('jam_proses'),
			'hasil_pack' => set_value('hasil_pack'),
			'hasil_kg' => set_value('hasil_kg'),
			'nonpassed_kode' => $non_passed,
			// 'nonpassed_kode' => set_value('nonpassed_kode'),
			'nonpassed_pack' => set_value('nonpassed_pack'),
			'nonpassed_kg' => set_value('nonpassed_kg'),
			'broke_setting' => set_value('broke_setting'),
			'broke_trim' => set_value('broke_trim'),
			'menit_proses' => set_value('menit_proses'),
			'broke_serpihan' => set_value('broke_serpihan'),
			'broke_motif' => set_value('broke_motif'),
			'sisa_roll' => set_value('sisa_roll'),
			'ket' => set_value('ket'),
			'id_downtime' => $downtime,
			'ket1' => set_value('ket1'),
			// 'alasan1' => set_value('alasan1'),
			// 'id_downtime' => set_value('id_downtime'),
			'waktu_downtime' => set_value('waktu_downtime'),
			'downtime2' => set_value('downtime2'),
			'ket2' => set_value('ket2'),

			// 'alasan2' => set_value('alasan2'),
			'waktu_downtime2' => set_value('waktu_downtime2'),
			'downtime3' => set_value('downtime3'),
			'ket3' => set_value('ket3'),
			// 'alasan3' => set_value('alasan3'),
			'waktu_downtime3' => set_value('waktu_downtime3'),
			'downtime4' => set_value('downtime4'),
			'ket4' => set_value('ket4'),

			// 'alasan4' => set_value('alasan4'),
			'waktu_downtime4' => set_value('waktu_downtime4'),

			'downtime5' => set_value('downtime5'),
			'ket5' => set_value('ket5'),

			'waktu_downtime5' => set_value('waktu_downtime5'),

			'downtime6' => set_value('downtime6'),
			'ket6' => set_value('ket6'),

			'waktu_downtime6' => set_value('waktu_downtime6'),

			'downtime7' => set_value('downtime7'),
			'ket7' => set_value('ket7'),

			'waktu_downtime7' => set_value('waktu_downtime7'),

			'downtime8' => set_value('downtime8'),
			'ket8' => set_value('ket8'),

			'waktu_downtime8' => set_value('waktu_downtime8'),
			'id_jam' => set_value('id_jam'),
			'jam_akhir' => set_value('jam_akhir'),
			'wip' => set_value('wip'),
			'panjang_pot' => set_value('panjang_pot'),
			'jml_gambar' => set_value('jml_gambar'),
			'kebutuhan_bahan' => set_value('kebutuhan_bahan'),
			'kg_perpack' => set_value('kg_perpack'),
			'jml_operator' => set_value('jml_operator'),
			'persentase' => set_value('persentase'),
		);
		$this->template->load('template', 'operatormesin/operator_mesin_form', $data);
	}

	//Merubah inputan nama menjadi id
	function getWarna($namaWarna)
	{
		$this->db->where('warna', $namaWarna);
		$dokter = $this->db->get('warna')->row_array();
		return $dokter['id_warna'];
	}

	function getBentuk($namaBentuk)
	{
		$this->db->where('bentuk', $namaBentuk);
		$dokter = $this->db->get('bentuk')->row_array();
		return $dokter['id_bentuk'];
	}

	function getPattern($namaPattern)
	{
		$this->db->where('nama_pattern', $namaPattern);
		$dokter = $this->db->get('pattern')->row_array();
		return $dokter['id_pattern'];
	}

	function getGsm($namaGsm)
	{
		$this->db->where('gsm', $namaGsm);
		$gsm = $this->db->get('gsm')->row_array();
		return $gsm['id_gsm'];
	}

	public function create_action()
	{
		$this->_rules();
		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id_user' => $this->session->userdata('id_users'),
				'no_form' => $this->input->post('no_form'),
				'operator2' => $this->input->post('operator2', TRUE),
				'operator3' => $this->input->post('operator3', TRUE),
				'operator4' => $this->input->post('operator4', TRUE),
				'shift' => $this->input->post('shift', TRUE),
				'id_mesin' => $this->input->post('id_mesin', TRUE),
				'id_customer' => $id_customer,
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_pattern' => $this->getPattern($this->input->post('id_pattern', TRUE)),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'id_bentuk' => $this->getBentuk($this->input->post('id_bentuk', TRUE)),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_grade' => $this->input->post('id_grade', TRUE),
				'id_gsm' => $this->getGsm($this->input->post('id_gsm', TRUE)),
				'lebar' => $this->input->post('lebar', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_warna' => $this->getWarna($this->input->post('id_warna', TRUE)),
				'satuan_pack' => $this->input->post('satuan_pack', TRUE),
				'qty_roll' => $this->input->post('qty_roll', TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'id_speed' => $this->input->post('id_speed', TRUE),
				'no_stamp' => $this->input->post('no_stamp', TRUE),
				'target_jam' => $this->input->post('target_jam', TRUE),
				'jam_proses' => $this->input->post('jam_proses', TRUE),
				'hasil_pack' => $this->input->post('hasil_pack', TRUE),
				'hasil_kg' => $this->input->post('hasil_kg', TRUE),
				'nonpassed_kode' => $this->input->post('nonpassed_kode', TRUE),
				'nonpassed_pack' => $this->input->post('nonpassed_pack', TRUE),
				'nonpassed_kg' => $this->input->post('nonpassed_kg', TRUE),
				'broke_setting' => $this->input->post('broke_setting', TRUE),
				'broke_trim' => $this->input->post('broke_trim', TRUE),
				'menit_proses' => $this->input->post('menit_proses', TRUE),
				'broke_serpihan' => $this->input->post('broke_serpihan', TRUE),
				'broke_motif' => $this->input->post('broke_motif', TRUE),
				'sisa_roll' => $this->input->post('sisa_roll', TRUE),
				'ket' => $this->input->post('ket', TRUE),
				'id_downtime' => $this->input->post('id_downtime', TRUE),
				'ket1' => $this->input->post('ket1', TRUE),
				// 'alasan1' => $this->input->post('alasan1', TRUE),
				'waktu_downtime' => $this->input->post('waktu_downtime', TRUE),
				'downtime2' => $this->input->post('downtime2', TRUE),
				'ket2' => $this->input->post('ket2', TRUE),
				// 'alasan2' => $this->input->post('alasan2', TRUE),
				'waktu_downtime2' => $this->input->post('waktu_downtime2', TRUE),
				'downtime3' => $this->input->post('downtime3', TRUE),
				'ket3' => $this->input->post('ket3', TRUE),
				// 'alasan3' => $this->input->post('alasan3', TRUE),
				'waktu_downtime3' => $this->input->post('waktu_downtime3', TRUE),
				'downtime4' => $this->input->post('downtime4', TRUE),
				'ket4' => $this->input->post('ket4', TRUE),
				// 'alasan4' => $this->input->post('alasan4', TRUE),
				'waktu_downtime4' => $this->input->post('waktu_downtime4', TRUE),

				'downtime5' => $this->input->post('downtime5', TRUE),
				'ket5' => $this->input->post('ket5', TRUE),
				'waktu_downtime5' => $this->input->post('waktu_downtime5', TRUE),

				'downtime6' => $this->input->post('downtime6', TRUE),
				'ket6' => $this->input->post('ket6', TRUE),
				'waktu_downtime6' => $this->input->post('waktu_downtime6', TRUE),

				'downtime7' => $this->input->post('downtime7', TRUE),
				'ket7' => $this->input->post('ket7', TRUE),
				'waktu_downtime7' => $this->input->post('waktu_downtime7', TRUE),

				'downtime8' => $this->input->post('downtime8', TRUE),
				'ket8' => $this->input->post('ket8', TRUE),
				'waktu_downtime8' => $this->input->post('waktu_downtime8', TRUE),
				'id_jam' => $this->input->post('id_jam', TRUE),
				'jam_akhir' => $this->input->post('jam_akhir', TRUE),
				'panjang_pot' => $this->input->post('panjang_pot', TRUE),
				'jml_gambar' => $this->input->post('jml_gambar', TRUE),
				'kebutuhan_bahan' => $this->input->post('kebutuhan_bahan', TRUE),
				'kg_perpack' => $this->input->post('kg_perpack', TRUE),
				'jml_operator' => $this->input->post('jml_operator', TRUE),
				'wip' => $this->input->post('wip', TRUE),
				'persentase' => $this->input->post('persentase', TRUE),
				'created'     => date('Y-m-d h:i:s'),
			);


			// var_dump($data);
			// die;
			$this->Operator_mesin_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('operatormesin'));
		}
	}

	public function replay($id)
	{
		$row = $this->Operator_mesin_model->get_by_id($id);
		$grade = $this->grade_model->get_all();
		$warna = $this->warna_model->get_all();

		$lembar = $this->lembar_pack_model->get_all();
		$bentuk = $this->bentuk_model->get_all();
		$ukuran = $this->ukuran_model->get_all();
		// $speed_mesin = $this->speed_mesin_model->get_all();
		$non_passed = $this->non_passed_model->get_all();
		$downtime = $this->downtime_model->get_all();


		if ($row) {
			$data = array(
				'button' => 'Repeat',
				'row' => $row,
				'action' => site_url('operatormesin/create_action'),
				'id_operator_mesin' => set_value('id_operator_mesin', $row->id_operator_mesin),
				'id_user' => set_value('id_user', $row->id_user),
				'no_form' => set_value('no_form', $row->no_form),
				'operator2' => set_value('operator2', $row->operator2),
				'operator3' => set_value('operator3', $row->operator3),
				'operator4' => set_value('operator4', $row->operator4),
				'shift' => set_value('shift', $row->shift),
				'id_mesin' => set_value('id_mesin', $row->id_mesin),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				// 'bentuk' => $bentuk,
				'id_warna' => $warna,
				// 'id_warna' => set_value('id_warna', $row->id_warna),
				// 'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'ukuran' => $ukuran,
				'id_grade' => $grade,
				'id_gsm' => set_value('id_gsm', $row->id_gsm),
				'lebar' => set_value('lebar', $row->lebar),
				// 'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'lembar' => $lembar,
				'satuan_pack' => set_value('satuan_pack', $row->satuan_pack),
				'qty_roll' => set_value('qty_roll', $row->qty_roll),
				'berat' => set_value('berat', $row->berat),
				// 'speed_mesin' => $speed_mesin,
				'id_speed' => set_value('id_speed', $row->id_speed),
				'no_stamp' => set_value('no_stamp', $row->no_stamp),
				'target_jam' => set_value('target_jam', $row->target_jam),
				'jam_proses' => set_value('jam_proses', $row->jam_proses),
				'hasil_pack' => set_value('hasil_pack', $row->hasil_pack),
				'hasil_kg' => set_value('hasil_kg', $row->hasil_kg),
				'nonpassed_kode' => $non_passed,
				// 'nonpassed_kode' => set_value('nonpassed_kode', $row->nonpassed_kode),
				'nonpassed_pack' => set_value('nonpassed_pack', $row->nonpassed_pack),
				'nonpassed_kg' => set_value('nonpassed_kg', $row->nonpassed_kg),
				'broke_setting' => set_value('broke_setting', $row->broke_setting),
				'broke_trim' => set_value('broke_trim', $row->broke_trim),
				'menit_proses' => set_value('menit_proses', $row->menit_proses),
				'broke_serpihan' => set_value('broke_serpihan', $row->broke_serpihan),
				'broke_motif' => set_value('broke_motif', $row->broke_motif),
				'sisa_roll' => set_value('sisa_roll', $row->sisa_roll),
				'ket' => set_value('ket', $row->ket),
				'id_downtime' => $downtime,
				// 'id_downtime' => set_value('id_downtime', $row->id_downtime),
				'waktu_downtime' => set_value('waktu_downtime', $row->waktu_downtime),
				'downtime2' => set_value('downtime2', $row->downtime2),
				'waktu_downtime2' => set_value('waktu_downtime2', $row->waktu_downtime2),
				'downtime3' => set_value('downtime3', $row->downtime3),
				'waktu_downtime3' => set_value('waktu_downtime3', $row->waktu_downtime3),
				'downtime4' => set_value('downtime4', $row->downtime4),
				'waktu_downtime4' => set_value('waktu_downtime4', $row->waktu_downtime4),
				'id_jam' => set_value('id_jam', $row->id_jam),
				'jam_akhir' => set_value('jam_akhir', $row->jam_akhir),
				'wip' => set_value('wip', $row->wip),
				'ket1' => set_value('ket1', $row->ket1),
				'ket2' => set_value('ket2', $row->ket2),
				'ket3' => set_value('ket3', $row->ket3),
				'ket4' => set_value('ket4', $row->ket4),

				'downtime5' => set_value('downtime5'),
				'ket5' => set_value('ket5'),

				'waktu_downtime5' => set_value('waktu_downtime5'),

				'downtime6' => set_value('downtime6'),
				'ket6' => set_value('ket6'),

				'waktu_downtime6' => set_value('waktu_downtime6'),

				'downtime7' => set_value('downtime7'),
				'ket7' => set_value('ket7'),

				'waktu_downtime7' => set_value('waktu_downtime7'),

				'downtime8' => set_value('downtime8'),
				'ket8' => set_value('ket8'),

				'waktu_downtime8' => set_value('waktu_downtime8'),

				'panjang_pot' => set_value('panjang_pot', $row->panjang_pot),
				'jml_gambar' => set_value('jml_gambar', $row->jml_gambar),
				'kebutuhan_bahan' => set_value('kebutuhan_bahan', $row->kebutuhan_bahan),
				'kg_perpack' => set_value('kg_perpack', $row->kg_perpack),
				'jml_operator' => set_value('jml_operator', $row->jml_operator),
				'persentase' => set_value('persentase', $row->persentase),
			);
			$this->template->load('template', 'operatormesin/operator_mesin_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('operatormesin'));
		}
	}

	public function update($id)
	{
		$row = $this->Operator_mesin_model->get_by_id($id);

		$warna = $this->warna_model->get_all();
		$grade = $this->grade_model->get_all();
		$lembar = $this->lembar_pack_model->get_all();
		$bentuk = $this->bentuk_model->get_all();
		$ukuran = $this->ukuran_model->get_all();
		$speed_mesin = $this->speed_mesin_model->get_all();
		$non_passed = $this->non_passed_model->get_all();
		$downtime = $this->downtime_model->get_all();


		if ($row) {
			$data = array(
				'button' => 'Update',
				'row' => $row,
				'action' => site_url('operatormesin/update_action'),
				'id_operator_mesin' => set_value('id_operator_mesin', $row->id_operator_mesin),
				'id_user' => set_value('id_user', $row->id_user),
				'no_form' => set_value('no_form', $row->no_form),
				'operator2' => set_value('operator2', $row->operator2),
				'operator3' => set_value('operator3', $row->operator3),
				'operator4' => set_value('operator4', $row->operator4),
				'shift' => set_value('shift', $row->shift),
				'id_mesin' => set_value('id_mesin', $row->id_mesin),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				// 'bentuk' => $bentuk,
				'id_warna' => $warna,
				// 'id_warna' => set_value('id_warna', $row->id_warna),
				// 'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'ukuran' => $ukuran,
				// 'id_grade' => set_value('id_grade', $row->id_grade),
				'id_grade' => $grade,
				'id_gsm' => set_value('id_gsm', $row->id_gsm),
				'lebar' => set_value('lebar', $row->lebar),
				'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'lembar' => $lembar,
				'satuan_pack' => set_value('satuan_pack', $row->satuan_pack),
				'qty_roll' => set_value('qty_roll', $row->qty_roll),
				'berat' => set_value('berat', $row->berat),
				// 'speed_mesin' => $speed_mesin,
				'id_speed' => set_value('id_speed', $row->id_speed),
				'no_stamp' => set_value('no_stamp', $row->no_stamp),
				'target_jam' => set_value('target_jam', $row->target_jam),
				'jam_proses' => set_value('jam_proses', $row->jam_proses),
				'hasil_pack' => set_value('hasil_pack', $row->hasil_pack),
				'hasil_kg' => set_value('hasil_kg', $row->hasil_kg),
				'nonpassed_kode' => $non_passed,
				// 'nonpassed_kode' => set_value('nonpassed_kode', $row->nonpassed_kode),
				'nonpassed_pack' => set_value('nonpassed_pack', $row->nonpassed_pack),
				'nonpassed_kg' => set_value('nonpassed_kg', $row->nonpassed_kg),
				'broke_setting' => set_value('broke_setting', $row->broke_setting),
				'broke_trim' => set_value('broke_trim', $row->broke_trim),
				'menit_proses' => set_value('menit_proses', $row->menit_proses),
				'broke_serpihan' => set_value('broke_serpihan', $row->broke_serpihan),
				'broke_motif' => set_value('broke_motif', $row->broke_motif),
				'sisa_roll' => set_value('sisa_roll', $row->sisa_roll),
				'ket' => set_value('ket', $row->ket),
				'id_downtime' => $downtime,
				// 'alasan1' => set_value('alasan1', $row->alasan1),

				// 'id_downtime' => set_value('id_downtime', $row->id_downtime),
				'waktu_downtime' => set_value('waktu_downtime', $row->waktu_downtime),
				'downtime2' => $downtime,
				// 'alasan2' => set_value('alasan2', $row->alasan2),
				// 'downtime2' => set_value('downtime2', $row->downtime2),
				'waktu_downtime2' => set_value('waktu_downtime2', $row->waktu_downtime2),
				'downtime3' => $downtime,
				// 'alasan3' => set_value('alasan3', $row->alasan3),
				// 'downtime3' => set_value('downtime3', $row->downtime3),
				'waktu_downtime3' => set_value('waktu_downtime3', $row->waktu_downtime3),
				'downtime4' => $downtime,
				// 'alasan4' => set_value('alasan4', $row->alasan4),

				// 'downtime4' => set_value('downtime4', $row->downtime4),
				'waktu_downtime4' => set_value('waktu_downtime4', $row->waktu_downtime4),


				'downtime5' => $downtime,
				'waktu_downtime5' => set_value('waktu_downtime5', $row->waktu_downtime5),
				'downtime6' => $downtime,
				'waktu_downtime6' => set_value('waktu_downtime6', $row->waktu_downtime6),
				'downtime7' => $downtime,
				'waktu_downtime7' => set_value('waktu_downtime7', $row->waktu_downtime7),
				'downtime7' => $downtime,
				'waktu_downtime7' => set_value('waktu_downtime7', $row->waktu_downtime7),
				'downtime8' => $downtime,
				'waktu_downtime8' => set_value('waktu_downtime8', $row->waktu_downtime8),

				'ket1' => set_value('ket1', $row->ket1),
				'ket2' => set_value('ket2', $row->ket2),
				'ket3' => set_value('ket3', $row->ket3),
				'ket4' => set_value('ket4', $row->ket4),
				'ket5' => set_value('ket5', $row->ket5),
				'ket6' => set_value('ket6', $row->ket6),
				'ket7' => set_value('ket7', $row->ket7),
				'ket8' => set_value('ket8', $row->ket8),

				'id_jam' => set_value('id_jam', $row->id_jam),
				'jam_akhir' => set_value('jam_akhir', $row->jam_akhir),
				'panjang_pot' => set_value('panjang_pot', $row->panjang_pot),
				'jml_gambar' => set_value('jml_gambar', $row->jml_gambar),
				'kebutuhan_bahan' => set_value('kebutuhan_bahan', $row->kebutuhan_bahan),
				'kg_perpack' => set_value('kg_perpack', $row->kg_perpack),
				'jml_operator' => set_value('jml_operator', $row->jml_operator),
				'wip' => set_value('wip', $row->wip),
				'persentase' => set_value('persentase', $row->persentase),
			);
			$this->template->load('template', 'operatormesin/operator_mesin_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('operatormesin'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);
		// $namaBentuk = $this->input->post('id_bentuk', TRUE);
		// $id_bentuk = getFieldValue('bentuk', 'id_bentuk', 'bentuk', $namaBentuk);
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_operator_mesin', TRUE));
		} else {
			$data = array(
				'id_user' => $this->session->userdata('id_users'),
				'no_form' => $this->input->post('no_form'),
				'operator2' => $this->input->post('operator2', TRUE),
				'operator3' => $this->input->post('operator3', TRUE),
				'operator4' => $this->input->post('operator4', TRUE),
				'shift' => $this->input->post('shift', TRUE),
				'id_mesin' => $this->input->post('id_mesin', TRUE),
				'id_customer' => $id_customer,
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_pattern' => $this->input->post('id_pattern', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_grade' => $this->input->post('id_grade', TRUE),
				'id_gsm' => $this->getGsm($this->input->post('id_gsm', TRUE)),
				'lebar' => $this->input->post('lebar', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_warna' => $this->input->post('id_warna', TRUE),
				'satuan_pack' => $this->input->post('satuan_pack', TRUE),
				'qty_roll' => $this->input->post('qty_roll', TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'id_speed' => $this->input->post('id_speed', TRUE),
				'no_stamp' => $this->input->post('no_stamp', TRUE),
				'target_jam' => $this->input->post('target_jam', TRUE),
				'jam_proses' => $this->input->post('jam_proses', TRUE),
				'hasil_pack' => $this->input->post('hasil_pack', TRUE),
				'hasil_kg' => $this->input->post('hasil_kg', TRUE),
				'nonpassed_kode' => $this->input->post('nonpassed_kode', TRUE),
				'nonpassed_pack' => $this->input->post('nonpassed_pack', TRUE),
				'nonpassed_kg' => $this->input->post('nonpassed_kg', TRUE),
				'broke_setting' => $this->input->post('broke_setting', TRUE),
				'broke_trim' => $this->input->post('broke_trim', TRUE),
				'menit_proses' => $this->input->post('menit_proses', TRUE),
				'broke_serpihan' => $this->input->post('broke_serpihan', TRUE),
				'broke_motif' => $this->input->post('broke_motif', TRUE),
				'sisa_roll' => $this->input->post('sisa_roll', TRUE),
				'ket' => $this->input->post('ket', TRUE),
				'id_downtime' => $this->input->post('id_downtime', TRUE),
				// 'alasan1' => $this->input->post('alasan1', TRUE),
				'waktu_downtime' => $this->input->post('waktu_downtime', TRUE),
				'downtime2' => $this->input->post('downtime2', TRUE),
				// 'alasan2' => $this->input->post('alasan2', TRUE),
				'waktu_downtime2' => $this->input->post('waktu_downtime2', TRUE),
				'downtime3' => $this->input->post('downtime3', TRUE),
				// 'alasan3' => $this->input->post('alasan3', TRUE),
				'waktu_downtime3' => $this->input->post('waktu_downtime3', TRUE),
				'downtime4' => $this->input->post('downtime4', TRUE),
				// 'alasan4' => $this->input->post('alasan4', TRUE),
				'waktu_downtime4' => $this->input->post('waktu_downtime4', TRUE),

				'downtime5' => $this->input->post('downtime5', TRUE),
				'waktu_downtime5' => $this->input->post('waktu_downtime5', TRUE),
				'downtime6' => $this->input->post('downtime6', TRUE),
				'waktu_downtime6' => $this->input->post('waktu_downtime6', TRUE),
				'downtime7' => $this->input->post('downtime7', TRUE),
				'waktu_downtime7' => $this->input->post('waktu_downtime7', TRUE),
				'downtime8' => $this->input->post('downtime8', TRUE),
				'waktu_downtime8' => $this->input->post('waktu_downtime8', TRUE),
				'ket1' => $this->input->post('ket1', TRUE),
				'ket2' => $this->input->post('ket2', TRUE),
				'ket3' => $this->input->post('ket3', TRUE),
				'ket4' => $this->input->post('ket4', TRUE),
				'ket5' => $this->input->post('ket5', TRUE),
				'ket6' => $this->input->post('ket6', TRUE),
				'ket7' => $this->input->post('ket7', TRUE),
				'ket8' => $this->input->post('ket8', TRUE),
				'id_jam' => $this->input->post('id_jam', TRUE),
				'jam_akhir' => $this->input->post('jam_akhir', TRUE),
				'panjang_pot' => $this->input->post('panjang_pot', TRUE),
				'jml_gambar' => $this->input->post('jml_gambar', TRUE),
				'kebutuhan_bahan' => $this->input->post('kebutuhan_bahan', TRUE),
				'kg_perpack' => $this->input->post('kg_perpack', TRUE),
				'jml_operator' => $this->input->post('jml_operator', TRUE),
				'wip' => $this->input->post('wip', TRUE),
				'persentase' => $this->input->post('persentase', TRUE),
				'updated'       => date('Y-m-d h:i:s'),

			);

			// var_dump($data);
			// die;

			$this->Operator_mesin_model->update($this->input->post('id_operator_mesin', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('operatormesin'));
		}
	}

	public function delete($id)
	{
		$row = $this->Operator_mesin_model->get_by_id($id);

		if ($row) {
			$this->Operator_mesin_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('operatormesin'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('operatormesin'));
		}
	}


	public function autofill()
	{
		$lembar = $_POST['id_lembar'];
		$grade = $_POST['id_grade'];
		$ukuran = $_POST['id_ukuran'];
		$warna = $_POST['id_warna'];


		$query_lembar    = $this->db->query("select tbl_target_mesin.*, speed_mesin, bentuk, nama_pattern, gsm from tbl_target_mesin
		INNER JOIN speed_mesin  ON tbl_target_mesin.id_speed_mesin = speed_mesin.id_speed_mesin		
		INNER JOIN bentuk ON tbl_target_mesin.id_bentuk = bentuk.id_bentuk		
		INNER JOIN pattern ON tbl_target_mesin.id_pattern = pattern.id_pattern	
		INNER JOIN gsm ON tbl_target_mesin.id_gsm = gsm.id_gsm		
	
		where id_lembar='$lembar' and id_ukuran='$ukuran' and id_grade='$grade' and id_warna='$warna'")->row_array();;
		// $id_gsm   	     = $query_targetmesin['id_gsm'];
		// $id_speed_mesin  = $query_targetmesin['id_speed_mesin'];
		// $id_bentuk  	 = $query_targetmesin['id_bentuk'];
		// $id_pattern  	 = $query_targetmesin['id_pattern'];
		// $id_warna  	 	 = $query_targetmesin['id_warna'];

		// $sql_warna 	  	 = $this->db->get_where('warna', array('id_warna' => $id_warna))->row_array();
		// $sql_gsm 	  	 = $this->db->get_where('gsm', array('id_gsm' => $id_gsm))->row_array();
		// $sql_speed 	  	 = $this->db->get_where('speed_mesin', array('id_speed_mesin' => $id_speed_mesin))->row_array();
		// $sql_bentuk 	 = $this->db->get_where('bentuk', array('id_bentuk' => $id_bentuk))->row_array();
		// $sql_pattern 	 = $this->db->get_where('pattern', array('id_pattern' => $id_pattern))->row_array();


		if ($query_lembar != NULL) {
			$data = array(
				"satuan_pack" 		=> $query_lembar['targetMesin'],
				"satuan_pack" 		=> $query_lembar['targetMesin'],
				"gsm"      	  		=> $query_lembar['gsm'],
				"speed_mesin" 		=> $query_lembar['speed_mesin'],
				"lebar_roll"  		=> $query_lembar['lebar_roll'],
				"panjang_pot" 		=> $query_lembar['panjang_pot'],
				"jml_gambar"  		=> $query_lembar['jml_gambar'],
				"kebutuhan_bahan"   => $query_lembar['kebutuhan_bahan'],
				"kg_perpack"  		=> $query_lembar['kg_perpack'],
				"jml_operator"  	=> $query_lembar['jml_orang'],
				"bentuk" 	  		=> $query_lembar['bentuk'],
				"pattern" 	  		=> $query_lembar['nama_pattern'],
				// "warna" 	  		=> $query_lembar['warna'],

			);
		} else {
			$data = array(
				"satuan_pack"    => '',
				"gsm"      	     => '',
				"speed_mesin" 	 => '',
				"lebar_roll"     => '',

			);
		}

		echo json_encode($data);
	}

	// AUTO FIL UNTUK MENAMPILKAN KETERANGAN SAAT KODE DOWNTIME DIPILIH
	public function autofill_downtime()
	{
		$id_downtime = $_POST['id_downtime'];
		$query_downtime = $this->db->query("select * from downtime where id_downtime='$id_downtime'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket1"      => $query_downtime['keterangan'],
				"ket2"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket1"      => '',
			);
		}

		echo json_encode($data);
	}
	// AUTO FIL UNTUK MENAMPILKAN KETERANGAN SAAT KODE DOWNTIME DIPILIH

	public function autofill_downtime2()
	{
		$downtime2 = $_POST['downtime2'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime2'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket2"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket2"      => '',
			);
		}

		echo json_encode($data);
	}
	// AUTO FIL UNTUK MENAMPILKAN KETERANGAN SAAT KODE DOWNTIME DIPILIH

	public function autofill_downtime3()
	{
		$downtime3 = $_POST['downtime3'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime3'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket3"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket3"      => '',
			);
		}

		echo json_encode($data);
	}
	// AUTO FIL UNTUK MENAMPILKAN KETERANGAN SAAT KODE DOWNTIME DIPILIH

	public function autofill_downtime4()
	{
		$downtime4 = $_POST['downtime4'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime4'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket4"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket4"      => '',
			);
		}

		echo json_encode($data);
	}

	##########################################

	public function autofill_downtime5()
	{
		$downtime5 = $_POST['downtime5'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime5'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket5"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket5"      => '',
			);
		}

		echo json_encode($data);
	}

	public function autofill_downtime6()
	{
		$downtime6 = $_POST['downtime6'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime6'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket6"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket6"      => '',
			);
		}

		echo json_encode($data);
	}

	public function autofill_downtime7()
	{
		$downtime7 = $_POST['downtime7'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime7'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket7"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket7"      => '',
			);
		}

		echo json_encode($data);
	}


	public function autofill_downtime8()
	{
		$downtime8 = $_POST['downtime8'];
		$query_downtime = $this->db->query("select * from downtime where kode='$downtime8'")->row_array();

		if ($query_downtime != '') {
			$data = array(
				"ket8"      => $query_downtime['keterangan'],
			);
		} else {
			$data = array(
				"ket8"      => '',
			);
		}

		echo json_encode($data);
	}


	public function _rules()
	{
		$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
		$this->form_validation->set_rules('operator2', 'operator2', 'trim|required');
		$this->form_validation->set_rules('operator3', 'operator3', 'trim|required');
		$this->form_validation->set_rules('operator4', 'operator4', 'trim');
		$this->form_validation->set_rules('shift', 'shift', 'trim|required');
		$this->form_validation->set_rules('id_mesin', 'id mesin', 'trim|required');
		$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');
		$this->form_validation->set_rules('no_wo', 'no wo', 'trim|required');
		$this->form_validation->set_rules('id_pattern', 'id pattern', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
		$this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
		$this->form_validation->set_rules('id_warna', 'id warna', 'trim|required');
		$this->form_validation->set_rules('id_grade', 'id grade', 'trim|required');
		$this->form_validation->set_rules('id_gsm', 'id gsm', 'trim|required');
		$this->form_validation->set_rules('lebar', 'lebar', 'trim|required');
		$this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
		$this->form_validation->set_rules('satuan_pack', 'satuan pack', 'trim|required');
		$this->form_validation->set_rules('qty_roll', 'qty roll', 'trim|required');
		$this->form_validation->set_rules('berat', 'berat', 'trim|required');
		$this->form_validation->set_rules('id_speed', 'id speed', 'trim|required');
		$this->form_validation->set_rules('no_stamp', 'no stamp', 'trim|required');
		$this->form_validation->set_rules('target_jam', 'target jam', 'trim');
		$this->form_validation->set_rules('jam_proses', 'jam proses', 'trim|required');
		$this->form_validation->set_rules('hasil_pack', 'hasil pack', 'trim|required');
		$this->form_validation->set_rules('hasil_kg', 'hasil kg', 'trim|required');
		$this->form_validation->set_rules('broke_setting', 'broke setting', 'trim|required');
		$this->form_validation->set_rules('broke_trim', 'broke trim', 'trim|required');
		$this->form_validation->set_rules('menit_proses', 'menit proses', 'trim|required');
		$this->form_validation->set_rules('broke_serpihan', 'broke serpihan', 'trim|required');
		$this->form_validation->set_rules('broke_motif', 'broke motif', 'trim|required');
		$this->form_validation->set_rules('sisa_roll', 'sisa roll', 'trim|required');
		$this->form_validation->set_rules('ket', 'ket', 'trim|required');
		$this->form_validation->set_rules('id_downtime', 'id downtime', 'trim|required');
		// $this->form_validation->set_rules('waktu_downtime2', 'waktu downtime', 'trim|required');
		// $this->form_validation->set_rules('waktu_downtime3', 'waktu downtime', 'trim|required');
		// $this->form_validation->set_rules('waktu_downtime4', 'waktu downtime', 'trim|required');
		$this->form_validation->set_rules('waktu_downtime', 'waktu downtime', 'trim|required');
		$this->form_validation->set_rules('id_jam', 'id jam', 'trim|required');
		$this->form_validation->set_rules('jam_akhir', 'jam akhir', 'trim|required');
		$this->form_validation->set_rules('persentase', 'persentase', 'trim');

		$this->form_validation->set_rules('id_operator_mesin', 'id_operator_mesin', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "operator_mesin.xls";
		$judul = "operator_mesin";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
		xlsWriteLabel($tablehead, $kolomhead++, "Shift");
		xlsWriteLabel($tablehead, $kolomhead++, "No Mesin");

		xlsWriteLabel($tablehead, $kolomhead++, "Operator1");
		xlsWriteLabel($tablehead, $kolomhead++, "Operator2");
		xlsWriteLabel($tablehead, $kolomhead++, "Operator3");
		xlsWriteLabel($tablehead, $kolomhead++, "Operator4");
		xlsWriteLabel($tablehead, $kolomhead++, "No Wo");
		xlsWriteLabel($tablehead, $kolomhead++, "Customer");
		xlsWriteLabel($tablehead, $kolomhead++, "Bentuk");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");
		xlsWriteLabel($tablehead, $kolomhead++, "Pattern");
		xlsWriteLabel($tablehead, $kolomhead++, "Lembar");
		xlsWriteLabel($tablehead, $kolomhead++, "Grade");
		xlsWriteLabel($tablehead, $kolomhead++, "Gsm");
		xlsWriteLabel($tablehead, $kolomhead++, "Warna");
		xlsWriteLabel($tablehead, $kolomhead++, "Lebar");
		xlsWriteLabel($tablehead, $kolomhead++, "Qty Roll");
		xlsWriteLabel($tablehead, $kolomhead++, "Berat");

		// xlsWriteLabel($tablehead, $kolomhead++, "Target Mesin");
		xlsWriteLabel($tablehead, $kolomhead++, "Speed");
		xlsWriteLabel($tablehead, $kolomhead++, "Target Jam");
		xlsWriteLabel($tablehead, $kolomhead++, "Jam Proses");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Pack");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Kg");
		xlsWriteLabel($tablehead, $kolomhead++, "Non Passe (Kode)");
		xlsWriteLabel($tablehead, $kolomhead++, "Non Passe (Pack)");
		xlsWriteLabel($tablehead, $kolomhead++, "Non Passe (Kg)");
		xlsWriteLabel($tablehead, $kolomhead++, "Broke Setting");
		xlsWriteLabel($tablehead, $kolomhead++, "Broke Trim");
		xlsWriteLabel($tablehead, $kolomhead++, "Broke Serpihan");
		xlsWriteLabel($tablehead, $kolomhead++, "Broke Motif");
		xlsWriteLabel($tablehead, $kolomhead++, "No Stamp");
		xlsWriteLabel($tablehead, $kolomhead++, "Jam Awal");
		xlsWriteLabel($tablehead, $kolomhead++, "Jam Akhir");
		xlsWriteLabel($tablehead, $kolomhead++, "Downtime");
		xlsWriteLabel($tablehead, $kolomhead++, "Waktu Downtime");
		xlsWriteLabel($tablehead, $kolomhead++, "WIP (Pack)");
		xlsWriteLabel($tablehead, $kolomhead++, "Sisa Roll");
		// xlsWriteLabel($tablehead, $kolomhead++, "Menit Proses");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
		xlsWriteLabel($tablehead, $kolomhead++, "Persentase");

		foreach ($this->Operator_mesin_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
			xlsWriteLabel($tablebody, $kolombody++, $data->shift);
			xlsWriteLabel($tablebody, $kolombody++, $data->kode_mesin);

			xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
			xlsWriteLabel($tablebody, $kolombody++, $data->operator2);
			xlsWriteLabel($tablebody, $kolombody++, $data->operator3);
			xlsWriteLabel($tablebody, $kolombody++, $data->operator4);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_wo);

			xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
			xlsWriteLabel($tablebody, $kolombody++, $data->bentuk);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_pattern);
			xlsWriteLabel($tablebody, $kolombody++, $data->lembar);
			xlsWriteLabel($tablebody, $kolombody++, $data->grade);
			xlsWriteLabel($tablebody, $kolombody++, $data->gsm);

			xlsWriteLabel($tablebody, $kolombody++, $data->warna);
			xlsWriteLabel($tablebody, $kolombody++, $data->lebar);
			xlsWriteLabel($tablebody, $kolombody++, $data->qty_roll);
			// xlsWriteLabel($tablebody, $kolombody++, $data->satuan_pack);
			xlsWriteLabel($tablebody, $kolombody++, $data->berat);
			xlsWriteLabel($tablebody, $kolombody++, $data->speed_mesin);
			xlsWriteLabel($tablebody, $kolombody++, $data->target_jam);
			xlsWriteLabel($tablebody, $kolombody++, $data->jam_proses);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_pack);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_kg);
			xlsWriteLabel($tablebody, $kolombody++, $data->nonpassed_kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->nonpassed_pack);
			xlsWriteLabel($tablebody, $kolombody++, $data->nonpassed_kg);
			xlsWriteLabel($tablebody, $kolombody++, $data->broke_setting);
			xlsWriteLabel($tablebody, $kolombody++, $data->broke_trim);
			xlsWriteLabel($tablebody, $kolombody++, $data->broke_serpihan);
			xlsWriteLabel($tablebody, $kolombody++, $data->broke_motif);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_stamp);
			xlsWriteLabel($tablebody, $kolombody++, $data->jam);
			xlsWriteLabel($tablebody, $kolombody++, $data->jam_akhir);
			xlsWriteLabel($tablebody, $kolombody++, $data->kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->waktu_downtime);
			xlsWriteLabel($tablebody, $kolombody++, $data->wip);
			xlsWriteLabel($tablebody, $kolombody++, $data->sisa_roll);
			// xlsWriteLabel($tablebody, $kolombody++, $data->menit_proses);
			xlsWriteLabel($tablebody, $kolombody++, $data->ket);
			xlsWriteLabel($tablebody, $kolombody++, $data->persentase);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}



	//CETAK LAPOARAN HARIAN MESIN  DOILIES

	function cetak()
	{
		$this->template->load('template', 'operatormesin/cetak');
	}

	//PROSES CETAK LAPORAN 
	function proses_cetak()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$no_wo = $this->input->post('no_wo');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['no_wo'] = $no_wo;
		$data['row'] = $this->laporan_model->get_all_operatormesin($dari, $sampai, $no_wo)->result();
		if (isset($_POST['export'])) {
			// Fungsi header dengan mengirimkan raw data excel
			header("Content-type: application/vnd-ms-excel");

			// Mendefinisikan nama file ekspor "hasil-export.xls"
			header("Content-Disposition: attachment; filename=Laporan Operator Mesin.xls");
		}
		$this->load->view('operatormesin/lap_operator_mesin', $data);
	}


	function tindakan_lain_lain_ajax()
	{
		$tindakan_lain_lain = $this->input->get('id_downtime');

		echo "<table class='table table-bordered'>";
		if ($tindakan_lain_lain == 10) {
			echo "
	            <tr>
	                <td><input type='text' name='alasan1' placeholder='Masukkan Alasan' required class='form-control'></td>
	            </tr>
	        ";
		}
		echo "</table>";
	}

	// function tindakan_lain_lain2_ajax()
	// {
	// 	$tindakan_lain_lain2 = $this->input->get('downtime2');

	// 	echo "<table class='table table-bordered'>";
	// 	if ($tindakan_lain_lain2 == 'J') {
	// 		echo "
	//             <tr>
	//                 <td><input type='text' name='alasan2' placeholder='Masukkan Alasan' class='form-control'></td>
	//             </tr>
	//         ";
	// 	}
	// 	echo "</table>";
	// }


	// function tindakan_lain_lain3_ajax()
	// {
	// 	$tindakan_lain_lain3 = $this->input->get('downtime3');


	// 	echo "<table class='table table-bordered'>";

	// 	if ($tindakan_lain_lain3 == 'J') {
	// 		echo "
	//             <tr>
	//                 <td><input type='text' name='alasan3' placeholder='Masukkan Alasan' value='' id='alasan3' class='form-control'></td>
	//             </tr>
	//         ";
	// 	}
	// 	echo "</table>";
	// }


	// function tindakan_lain_lain4_ajax()
	// {
	// 	$tindakan_lain_lain4 = $this->input->get('downtime4');


	// 	echo "<table class='table table-bordered'>";

	// 	if ($tindakan_lain_lain4 == 'J') {
	// 		echo "
	//             <tr>
	//                 <td><input type='text' name='alasan4' placeholder='Masukkan Alasan' value='' id='alasan4' class='form-control'></td>
	//             </tr>
	//         ";
	// 	}
	// 	echo "</table>";
	// }
}

/* End of file Operatormesin.php */
/* Location: ./application/controllers/Operatormesin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-21 11:38:52 */
/* http://harviacode.com */