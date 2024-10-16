<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Reapack extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('Reapack_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/reapack/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/reapack/index/';
			$config['first_url'] = base_url() . 'index.php/reapack/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Reapack_model->total_rows($q);
		$reapack = $this->Reapack_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'reapack_data' => $reapack,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'reapack/tbl_repack_list', $data);
	}

	public function read($id)
	{
		$row = $this->Reapack_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_repack' => $row->id_repack,
				'tanggal_terima' => $row->tanggal_terima,
				'subjek_email' => $row->subjek_email,
				'no_wo' => $row->no_wo,
				'id_user' => $row->id_user,
				'id_customer' => $row->id_customer,
				'kode_item' => $row->kode_item,
				'id_bentuk' => $row->id_bentuk,
				'id_ukuran' => $row->id_ukuran,
				'id_lembar' => $row->id_lembar,
				'id_grade' => $row->id_grade,
				'id_gsm' => $row->id_gsm,
				'id_warna' => $row->id_warna,
				'pack' => $row->pack,
				'warna_inner' => $row->warna_inner,
				'id_pattern' => $row->id_pattern,
				'qty_box' => $row->qty_box,
				'barcode_inner' => $row->barcode_inner,
				'barcode_outer' => $row->barcode_outer,
				'hal' => $row->hal,
				'status_transfer' => $row->status_transfer,
			);
			$this->template->load('template', 'reapack/tbl_repack_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('reapack'));
		}
	}

	public function create()
	{

		$row = $this->Reapack_model->get_all();
		$warna_inner = $this->warna_model->get_all();
		$data = array(
			'button' => 'Create',
			'row'	 => $row,
			'action' => site_url('reapack/create_action'),
			'id_repack' => set_value('id_repack'),
			'tanggal_terima' => set_value('tanggal_terima'),
			'subjek_email' => set_value('subjek_email'),
			'no_wo' => set_value('no_wo'),
			'id_user' => set_value('id_user'),
			'id_customer' => set_value('id_customer'),
			'kode_item' => set_value('kode_item'),
			// 'id_bentuk' => $bentuk,
			'id_bentuk' => set_value('id_bentuk'),
			'id_ukuran' => set_value('id_ukuran'),
			// 'id_lembar' => $lembar,
			'id_lembar' => set_value('id_lembar'),
			'id_grade' => set_value('id_grade'),
			'id_gsm' => set_value('id_gsm'),
			'id_warna' => set_value('id_warna'),
			'pack' => set_value('pack'),
			'warna_inner' => $warna_inner,
			// 'warna_inner' => set_value('warna_inner'),
			'id_pattern' => set_value('id_pattern'),
			'qty_box' => set_value('qty_box'),
			'barcode_inner' => set_value('barcode_inner'),
			'barcode_outer' => set_value('barcode_outer'),
			'hal' => set_value('hal'),
			'status_transfer' => set_value('status_transfer'),
		);
		$this->template->load('template', 'reapack/tbl_repack_form', $data);
	}

	public function create_action()
	{
		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'tanggal_terima' => $this->input->post('tanggal_terima', TRUE),
				'subjek_email' => $this->input->post('subjek_email', TRUE),
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_user' => $this->session->userdata('id_users'),
				'id_customer' => $id_customer,
				'kode_item' => $this->input->post('kode_item', TRUE),
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_grade' => $this->input->post('id_grade', TRUE),
				'id_gsm' => $this->input->post('id_gsm', TRUE),
				'id_warna' => $this->input->post('id_warna', TRUE),
				'pack' => $this->input->post('pack', TRUE),
				'warna_inner' => $this->input->post('warna_inner', TRUE),
				'id_pattern' => $this->input->post('id_pattern', TRUE),
				'qty_box' => $this->input->post('qty_box', TRUE),
				'barcode_inner' => $this->input->post('barcode_inner', TRUE),
				'barcode_outer' => $this->input->post('barcode_outer', TRUE),
				'hal' => $this->input->post('hal', TRUE),
				'status_transfer' => $this->input->post('status_transfer', TRUE),
				'created' => date('Y-m-d'),

			);

			$this->Reapack_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('reapack'));
		}
	}

	public function update($id)
	{
		$row = $this->Reapack_model->get_by_id($id);
		$lembar = $this->lembar_pack_model->get_all();
		$bentuk = $this->bentuk_model->get_all();
		$ukuran = $this->ukuran_model->get_all();
		$warna_inner = $this->warna_model->get_all();


		if ($row) {
			$data = array(
				'button' => 'Update',
				'row' => $row,
				'action' => site_url('reapack/update_action'),
				'id_repack' => set_value('id_repack', $row->id_repack),
				'tanggal_terima' => set_value('tanggal_terima', $row->tanggal_terima),
				'subjek_email' => set_value('subjek_email', $row->subjek_email),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_user' => set_value('id_user', $row->id_user),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'kode_item' => set_value('kode_item', $row->kode_item),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'id_grade' => set_value('id_grade', $row->id_grade),
				'id_gsm' => set_value('id_gsm', $row->id_gsm),
				'id_warna' => set_value('id_warna', $row->id_warna),
				'pack' => set_value('pack', $row->pack),
				// 'warna_inner' => set_value('warna_inner', $row->warna_inner),
				'warna_inner' => $warna_inner,
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'qty_box' => set_value('qty_box', $row->qty_box),
				'barcode_inner' => set_value('barcode_inner', $row->barcode_inner),
				'barcode_outer' => set_value('barcode_outer', $row->barcode_outer),
				'hal' => set_value('hal', $row->hal),
				'status_transfer' => set_value('status_transfer', $row->status_transfer),
			);
			$this->template->load('template', 'reapack/tbl_repack_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('reapack'));
		}
	}

	public function update_action()
	{
		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_repack', TRUE));
		} else {
			$data = array(
				'tanggal_terima' => $this->input->post('tanggal_terima', TRUE),
				'subjek_email' => $this->input->post('subjek_email', TRUE),
				'no_wo' => $this->input->post('no_wo', TRUE),
				'id_user' => $this->session->userdata('id_users'),
				'id_customer' => $id_customer,
				'kode_item' => $this->input->post('kode_item', TRUE),
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_grade' => $this->input->post('id_grade', TRUE),
				'id_gsm' => $this->input->post('id_gsm', TRUE),
				'id_warna' => $this->input->post('id_warna', TRUE),
				'pack' => $this->input->post('pack', TRUE),
				'warna_inner' => $this->input->post('warna_inner', TRUE),
				'id_pattern' => $this->input->post('id_pattern', TRUE),
				'qty_box' => $this->input->post('qty_box', TRUE),
				'barcode_inner' => $this->input->post('barcode_inner', TRUE),
				'barcode_outer' => $this->input->post('barcode_outer', TRUE),
				'hal' => $this->input->post('hal', TRUE),
				'status_transfer' => $this->input->post('status_transfer', TRUE),
				'updated' => date('Y-m-d H:i:s'),

			);

			// var_dump($data);
			// die;

			$this->Reapack_model->update($this->input->post('id_repack', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('reapack'));
		}
	}


	public function replay($id)
	{
		$row = $this->Reapack_model->get_by_id($id);
		// $lembar = $this->lembar_pack_model->get_all();
		$warna_inner = $this->warna_model->get_all();
		// $ukuran = $this->ukuran_model->get_all();


		if ($row) {
			$data = array(
				'button' => 'Repeat',
				'row' => $row,
				'action' => site_url('reapack/create_action'),
				'id_repack' => set_value('id_repack', $row->id_repack),
				'tanggal_terima' => set_value('tanggal_terima', $row->tanggal_terima),
				'subjek_email' => set_value('subjek_email', $row->subjek_email),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'id_user' => set_value('id_user', $row->id_user),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'kode_item' => set_value('kode_item', $row->kode_item),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'id_grade' => set_value('id_grade', $row->id_grade),
				'id_gsm' => set_value('id_gsm', $row->id_gsm),
				'id_warna' => set_value('id_warna', $row->id_warna),
				'pack' => set_value('pack', $row->pack),
				// 'warna_inner' => set_value('warna_inner', $row->warna_inner),
				'warna_inner' => $warna_inner,
				'id_pattern' => set_value('id_pattern', $row->id_pattern),
				'qty_box' => set_value('qty_box', $row->qty_box),
				'barcode_inner' => set_value('barcode_inner', $row->barcode_inner),
				'barcode_outer' => set_value('barcode_outer', $row->barcode_outer),
				'hal' => set_value('hal', $row->hal),
				'status_transfer' => set_value('status_transfer', $row->status_transfer),
			);
			$this->template->load('template', 'reapack/tbl_repack_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('reapack'));
		}
	}


	public function delete($id)
	{
		$row = $this->Reapack_model->get_by_id($id);

		if ($row) {
			$this->Reapack_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('reapack'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('reapack'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal_terima', 'tanggal terima', 'trim|required');
		$this->form_validation->set_rules('subjek_email', 'subjek email', 'trim|required');
		$this->form_validation->set_rules('no_wo', 'no wo', 'trim|required');
		$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
		$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');
		$this->form_validation->set_rules('kode_item', 'kode item', 'trim|required');
		$this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
		$this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
		$this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
		$this->form_validation->set_rules('id_grade', 'id grade', 'trim|required');
		$this->form_validation->set_rules('id_gsm', 'id gsm', 'trim|required');
		$this->form_validation->set_rules('id_warna', 'id warna', 'trim|required');
		$this->form_validation->set_rules('pack', 'pack', 'trim|required');
		$this->form_validation->set_rules('warna_inner', 'warna inner', 'trim|required');
		$this->form_validation->set_rules('id_pattern', 'id pattern', 'trim|required');
		$this->form_validation->set_rules('qty_box', 'qty box', 'trim|required');
		$this->form_validation->set_rules('barcode_inner', 'barcode inner', 'trim|required');
		$this->form_validation->set_rules('barcode_outer', 'barcode outer', 'trim|required');
		$this->form_validation->set_rules('hal', 'hal', 'trim|required');
		$this->form_validation->set_rules('status_transfer', 'status transfer', 'trim|required');

		$this->form_validation->set_rules('id_repack', 'id_repack', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_repack.xls";
		$judul = "tbl_repack";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Terima");
		xlsWriteLabel($tablehead, $kolomhead++, "Subjek Email");
		xlsWriteLabel($tablehead, $kolomhead++, "No Wo");
		xlsWriteLabel($tablehead, $kolomhead++, "Id User");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Customer");
		xlsWriteLabel($tablehead, $kolomhead++, "Kode Item");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Bentuk");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Ukuran");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Lembar");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Grade");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Gsm");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Warna");
		xlsWriteLabel($tablehead, $kolomhead++, "Pack");
		xlsWriteLabel($tablehead, $kolomhead++, "Warna Inner");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Pattern");
		xlsWriteLabel($tablehead, $kolomhead++, "Qty Box");
		xlsWriteLabel($tablehead, $kolomhead++, "Barcode Inner");
		xlsWriteLabel($tablehead, $kolomhead++, "Barcode Outer");
		xlsWriteLabel($tablehead, $kolomhead++, "Hal");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Transfer");

		foreach ($this->Reapack_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_terima);
			xlsWriteLabel($tablebody, $kolombody++, $data->subjek_email);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_wo);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_customer);
			xlsWriteLabel($tablebody, $kolombody++, $data->kode_item);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_bentuk);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_ukuran);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_lembar);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_grade);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_gsm);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_warna);
			xlsWriteLabel($tablebody, $kolombody++, $data->pack);
			xlsWriteNumber($tablebody, $kolombody++, $data->warna_inner);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_pattern);
			xlsWriteNumber($tablebody, $kolombody++, $data->qty_box);
			xlsWriteLabel($tablebody, $kolombody++, $data->barcode_inner);
			xlsWriteLabel($tablebody, $kolombody++, $data->barcode_outer);
			xlsWriteNumber($tablebody, $kolombody++, $data->hal);
			xlsWriteLabel($tablebody, $kolombody++, $data->status_transfer);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}


	//CETAK LAPORAN REPACK
	function cetak()
	{
		$this->template->load('template', 'reapack/cetak');
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
		$data['row'] = $this->Reapack_model->get_all_reapack($dari, $sampai, $no_wo)->result();
		if (isset($_POST['export'])) {
			// Fungsi header dengan mengirimkan raw data excel
			header("Content-type: application/vnd-ms-excel");

			// Mendefinisikan nama file ekspor "hasil-export.xls"
			header("Content-Disposition: attachment; filename=Laporan Repack.xls");
		}
		$this->load->view('reapack/lap_repack', $data);
	}
}

/* End of file Reapack.php */
/* Location: ./application/controllers/Reapack.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-12 04:53:10 */
/* http://harviacode.com */