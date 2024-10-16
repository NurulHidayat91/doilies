<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Transferfg extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Transfer_fg_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/transferfg/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/transferfg/index/';
			$config['first_url'] = base_url() . 'index.php/transferfg/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Transfer_fg_model->total_rows($q);
		$transferfg = $this->Transfer_fg_model->get_limit_data($config['per_page'], $start, $q);
		$transferfg_peruser = $this->Transfer_fg_model->get_limit_peruser($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'transferfg_data' => $transferfg,
			'transferfg_data_peruser' => $transferfg_peruser,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'transferfg/transfer_fg_list', $data);
	}

	public function read($id)
	{
		$row = $this->Transfer_fg_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_transfer_fg' => $row->id_transfer_fg,
				'no_wo' => $row->no_wo,
				'id_user' => $row->id_user,
				'tanggal' => $row->tanggal,
				'waktu' => $row->waktu,
				'shift' => $row->shift,
				'id_warna' => $row->id_warna,
				'id_bentuk' => $row->id_bentuk,
				'id_ukuran' => $row->id_ukuran,
				'id_lembar' => $row->id_lembar,
				'box_qty' => $row->box_qty,
				'box_kg' => $row->box_kg,
				'keterangan' => $row->keterangan,
				'id_customer' => $row->id_customer,
				'grade' => $row->grade,
				'gsm' => $row->gsm,
				'no_stock' => $row->no_stock,
				'kode_sistem' => $row->kode_sistem,
			);
			$this->template->load('template', 'transferfg/transfer_fg_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transferfg'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('transferfg/create_action'),
			'id_transfer_fg' => set_value('id_transfer_fg'),
			'no_wo' => set_value('no_wo'),
			'id_user' => set_value('id_user'),
			'tanggal' => set_value('tanggal'),
			'waktu' => set_value('waktu'),
			'shift' => set_value('shift'),
			'id_warna' => set_value('id_warna'),
			'id_bentuk' => set_value('id_bentuk'),
			'id_ukuran' => set_value('id_ukuran'),
			'id_lembar' => set_value('id_lembar'),
			'id_pattern' => set_value('id_pattern'),
			'box_qty' => set_value('box_qty'),
			'box_kg' => set_value('box_kg'),
			'box_pack' => set_value('box_pack'),
			'box_pcs' => set_value('box_pcs'),
			'keterangan' => set_value('keterangan'),
			'id_customer' => set_value('id_customer'),
			'id_grade' => set_value('grade'),
			'id_gsm' => set_value('gsm'),
			'no_stock' => set_value('no_stock'),
			'no_form' => set_value('no_form'),
			'kode_sistem' => set_value('kode_sistem'),
		);
		$this->template->load('template', 'transferfg/transfer_fg_form', $data);
	}

	//TAMBAH DATA MANUAL
	public function create_manual()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('transferfg/create_action_manual'),
			'id_transfer_fg' => set_value('id_transfer_fg'),
			'no_wo' => set_value('no_wo'),
			'id_user' => set_value('id_user'),
			'tanggal' => set_value('tanggal'),
			'waktu' => set_value('waktu'),
			'shift' => set_value('shift'),
			'id_warna' => set_value('id_warna'),
			'id_bentuk' => set_value('id_bentuk'),
			'id_ukuran' => set_value('id_ukuran'),
			'id_lembar' => set_value('id_lembar'),
			'id_pattern' => set_value('id_pattern'),
			'box_qty' => set_value('box_qty'),
			'box_kg' => set_value('box_kg'),
			'box_pack' => set_value('box_pack'),
			'box_pcs' => set_value('box_pcs'),
			'keterangan' => set_value('keterangan'),
			'id_customer' => set_value('id_customer'),
			'id_grade' => set_value('grade'),
			'id_gsm' => set_value('gsm'),
			'no_stock' => set_value('no_stock'),
			'no_form' => set_value('no_form'),
			'kode_sistem' => set_value('kode_sistem'),
		);
		$this->template->load('template', 'transferfg/transfer_fg_form_manual', $data);
	}


	public function create_action()
	{
		$this->_rules();

		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);

		$ukuran = $this->db->get_where('ukuran', array(
			'ukuran' => $this->input->post('id_ukuran', TRUE),
		))->row_array();

		$bentuk = $this->db->get_where('bentuk', array(
			'bentuk' => $this->input->post('id_bentuk', TRUE),
		))->row_array();

		$warna = $this->db->get_where('warna', array(
			'warna' => $this->input->post('id_warna', TRUE),
		))->row_array();

		$lembar_pack = $this->db->get_where('lembar_pack', array(
			'lembar' => $this->input->post('id_lembar', TRUE),
		))->row_array();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_user' => $this->session->userdata('id_users'),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'waktu' => $this->input->post('waktu', TRUE),
				'shift' => $this->input->post('shift', TRUE),
				'id_warna'    => $warna['id_warna'],
				// 'id_warna' => $this->input->post('id_warna', TRUE),
				'id_bentuk'   => $bentuk['id_bentuk'],
				// 'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran'   => $ukuran['id_ukuran'],
				// 'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_lembar'   => $lembar_pack['id_lembar'],
				// 'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_pattern' => $this->input->post('id_pattern', TRUE),
				'box_qty' => $this->input->post('box_qty', TRUE),
				'box_pack' => $this->input->post('box_pack', TRUE),
				'box_pcs' => $this->input->post('box_pcs', TRUE),
				'box_kg' => $this->input->post('box_kg', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'id_customer' => $id_customer,
				'id_grade' => $this->input->post('grade', TRUE),
				'id_gsm' => $this->input->post('gsm', TRUE),
				'no_stock' => $this->input->post('no_stock', TRUE),
				'no_form' => $this->input->post('no_form', TRUE),
				'kode_sistem' => $this->input->post('kode_sistem', TRUE),
				'created'     => date('Y-m-d h:i:s'),

			);

			$this->Transfer_fg_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('transferfg'));
		}
	}

	//CREATE ACTION MANUAL
	public function create_action_manual()
	{
		$this->_rules();

		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);

		// $ukuran = $this->db->get_where('ukuran', array(
		// 	'ukuran' => $this->input->post('id_ukuran', TRUE),
		// ))->row_array();

		// $bentuk = $this->db->get_where('bentuk', array(
		// 	'bentuk' => $this->input->post('id_bentuk', TRUE),
		// ))->row_array();

		// $warna = $this->db->get_where('warna', array(
		// 	'warna' => $this->input->post('id_warna', TRUE),
		// ))->row_array();

		// $lembar_pack = $this->db->get_where('lembar_pack', array(
		// 	'lembar' => $this->input->post('id_lembar', TRUE),
		// ))->row_array();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_user' => $this->session->userdata('id_users'),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'waktu' => $this->input->post('waktu', TRUE),
				'shift' => $this->input->post('shift', TRUE),
				// 'id_warna'    => $warna['id_warna'],
				'id_warna' => $this->input->post('id_warna', TRUE),
				// 'id_bentuk'   => $bentuk['id_bentuk'],
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				// 'id_ukuran'   => $ukuran['id_ukuran'],
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				// 'id_lembar'   => $lembar_pack['id_lembar'],
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_pattern' => $this->input->post('id_pattern', TRUE),
				'box_qty' => $this->input->post('box_qty', TRUE),
				'box_pack' => $this->input->post('box_pack', TRUE),
				'box_pcs' => $this->input->post('box_pcs', TRUE),
				'box_kg' => $this->input->post('box_kg', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'id_customer' => $id_customer,
				'id_grade' => $this->input->post('grade', TRUE),
				'id_gsm' => $this->input->post('gsm', TRUE),
				'no_stock' => $this->input->post('no_stock', TRUE),
				'no_form' => $this->input->post('no_form', TRUE),
				'kode_sistem' => $this->input->post('kode_sistem', TRUE),
				'created'     => date('Y-m-d h:i:s'),

			);


			$this->Transfer_fg_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('transferfg'));
		}
	}

	public function update($id)
	{
		$row = $this->Transfer_fg_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('transferfg/update_action'),
				'id_transfer_fg' => set_value('id_transfer_fg', $row->id_transfer_fg),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_user' => set_value('id_user', $row->id_user),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'waktu' => set_value('waktu', $row->waktu),
				'shift' => set_value('shift', $row->shift),
				'id_warna' => set_value('id_warna', $row->id_warna),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'box_qty' => set_value('box_qty', $row->box_qty),
				'box_pack' => set_value('box_pack', $row->box_pack),
				'box_pcs' => set_value('box_pcs', $row->box_pcs),
				'box_kg' => set_value('box_kg', $row->box_kg),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'id_grade' => set_value('grade', $row->id_grade),
				'id_gsm' => set_value('gsm', $row->id_gsm),
				'no_stock' => set_value('no_stock', $row->no_stock),
				'no_form' => set_value('no_form', $row->no_form),
				'kode_sistem' => set_value('kode_sistem', $row->kode_sistem),
			);
			$this->template->load('template', 'transferfg/transfer_fg_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transferfg'));
		}
	}

	public function update_action()
	{
		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_transfer_fg', TRUE));
		} else {
			$data = array(
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_user' => $this->session->userdata('id_users'),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'waktu' => $this->input->post('waktu', TRUE),
				'shift' => $this->input->post('shift', TRUE),
				'id_warna' => $this->input->post('id_warna', TRUE),
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_pattern' => $this->input->post('id_pattern', TRUE),
				'box_qty' => $this->input->post('box_qty', TRUE),
				'box_pack' => $this->input->post('box_pack', TRUE),
				'box_pcs' => $this->input->post('box_pcs', TRUE),
				'box_kg' => $this->input->post('box_kg', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'id_customer' => $id_customer,
				'id_grade' => $this->input->post('grade', TRUE),
				'id_gsm' => $this->input->post('gsm', TRUE),
				'no_stock' => $this->input->post('no_stock', TRUE),
				'no_form' => $this->input->post('no_form', TRUE),
				'kode_sistem' => $this->input->post('kode_sistem', TRUE),
				'updated'     => date('Y-m-d h:i:s'),

			);

			$this->Transfer_fg_model->update($this->input->post('id_transfer_fg', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('transferfg'));
		}
	}

	public function replay($id)
	{
		$row = $this->Transfer_fg_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Simpan',
				'action' => site_url('transferfg/create_action'),
				'id_transfer_fg' => set_value('id_transfer_fg', $row->id_transfer_fg),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_user' => set_value('id_user', $row->id_user),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'waktu' => set_value('waktu', $row->waktu),
				'shift' => set_value('shift', $row->shift),
				'id_warna' => set_value('id_warna', $row->warna),
				'id_bentuk' => set_value('id_bentuk', $row->bentuk),
				'id_ukuran' => set_value('id_ukuran', $row->ukuran),
				'id_lembar' => set_value('id_lembar', $row->lembar),
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'box_qty' => set_value('box_qty', $row->box_qty),
				'box_pack' => set_value('box_pack', $row->box_pack),
				'box_pcs' => set_value('box_pcs', $row->box_pcs),
				'box_kg' => set_value('box_kg', $row->box_kg),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'id_grade' => set_value('grade', $row->id_grade),
				'id_gsm' => set_value('gsm', $row->id_gsm),
				'no_stock' => set_value('no_stock', $row->no_stock),
				'no_form' => set_value('no_form', $row->no_form),
				'kode_sistem' => set_value('kode_sistem', $row->kode_sistem),
			);
			$this->template->load('template', 'transferfg/transfer_fg_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transferfg'));
		}
	}


	public function replay_manual($id)
	{
		$row = $this->Transfer_fg_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Repeat',
				'action' => site_url('transferfg/create_action_manual'),
				'id_transfer_fg' => set_value('id_transfer_fg', $row->id_transfer_fg),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_user' => set_value('id_user', $row->id_user),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'waktu' => set_value('waktu', $row->waktu),
				'shift' => set_value('shift', $row->shift),
				'id_warna' => set_value('id_warna', $row->warna),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'box_qty' => set_value('box_qty', $row->box_qty),
				'box_pack' => set_value('box_pack', $row->box_pack),
				'box_pcs' => set_value('box_pcs', $row->box_pcs),
				'box_kg' => set_value('box_kg', $row->box_kg),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'id_grade' => set_value('grade', $row->id_grade),
				'id_gsm' => set_value('gsm', $row->id_gsm),
				'no_stock' => set_value('no_stock', $row->no_stock),
				'no_form' => set_value('no_form', $row->no_form),
				'kode_sistem' => set_value('kode_sistem', $row->kode_sistem),
			);
			$this->template->load('template', 'transferfg/transfer_fg_form_manual', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transferfg'));
		}
	}

	public function delete($id)
	{
		$row = $this->Transfer_fg_model->get_by_id($id);

		if ($row) {
			$this->Transfer_fg_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('transferfg'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transferfg'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_wo', 'no wo', 'trim|required');
		$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
		$this->form_validation->set_rules('shift', 'shift', 'trim|required');
		$this->form_validation->set_rules('id_warna', 'id warna', 'trim|required');
		$this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
		$this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
		$this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
		$this->form_validation->set_rules('box_qty', 'box qty', 'trim|required');
		$this->form_validation->set_rules('box_pack', 'box pack', 'trim|required');
		$this->form_validation->set_rules('box_pcs', 'box pcs', 'trim|required');
		$this->form_validation->set_rules('box_kg', 'box kg', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');
		$this->form_validation->set_rules('grade', 'grade', 'trim|required');
		$this->form_validation->set_rules('gsm', 'gsm', 'trim|required');
		$this->form_validation->set_rules('no_stock', 'no stock', 'trim|required');
		$this->form_validation->set_rules('kode_sistem', 'kode sistem', 'trim|required');

		$this->form_validation->set_rules('id_transfer_fg', 'id_transfer_fg', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "transfer_fg.xls";
		$judul = "transfer_fg";
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
		xlsWriteLabel($tablehead, $kolomhead++, "No Wo");
		xlsWriteLabel($tablehead, $kolomhead++, "Kayawan");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
		xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
		xlsWriteLabel($tablehead, $kolomhead++, "Shift");
		xlsWriteLabel($tablehead, $kolomhead++, "Warna");
		xlsWriteLabel($tablehead, $kolomhead++, "Bentuk");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");
		xlsWriteLabel($tablehead, $kolomhead++, "Lembar");
		xlsWriteLabel($tablehead, $kolomhead++, "patterm");
		xlsWriteLabel($tablehead, $kolomhead++, "Box Qty");
		xlsWriteLabel($tablehead, $kolomhead++, "Box Pack");
		xlsWriteLabel($tablehead, $kolomhead++, "Box Pcs");
		xlsWriteLabel($tablehead, $kolomhead++, "Box Kg");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
		xlsWriteLabel($tablehead, $kolomhead++, "Customer");
		xlsWriteLabel($tablehead, $kolomhead++, "Grade");
		xlsWriteLabel($tablehead, $kolomhead++, "Gsm");
		xlsWriteLabel($tablehead, $kolomhead++, "No Stock");
		xlsWriteLabel($tablehead, $kolomhead++, "Kode Sistem");

		foreach ($this->Transfer_fg_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_wo);
			xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
			xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
			xlsWriteLabel($tablebody, $kolombody++, $data->shift);
			xlsWriteLabel($tablebody, $kolombody++, $data->warna);
			xlsWriteLabel($tablebody, $kolombody++, $data->bentuk);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);
			xlsWriteLabel($tablebody, $kolombody++, $data->lembar);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_pattern);
			xlsWriteLabel($tablebody, $kolombody++, $data->box_qty);
			xlsWriteLabel($tablebody, $kolombody++, $data->box_pack);
			xlsWriteLabel($tablebody, $kolombody++, $data->box_pcs);
			xlsWriteLabel($tablebody, $kolombody++, $data->box_kg);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
			xlsWriteLabel($tablebody, $kolombody++, $data->grade);
			xlsWriteLabel($tablebody, $kolombody++, $data->gsm);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_stock);
			xlsWriteLabel($tablebody, $kolombody++, $data->kode_sistem);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}


	function autofill()
	{
		$no_wo = $_GET['no_wo'];
		$operator = $this->db->query(
			"select *
            from
            (
                select operator_mesin.no_wo, customer.nama_customer, warna.warna, bentuk.bentuk, ukuran.ukuran, lembar_pack.lembar
                from operator_mesin
                join customer ON operator_mesin.id_customer = customer.id_customer
                join warna ON operator_mesin.id_warna = warna.id_warna
                join bentuk ON operator_mesin.id_bentuk = bentuk.id_bentuk
                join ukuran ON operator_mesin.id_ukuran = ukuran.id_ukuran
                join lembar_pack ON operator_mesin.id_lembar = lembar_pack.id_lembar
    
                union all
                select tbl_repack.no_wo, customer.nama_customer, warna.warna, bentuk.bentuk, ukuran.ukuran, lembar_pack.lembar
                from tbl_repack
                join customer ON tbl_repack.id_customer = customer.id_customer
                join warna ON tbl_repack.id_warna = warna.id_warna
                join bentuk ON tbl_repack.id_bentuk = bentuk.id_bentuk
                join ukuran ON tbl_repack.id_ukuran = ukuran.id_ukuran
                join lembar_pack ON tbl_repack.id_lembar = lembar_pack.id_lembar
            ) H
            
            WHERE H.no_wo = '$no_wo'"
		)->row_array();
		$data = array(
			// 'shift'        =>  $operator['shift'],
			'id_customer'  =>  $operator['nama_customer'],
			'id_warna'     =>  $operator['warna'],
			'id_bentuk'    =>  $operator['bentuk'],
			'id_lembar'    =>  $operator['lembar'],
			'id_ukuran'    =>  $operator['ukuran'],
			// 'hasil'       =>  $operator['hasil'],
		);
		echo json_encode($data);
	}
}

/* End of file Transferfg.php */
/* Location: ./application/controllers/Transferfg.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-21 08:35:06 */
/* http://harviacode.com */