<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Downtime extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Downtime_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'downtime/downtime_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Downtime_model->json();
    }

    public function read($id)
    {
        $row = $this->Downtime_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_downtime' => $row->id_downtime,
                'kode' => $row->kode,
                'keterangan' => $row->keterangan,
            );
            $this->template->load('template', 'downtime/downtime_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('downtime'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('downtime/create_action'),
            'id_downtime' => set_value('id_downtime'),
            'kode' => set_value('kode'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template', 'downtime/downtime_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode' => $this->input->post('kode', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Downtime_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('downtime'));
        }
    }

    public function update($id)
    {
        $row = $this->Downtime_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('downtime/update_action'),
                'id_downtime' => set_value('id_downtime', $row->id_downtime),
                'kode' => set_value('kode', $row->kode),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->template->load('template', 'downtime/downtime_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('downtime'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_downtime', TRUE));
        } else {
            $data = array(
                'kode' => $this->input->post('kode', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Downtime_model->update($this->input->post('id_downtime', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('downtime'));
        }
    }

    public function delete($id)
    {
        $row = $this->Downtime_model->get_by_id($id);

        if ($row) {
            $this->Downtime_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('downtime'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('downtime'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id_downtime', 'id_downtime', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "downtime.xls";
        $judul = "downtime";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Kode");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

        foreach ($this->Downtime_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode);
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
        header("Content-Disposition: attachment;Filename=downtime.doc");

        $data = array(
            'downtime_data' => $this->Downtime_model->get_all(),
            'start' => 0
        );

        $this->load->view('downtime/downtime_doc', $data);
    }
}

/* End of file Downtime.php */
/* Location: ./application/controllers/Downtime.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 09:21:09 */
/* http://harviacode.com */