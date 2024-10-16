<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispekerjaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jenis_pekerjaan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','jenispekerjaan/jenis_pekerjaan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_pekerjaan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenis_pekerjaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_pekerjaan' => $row->id_jenis_pekerjaan,
		'nama_pekerjaan' => $row->nama_pekerjaan,
	    );
            $this->template->load('template','jenispekerjaan/jenis_pekerjaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispekerjaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenispekerjaan/create_action'),
	    'id_jenis_pekerjaan' => set_value('id_jenis_pekerjaan'),
	    'nama_pekerjaan' => set_value('nama_pekerjaan'),
	);
        $this->template->load('template','jenispekerjaan/jenis_pekerjaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pekerjaan' => $this->input->post('nama_pekerjaan',TRUE),
	    );

            $this->Jenis_pekerjaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('jenispekerjaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_pekerjaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenispekerjaan/update_action'),
		'id_jenis_pekerjaan' => set_value('id_jenis_pekerjaan', $row->id_jenis_pekerjaan),
		'nama_pekerjaan' => set_value('nama_pekerjaan', $row->nama_pekerjaan),
	    );
            $this->template->load('template','jenispekerjaan/jenis_pekerjaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispekerjaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_pekerjaan', TRUE));
        } else {
            $data = array(
		'nama_pekerjaan' => $this->input->post('nama_pekerjaan',TRUE),
	    );

            $this->Jenis_pekerjaan_model->update($this->input->post('id_jenis_pekerjaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenispekerjaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_pekerjaan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_pekerjaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenispekerjaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispekerjaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pekerjaan', 'nama pekerjaan', 'trim|required');

	$this->form_validation->set_rules('id_jenis_pekerjaan', 'id_jenis_pekerjaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_pekerjaan.xls";
        $judul = "jenis_pekerjaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pekerjaan");

	foreach ($this->Jenis_pekerjaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pekerjaan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_pekerjaan.doc");

        $data = array(
            'jenis_pekerjaan_data' => $this->Jenis_pekerjaan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenispekerjaan/jenis_pekerjaan_doc',$data);
    }

}

/* End of file Jenispekerjaan.php */
/* Location: ./application/controllers/Jenispekerjaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-23 10:49:21 */
/* http://harviacode.com */