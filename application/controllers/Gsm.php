<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gsm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Gsm_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'gsm/gsm_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Gsm_model->json();
    }

    public function read($id)
    {
        $row = $this->Gsm_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_gsm' => $row->id_gsm,
                'gsm' => $row->gsm,
            );
            $this->template->load('template', 'gsm/gsm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gsm'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gsm/create_action'),
            'id_gsm' => set_value('id_gsm'),
            'gsm' => set_value('gsm'),
        );
        $this->template->load('template', 'gsm/gsm_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'gsm' => $this->input->post('gsm', TRUE),
            );

            $this->Gsm_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('gsm'));
        }
    }

    public function update($id)
    {
        $row = $this->Gsm_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gsm/update_action'),
                'id_gsm' => set_value('id_gsm', $row->id_gsm),
                'gsm' => set_value('gsm', $row->gsm),
            );
            $this->template->load('template', 'gsm/gsm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gsm'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_gsm', TRUE));
        } else {
            $data = array(
                'gsm' => $this->input->post('gsm', TRUE),
            );

            $this->Gsm_model->update($this->input->post('id_gsm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gsm'));
        }
    }

    public function delete($id)
    {
        $row = $this->Gsm_model->get_by_id($id);

        if ($row) {
            $this->Gsm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gsm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gsm'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('gsm', 'gsm', 'trim|required');

        $this->form_validation->set_rules('id_gsm', 'id_gsm', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "gsm.xls";
        $judul = "gsm";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Gsm");

        foreach ($this->Gsm_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->gsm);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gsm.doc");

        $data = array(
            'gsm_data' => $this->Gsm_model->get_all(),
            'start' => 0
        );

        $this->load->view('gsm/gsm_doc', $data);
    }
}

/* End of file Gsm.php */
/* Location: ./application/controllers/Gsm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 11:53:42 */
/* http://harviacode.com */