<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ukuran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Ukuran_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'ukuran/ukuran_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Ukuran_model->json();
    }

    public function read($id)
    {
        $row = $this->Ukuran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_ukuran' => $row->id_ukuran,
                'ukuran' => $row->ukuran,
            );
            $this->template->load('template', 'ukuran/ukuran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ukuran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ukuran/create_action'),
            'id_ukuran' => set_value('id_ukuran'),
            'ukuran' => set_value('ukuran'),
        );
        $this->template->load('template', 'ukuran/ukuran_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'ukuran' => $this->input->post('ukuran', TRUE),
            );

            $this->Ukuran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ukuran'));
        }
    }

    public function update($id)
    {
        $row = $this->Ukuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ukuran/update_action'),
                'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
                'ukuran' => set_value('ukuran', $row->ukuran),
            );
            $this->template->load('template', 'ukuran/ukuran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ukuran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ukuran', TRUE));
        } else {
            $data = array(
                'ukuran' => $this->input->post('ukuran', TRUE),
            );

            $this->Ukuran_model->update($this->input->post('id_ukuran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ukuran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Ukuran_model->get_by_id($id);

        if ($row) {
            $this->Ukuran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ukuran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ukuran'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ukuran', 'ukuran', 'trim|required');

        $this->form_validation->set_rules('id_ukuran', 'id_ukuran', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ukuran.xls";
        $judul = "ukuran";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");

        foreach ($this->Ukuran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ukuran.doc");

        $data = array(
            'ukuran_data' => $this->Ukuran_model->get_all(),
            'start' => 0
        );

        $this->load->view('ukuran/ukuran_doc', $data);
    }
}

/* End of file Ukuran.php */
/* Location: ./application/controllers/Ukuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 06:29:24 */
/* http://harviacode.com */