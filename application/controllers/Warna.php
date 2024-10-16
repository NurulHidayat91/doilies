<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Warna_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','warna/warna_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Warna_model->json();
    }

    public function read($id) 
    {
        $row = $this->Warna_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_warna' => $row->id_warna,
		'warna' => $row->warna,
	    );
            $this->template->load('template','warna/warna_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warna/create_action'),
	    'id_warna' => set_value('id_warna'),
	    'warna' => set_value('warna'),
	);
        $this->template->load('template','warna/warna_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Warna_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('warna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Warna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warna/update_action'),
		'id_warna' => set_value('id_warna', $row->id_warna),
		'warna' => set_value('warna', $row->warna),
	    );
            $this->template->load('template','warna/warna_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_warna', TRUE));
        } else {
            $data = array(
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Warna_model->update($this->input->post('id_warna', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Warna_model->get_by_id($id);

        if ($row) {
            $this->Warna_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');

	$this->form_validation->set_rules('id_warna', 'id_warna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "warna.xls";
        $judul = "warna";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Warna");

	foreach ($this->Warna_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=warna.doc");

        $data = array(
            'warna_data' => $this->Warna_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('warna/warna_doc',$data);
    }

}

/* End of file Warna.php */
/* Location: ./application/controllers/Warna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:39:22 */
/* http://harviacode.com */