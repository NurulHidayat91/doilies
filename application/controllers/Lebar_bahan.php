<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lebar_bahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Lebar_bahan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','lebar_bahan/lebar_bahan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Lebar_bahan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Lebar_bahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lebar' => $row->id_lebar,
		'lebar' => $row->lebar,
	    );
            $this->template->load('template','lebar_bahan/lebar_bahan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lebar_bahan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lebar_bahan/create_action'),
	    'id_lebar' => set_value('id_lebar'),
	    'lebar' => set_value('lebar'),
	);
        $this->template->load('template','lebar_bahan/lebar_bahan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'lebar' => $this->input->post('lebar',TRUE),
	    );

            $this->Lebar_bahan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('lebar_bahan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lebar_bahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lebar_bahan/update_action'),
		'id_lebar' => set_value('id_lebar', $row->id_lebar),
		'lebar' => set_value('lebar', $row->lebar),
	    );
            $this->template->load('template','lebar_bahan/lebar_bahan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lebar_bahan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lebar', TRUE));
        } else {
            $data = array(
		'lebar' => $this->input->post('lebar',TRUE),
	    );

            $this->Lebar_bahan_model->update($this->input->post('id_lebar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lebar_bahan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lebar_bahan_model->get_by_id($id);

        if ($row) {
            $this->Lebar_bahan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lebar_bahan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lebar_bahan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('lebar', 'lebar', 'trim|required');

	$this->form_validation->set_rules('id_lebar', 'id_lebar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "lebar_bahan.xls";
        $judul = "lebar_bahan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Lebar");

	foreach ($this->Lebar_bahan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lebar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Lebar_bahan.php */
/* Location: ./application/controllers/Lebar_bahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-10-02 09:28:57 */
/* http://harviacode.com */