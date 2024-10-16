<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nonpassed extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Non_passed_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','nonpassed/non_passed_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Non_passed_model->json();
    }

    public function read($id) 
    {
        $row = $this->Non_passed_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_non_passed' => $row->id_non_passed,
		'kode_non_passed' => $row->kode_non_passed,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','nonpassed/non_passed_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nonpassed'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nonpassed/create_action'),
	    'id_non_passed' => set_value('id_non_passed'),
	    'kode_non_passed' => set_value('kode_non_passed'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','nonpassed/non_passed_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_non_passed' => $this->input->post('kode_non_passed',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Non_passed_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('nonpassed'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Non_passed_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nonpassed/update_action'),
		'id_non_passed' => set_value('id_non_passed', $row->id_non_passed),
		'kode_non_passed' => set_value('kode_non_passed', $row->kode_non_passed),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','nonpassed/non_passed_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nonpassed'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_non_passed', TRUE));
        } else {
            $data = array(
		'kode_non_passed' => $this->input->post('kode_non_passed',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Non_passed_model->update($this->input->post('id_non_passed', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nonpassed'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Non_passed_model->get_by_id($id);

        if ($row) {
            $this->Non_passed_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nonpassed'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nonpassed'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_non_passed', 'kode non passed', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_non_passed', 'id_non_passed', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "non_passed.xls";
        $judul = "non_passed";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Non Passed");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Non_passed_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_non_passed);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=non_passed.doc");

        $data = array(
            'non_passed_data' => $this->Non_passed_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('nonpassed/non_passed_doc',$data);
    }

}

/* End of file Nonpassed.php */
/* Location: ./application/controllers/Nonpassed.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:22:08 */
/* http://harviacode.com */