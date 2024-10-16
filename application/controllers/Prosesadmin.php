<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Prosesadmin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Proses_admin_model');
		$this->load->model('laporan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/prosesadmin/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/prosesadmin/index/';
			$config['first_url'] = base_url() . 'index.php/prosesadmin/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Proses_admin_model->total_rows($q);
		$prosesadmin = $this->Proses_admin_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'prosesadmin_data' => $prosesadmin,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 'prosesadmin/proses_admin_list', $data);
	}

	public function read($id)
	{
		$row = $this->Proses_admin_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_proses' => $row->id_proses,
				'no_wo' => $row->no_wo,
				'tanggal' => $row->tanggal,
				'id_waktu' => $row->id_waktu,
				'id_user' => $row->id_user,
				'shift' => $row->shift,
				'id_mesin' => $row->id_mesin,
				'id_customer' => $row->id_customer,
				'id_jenis_pekerjaan' => $row->id_jenis_pekerjaan,
				'id_warna' => $row->id_warna,
				'id_bentuk' => $row->id_bentuk,
				'id_ukuran' => $row->id_ukuran,
				'id_lembar' => $row->id_lembar,
				'id_speed_mesin' => $row->id_speed_mesin,
				'target' => $row->target,
				'hasil_potongan' => $row->hasil_potongan,
				'reject_potongan' => $row->reject_potongan,
				'hasil_geprek' => $row->hasil_geprek,
				'reject_geprek' => $row->reject_geprek,
				'hasil_sortir_polybag' => $row->hasil_sortir_polybag,
				'reject_sortir_polybag' => $row->reject_sortir_polybag,
				'hasil_sealer' => $row->hasil_sealer,
				'reject_sealer' => $row->reject_sealer,
				'hasil_oven' => $row->hasil_oven,
				'reject_oven' => $row->reject_oven,
				'hasil_sticker' => $row->hasil_sticker,
				'reject_sticker' => $row->reject_sticker,
				'hasil_packing_box' => $row->hasil_packing_box,
				'reject_packing_box' => $row->reject_packing_box,
			);
			$this->template->load('template', 'prosesadmin/proses_admin_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('prosesadmin'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('prosesadmin/create_action'),
			'id_proses' => set_value('id_proses'),
			'no_wo' => set_value('no_wo'),
			'tanggal' => set_value('tanggal'),
			'id_waktu' => set_value('id_waktu'),
			'id_user' => set_value('id_user'),
			'shift' => set_value('shift'),
			'id_mesin' => set_value('id_mesin'),
			'id_customer' => set_value('id_customer'),
			'id_jenis_pekerjaan' => set_value('id_jenis_pekerjaan'),
			'id_warna' => set_value('id_warna'),
			'id_bentuk' => set_value('id_bentuk'),
			'id_ukuran' => set_value('id_ukuran'),
			'id_lembar' => set_value('id_lembar'),
			'id_speed_mesin' => set_value('id_speed_mesin'),
			'target' => set_value('target'),
			'hasil_potongan' => set_value('hasil_potongan'),
			'reject_potongan' => set_value('reject_potongan'),
			'hasil_geprek' => set_value('hasil_geprek'),
			'reject_geprek' => set_value('reject_geprek'),
			'hasil_sortir_polybag' => set_value('hasil_sortir_polybag'),
			'reject_sortir_polybag' => set_value('reject_sortir_polybag'),
			'hasil_sealer' => set_value('hasil_sealer'),
			'reject_sealer' => set_value('reject_sealer'),
			'hasil_oven' => set_value('hasil_oven'),
			'reject_oven' => set_value('reject_oven'),
			'hasil_sticker' => set_value('hasil_sticker'),
			'reject_sticker' => set_value('reject_sticker'),
			'hasil_packing_box' => set_value('hasil_packing_box'),
			'reject_packing_box' => set_value('reject_packing_box'),
		);
		$this->template->load('template', 'prosesadmin/proses_admin_form', $data);
	}

	public function create_action()
	{
		$namaUser = $this->input->post('id_user', TRUE);
		$id_user = getFieldValue('tbl_user', 'id_users', 'full_name', $namaUser);

		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'no_wo' => $this->input->post('no_wo', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'id_waktu' => $this->input->post('id_waktu', TRUE),
				'id_user' => $id_user,
				'shift' => $this->input->post('shift', TRUE),
				'id_mesin' => $this->input->post('id_mesin', TRUE),
				'id_customer' => $id_customer,
				'id_jenis_pekerjaan' => $this->input->post('id_jenis_pekerjaan', TRUE),
				'id_warna' => $this->input->post('id_warna', TRUE),
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_speed_mesin' => $this->input->post('id_speed_mesin', TRUE),
				'target' => $this->input->post('target', TRUE),
				'hasil_potongan' => $this->input->post('hasil_potongan', TRUE),
				'reject_potongan' => $this->input->post('reject_potongan', TRUE),
				'hasil_geprek' => $this->input->post('hasil_geprek', TRUE),
				'reject_geprek' => $this->input->post('reject_geprek', TRUE),
				'hasil_sortir_polybag' => $this->input->post('hasil_sortir_polybag', TRUE),
				'reject_sortir_polybag' => $this->input->post('reject_sortir_polybag', TRUE),
				'hasil_sealer' => $this->input->post('hasil_sealer', TRUE),
				'reject_sealer' => $this->input->post('reject_sealer', TRUE),
				'hasil_oven' => $this->input->post('hasil_oven', TRUE),
				'reject_oven' => $this->input->post('reject_oven', TRUE),
				'hasil_sticker' => $this->input->post('hasil_sticker', TRUE),
				'reject_sticker' => $this->input->post('reject_sticker', TRUE),
				'hasil_packing_box' => $this->input->post('hasil_packing_box', TRUE),
				'reject_packing_box' => $this->input->post('reject_packing_box', TRUE),
				'created'     => date('Y-m-d h:i:s'),
				'create_by'   => $this->session->full_name

			);

			$this->Proses_admin_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('prosesadmin'));
		}
	}

	public function update($id)
	{
		$row = $this->Proses_admin_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('prosesadmin/update_action'),
				'id_proses' => set_value('id_proses', $row->id_proses),
				'no_wo' => set_value('no_wo', $row->no_wo),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'id_waktu' => set_value('id_waktu', $row->id_waktu),
				'id_user' => set_value('id_user', $row->full_name),
				'shift' => set_value('shift', $row->shift),
				'id_mesin' => set_value('id_mesin', $row->id_mesin),
				'id_customer' => set_value('id_customer', $row->nama_customer),
				'id_jenis_pekerjaan' => set_value('id_jenis_pekerjaan', $row->id_jenis_pekerjaan),
				'id_warna' => set_value('id_warna', $row->id_warna),
				'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
				'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
				'id_lembar' => set_value('id_lembar', $row->id_lembar),
				'id_speed_mesin' => set_value('id_speed_mesin', $row->id_speed_mesin),
				'target' => set_value('target', $row->target),
				'hasil_potongan' => set_value('hasil_potongan', $row->hasil_potongan),
				'reject_potongan' => set_value('reject_potongan', $row->reject_potongan),
				'hasil_geprek' => set_value('hasil_geprek', $row->hasil_geprek),
				'reject_geprek' => set_value('reject_geprek', $row->reject_geprek),
				'hasil_sortir_polybag' => set_value('hasil_sortir_polybag', $row->hasil_sortir_polybag),
				'reject_sortir_polybag' => set_value('reject_sortir_polybag', $row->reject_sortir_polybag),
				'hasil_sealer' => set_value('hasil_sealer', $row->hasil_sealer),
				'reject_sealer' => set_value('reject_sealer', $row->reject_sealer),
				'hasil_oven' => set_value('hasil_oven', $row->hasil_oven),
				'reject_oven' => set_value('reject_oven', $row->reject_oven),
				'hasil_sticker' => set_value('hasil_sticker', $row->hasil_sticker),
				'reject_sticker' => set_value('reject_sticker', $row->reject_sticker),
				'hasil_packing_box' => set_value('hasil_packing_box', $row->hasil_packing_box),
				'reject_packing_box' => set_value('reject_packing_box', $row->reject_packing_box),
			);
			$this->template->load('template', 'prosesadmin/proses_admin_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('prosesadmin'));
		}
	}

	public function update_action()
	{
		$namaUser = $this->input->post('id_user', TRUE);
		$id_user = getFieldValue('tbl_user', 'id_users', 'full_name', $namaUser);

		$namaCustomer = $this->input->post('id_customer', TRUE);
		$id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_proses', TRUE));
		} else {
			$data = array(
				'no_wo' => $this->input->post('no_wo', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'id_waktu' => $this->input->post('id_waktu', TRUE),
				'id_user' => $id_user,
				'shift' => $this->input->post('shift', TRUE),
				'id_mesin' => $this->input->post('id_mesin', TRUE),
				'id_customer' => $id_customer,
				'id_jenis_pekerjaan' => $this->input->post('id_jenis_pekerjaan', TRUE),
				'id_warna' => $this->input->post('id_warna', TRUE),
				'id_bentuk' => $this->input->post('id_bentuk', TRUE),
				'id_ukuran' => $this->input->post('id_ukuran', TRUE),
				'id_lembar' => $this->input->post('id_lembar', TRUE),
				'id_speed_mesin' => $this->input->post('id_speed_mesin', TRUE),
				'target' => $this->input->post('target', TRUE),
				'hasil_potongan' => $this->input->post('hasil_potongan', TRUE),
				'reject_potongan' => $this->input->post('reject_potongan', TRUE),
				'hasil_geprek' => $this->input->post('hasil_geprek', TRUE),
				'reject_geprek' => $this->input->post('reject_geprek', TRUE),
				'hasil_sortir_polybag' => $this->input->post('hasil_sortir_polybag', TRUE),
				'reject_sortir_polybag' => $this->input->post('reject_sortir_polybag', TRUE),
				'hasil_sealer' => $this->input->post('hasil_sealer', TRUE),
				'reject_sealer' => $this->input->post('reject_sealer', TRUE),
				'hasil_oven' => $this->input->post('hasil_oven', TRUE),
				'reject_oven' => $this->input->post('reject_oven', TRUE),
				'hasil_sticker' => $this->input->post('hasil_sticker', TRUE),
				'reject_sticker' => $this->input->post('reject_sticker', TRUE),
				'hasil_packing_box' => $this->input->post('hasil_packing_box', TRUE),
				'reject_packing_box' => $this->input->post('reject_packing_box', TRUE),
			);


			$this->Proses_admin_model->update($this->input->post('id_proses', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('prosesadmin'));
		}
	}

	public function delete($id)
	{
		$row = $this->Proses_admin_model->get_by_id($id);

		if ($row) {
			$this->Proses_admin_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('prosesadmin'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('prosesadmin'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_wo', 'no wo', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id_waktu', 'id waktu', 'trim|required');
		$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
		$this->form_validation->set_rules('shift', 'shift', 'trim|required');
		$this->form_validation->set_rules('id_mesin', 'id mesin', 'trim|required');
		$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');
		$this->form_validation->set_rules('id_jenis_pekerjaan', 'id jenis pekerjaan', 'trim|required');
		$this->form_validation->set_rules('id_warna', 'id warna', 'trim|required');
		$this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
		$this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
		$this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
		$this->form_validation->set_rules('id_speed_mesin', 'id speed mesin', 'trim|required');
		$this->form_validation->set_rules('target', 'target', 'trim|required');
		$this->form_validation->set_rules('hasil_potongan', 'hasil potongan', 'trim|required');
		$this->form_validation->set_rules('reject_potongan', 'reject potongan', 'trim|required');
		$this->form_validation->set_rules('hasil_geprek', 'hasil geprek', 'trim|required');
		$this->form_validation->set_rules('reject_geprek', 'reject geprek', 'trim|required');
		$this->form_validation->set_rules('hasil_sortir_polybag', 'hasil sortir polybag', 'trim|required');
		$this->form_validation->set_rules('reject_sortir_polybag', 'reject sortir polybag', 'trim|required');
		$this->form_validation->set_rules('hasil_sealer', 'hasil sealer', 'trim|required');
		$this->form_validation->set_rules('reject_sealer', 'reject sealer', 'trim|required');
		$this->form_validation->set_rules('hasil_oven', 'hasil oven', 'trim|required');
		$this->form_validation->set_rules('reject_oven', 'reject oven', 'trim|required');
		$this->form_validation->set_rules('hasil_sticker', 'hasil sticker', 'trim|required');
		$this->form_validation->set_rules('reject_sticker', 'reject sticker', 'trim|required');
		$this->form_validation->set_rules('hasil_packing_box', 'hasil packing box', 'trim|required');
		$this->form_validation->set_rules('reject_packing_box', 'reject packing box', 'trim|required');

		$this->form_validation->set_rules('id_proses', 'id_proses', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "proses_admin.xls";
		$judul = "proses_admin";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
		xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
		xlsWriteLabel($tablehead, $kolomhead++, "Operator");
		xlsWriteLabel($tablehead, $kolomhead++, "Shift");
		xlsWriteLabel($tablehead, $kolomhead++, "Mesin");
		xlsWriteLabel($tablehead, $kolomhead++, "Customer");
		xlsWriteLabel($tablehead, $kolomhead++, "Sub Bagian");
		xlsWriteLabel($tablehead, $kolomhead++, "Warna");
		xlsWriteLabel($tablehead, $kolomhead++, "Bentuk");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");
		xlsWriteLabel($tablehead, $kolomhead++, "Lembar");
		xlsWriteLabel($tablehead, $kolomhead++, "Speed Mesin");
		xlsWriteLabel($tablehead, $kolomhead++, "Target");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Potongan");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Potongan");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Geprek");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Geprek");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Sortir Polybag");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Sortir Polybag");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Sealer");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Sealer");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Oven");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Oven");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Sticker");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Sticker");
		xlsWriteLabel($tablehead, $kolomhead++, "Hasil Packing Box");
		xlsWriteLabel($tablehead, $kolomhead++, "Reject Packing Box");

		foreach ($this->Proses_admin_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_wo);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
			xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
			xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
			xlsWriteLabel($tablebody, $kolombody++, $data->shift);
			xlsWriteLabel($tablebody, $kolombody++, $data->kode_mesin);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_pekerjaan);
			xlsWriteLabel($tablebody, $kolombody++, $data->warna);
			xlsWriteLabel($tablebody, $kolombody++, $data->bentuk);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);
			xlsWriteLabel($tablebody, $kolombody++, $data->lembar);
			xlsWriteLabel($tablebody, $kolombody++, $data->speed_mesin);
			xlsWriteLabel($tablebody, $kolombody++, $data->target);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_potongan);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_potongan);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_geprek);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_geprek);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_sortir_polybag);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_sortir_polybag);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_sealer);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_sealer);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_oven);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_oven);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_sticker);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_sticker);
			xlsWriteLabel($tablebody, $kolombody++, $data->hasil_packing_box);
			xlsWriteLabel($tablebody, $kolombody++, $data->reject_packing_box);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}



	//CETAK LAPOARAN HARIAN MESIN  DOILIES

	function cetak()
	{
		$this->template->load('template', 'prosesadmin/cetak');
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
		$data['row'] = $this->laporan_model->get_all_prosesadmin($dari, $sampai, $no_wo)->result();
		if (isset($_POST['export'])) {
			// Fungsi header dengan mengirimkan raw data excel
			header("Content-type: application/vnd-ms-excel");

			// Mendefinisikan nama file ekspor "hasil-export.xls"
			header("Content-Disposition: attachment; filename=Laporan Harian Packaging.xls");
		}
		$this->load->view('prosesadmin/lap_proses_admin', $data);
	}
}  

/* End of file Prosesadmin.php */
/* Location: ./application/controllers/Prosesadmin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-24 05:07:44 */
/* http://harviacode.com */