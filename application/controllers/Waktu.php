<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Waktu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Waktu_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'waktu/waktu_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Waktu_model->json();
    }

    public function read($id)
    {
        $row = $this->Waktu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_waktu' => $row->id_waktu,
                'waktu' => $row->waktu,
            );
            $this->template->load('template', 'waktu/waktu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('waktu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('waktu/create_action'),
            'id_waktu' => set_value('id_waktu'),
            'waktu' => set_value('waktu'),
        );
        $this->template->load('template', 'waktu/waktu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'waktu' => $this->input->post('waktu', TRUE),
            );

            $this->Waktu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('waktu'));
        }
    }

    public function update($id)
    {
        $row = $this->Waktu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('waktu/update_action'),
                'id_waktu' => set_value('id_waktu', $row->id_waktu),
                'waktu' => set_value('waktu', $row->waktu),
            );
            $this->template->load('template', 'waktu/waktu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('waktu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_waktu', TRUE));
        } else {
            $data = array(
                'waktu' => $this->input->post('waktu', TRUE),
            );

            $this->Waktu_model->update($this->input->post('id_waktu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('waktu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Waktu_model->get_by_id($id);

        if ($row) {
            $this->Waktu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('waktu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('waktu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('waktu', 'waktu', 'trim|required');

        $this->form_validation->set_rules('id_waktu', 'id_waktu', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "waktu.xls";
        $judul = "waktu";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Waktu");

        foreach ($this->Waktu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->waktu);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=waktu.doc");

        $data = array(
            'waktu_data' => $this->Waktu_model->get_all(),
            'start' => 0
        );

        $this->load->view('waktu/waktu_doc', $data);
    }
}

/* End of file Waktu.php */
/* Location: ./application/controllers/Waktu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:36:49 */
/* http://harviacode.com */