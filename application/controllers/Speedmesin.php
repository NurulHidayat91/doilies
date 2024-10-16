<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Speedmesin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Speed_mesin_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','speedmesin/speed_mesin_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Speed_mesin_model->json();
    }

    public function read($id) 
    {
        $row = $this->Speed_mesin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_speed_mesin' => $row->id_speed_mesin,
		'speed_mesin' => $row->speed_mesin,
	    );
            $this->template->load('template','speedmesin/speed_mesin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('speedmesin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('speedmesin/create_action'),
	    'id_speed_mesin' => set_value('id_speed_mesin'),
	    'speed_mesin' => set_value('speed_mesin'),
	);
        $this->template->load('template','speedmesin/speed_mesin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'speed_mesin' => $this->input->post('speed_mesin',TRUE),
	    );

            $this->Speed_mesin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('speedmesin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Speed_mesin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('speedmesin/update_action'),
		'id_speed_mesin' => set_value('id_speed_mesin', $row->id_speed_mesin),
		'speed_mesin' => set_value('speed_mesin', $row->speed_mesin),
	    );
            $this->template->load('template','speedmesin/speed_mesin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('speedmesin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_speed_mesin', TRUE));
        } else {
            $data = array(
		'speed_mesin' => $this->input->post('speed_mesin',TRUE),
	    );

            $this->Speed_mesin_model->update($this->input->post('id_speed_mesin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('speedmesin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Speed_mesin_model->get_by_id($id);

        if ($row) {
            $this->Speed_mesin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('speedmesin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('speedmesin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('speed_mesin', 'speed mesin', 'trim|required');

	$this->form_validation->set_rules('id_speed_mesin', 'id_speed_mesin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "speed_mesin.xls";
        $judul = "speed_mesin";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Speed Mesin");

	foreach ($this->Speed_mesin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->speed_mesin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=speed_mesin.doc");

        $data = array(
            'speed_mesin_data' => $this->Speed_mesin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('speedmesin/speed_mesin_doc',$data);
    }

}

/* End of file Speedmesin.php */
/* Location: ./application/controllers/Speedmesin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:21:47 */
/* http://harviacode.com */