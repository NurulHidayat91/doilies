<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bentuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Bentuk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','bentuk/bentuk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Bentuk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Bentuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bentuk' => $row->id_bentuk,
		'bentuk' => $row->bentuk,
	    );
            $this->template->load('template','bentuk/bentuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bentuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bentuk/create_action'),
	    'id_bentuk' => set_value('id_bentuk'),
	    'bentuk' => set_value('bentuk'),
	);
        $this->template->load('template','bentuk/bentuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bentuk' => $this->input->post('bentuk',TRUE),
	    );

            $this->Bentuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('bentuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bentuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bentuk/update_action'),
		'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
		'bentuk' => set_value('bentuk', $row->bentuk),
	    );
            $this->template->load('template','bentuk/bentuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bentuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bentuk', TRUE));
        } else {
            $data = array(
		'bentuk' => $this->input->post('bentuk',TRUE),
	    );

            $this->Bentuk_model->update($this->input->post('id_bentuk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bentuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bentuk_model->get_by_id($id);

        if ($row) {
            $this->Bentuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bentuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bentuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bentuk', 'bentuk', 'trim|required');

	$this->form_validation->set_rules('id_bentuk', 'id_bentuk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "bentuk.xls";
        $judul = "bentuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Bentuk");

	foreach ($this->Bentuk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bentuk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=bentuk.doc");

        $data = array(
            'bentuk_data' => $this->Bentuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('bentuk/bentuk_doc',$data);
    }

}

/* End of file Bentuk.php */
/* Location: ./application/controllers/Bentuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:26:15 */
/* http://harviacode.com */