<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mesin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Mesin_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','mesin/mesin_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mesin_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mesin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mesin' => $row->id_mesin,
		'kode_mesin' => $row->kode_mesin,
	    );
            $this->template->load('template','mesin/mesin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mesin/create_action'),
	    'id_mesin' => set_value('id_mesin'),
	    'kode_mesin' => set_value('kode_mesin'),
	);
        $this->template->load('template','mesin/mesin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_mesin' => $this->input->post('kode_mesin',TRUE),
	    );

            $this->Mesin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mesin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mesin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mesin/update_action'),
		'id_mesin' => set_value('id_mesin', $row->id_mesin),
		'kode_mesin' => set_value('kode_mesin', $row->kode_mesin),
	    );
            $this->template->load('template','mesin/mesin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mesin', TRUE));
        } else {
            $data = array(
		'kode_mesin' => $this->input->post('kode_mesin',TRUE),
	    );

            $this->Mesin_model->update($this->input->post('id_mesin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mesin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mesin_model->get_by_id($id);

        if ($row) {
            $this->Mesin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mesin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_mesin', 'kode mesin', 'trim|required');

	$this->form_validation->set_rules('id_mesin', 'id_mesin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mesin.xls";
        $judul = "mesin";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Mesin");

	foreach ($this->Mesin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_mesin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mesin.doc");

        $data = array(
            'mesin_data' => $this->Mesin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mesin/mesin_doc',$data);
    }

}

/* End of file Mesin.php */
/* Location: ./application/controllers/Mesin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 09:21:28 */
/* http://harviacode.com */