<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lembar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Lembar_pack_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'lembar/lembar_pack_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Lembar_pack_model->json();
    }

    public function read($id)
    {
        $row = $this->Lembar_pack_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_lembar' => $row->id_lembar,
                'lembar' => $row->lembar,
            );
            $this->template->load('template', 'lembar/lembar_pack_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lembar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lembar/create_action'),
            'id_lembar' => set_value('id_lembar'),
            'lembar' => set_value('lembar'),
        );
        $this->template->load('template', 'lembar/lembar_pack_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'lembar' => $this->input->post('lembar', TRUE),
            );

            $this->Lembar_pack_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('lembar'));
        }
    }

    public function update($id)
    {
        $row = $this->Lembar_pack_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lembar/update_action'),
                'id_lembar' => set_value('id_lembar', $row->id_lembar),
                'lembar' => set_value('lembar', $row->lembar),
            );
            $this->template->load('template', 'lembar/lembar_pack_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lembar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lembar', TRUE));
        } else {
            $data = array(
                'lembar' => $this->input->post('lembar', TRUE),
            );

            $this->Lembar_pack_model->update($this->input->post('id_lembar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lembar'));
        }
    }

    public function delete($id)
    {
        $row = $this->Lembar_pack_model->get_by_id($id);

        if ($row) {
            $this->Lembar_pack_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lembar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lembar'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('lembar', 'lembar', 'trim|required');

        $this->form_validation->set_rules('id_lembar', 'id_lembar', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "lembar_pack.xls";
        $judul = "lembar_pack";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Lembar");

        foreach ($this->Lembar_pack_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->lembar);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=lembar_pack.doc");

        $data = array(
            'lembar_pack_data' => $this->Lembar_pack_model->get_all(),
            'start' => 0
        );

        $this->load->view('lembar/lembar_pack_doc', $data);
    }
}

/* End of file Lembar.php */
/* Location: ./application/controllers/Lembar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:51:18 */
/* http://harviacode.com */