<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pattern extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Pattern_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'pattern/pattern_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Pattern_model->json();
    }

    public function read($id)
    {
        $row = $this->Pattern_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pattern' => $row->id_pattern,
                'nama_pattern' => $row->nama_pattern,
            );
            $this->template->load('template', 'pattern/pattern_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pattern'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pattern/create_action'),
            'id_pattern' => set_value('id_pattern'),
            'nama_pattern' => set_value('nama_pattern'),
        );
        $this->template->load('template', 'pattern/pattern_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_pattern' => $this->input->post('nama_pattern', TRUE),
            );

            $this->Pattern_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pattern'));
        }
    }

    public function update($id)
    {
        $row = $this->Pattern_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pattern/update_action'),
                'id_pattern' => set_value('id_pattern', $row->id_pattern),
                'nama_pattern' => set_value('nama_pattern', $row->nama_pattern),
            );
            $this->template->load('template', 'pattern/pattern_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pattern'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pattern', TRUE));
        } else {
            $data = array(
                'nama_pattern' => $this->input->post('nama_pattern', TRUE),
            );

            $this->Pattern_model->update($this->input->post('id_pattern', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pattern'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pattern_model->get_by_id($id);

        if ($row) {
            $this->Pattern_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pattern'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pattern'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pattern', 'nama pattern', 'trim|required');

        $this->form_validation->set_rules('id_pattern', 'id_pattern', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pattern.xls";
        $judul = "pattern";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pattern");

        foreach ($this->Pattern_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pattern);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pattern.doc");

        $data = array(
            'pattern_data' => $this->Pattern_model->get_all(),
            'start' => 0
        );

        $this->load->view('pattern/pattern_doc', $data);
    }
}

/* End of file Pattern.php */
/* Location: ./application/controllers/Pattern.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:50:45 */
/* http://harviacode.com */