<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Jam_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'jam/jam_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Jam_model->json();
    }

    public function read($id)
    {
        $row = $this->Jam_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_jam' => $row->id_jam,
                'jam' => $row->jam,
            );
            $this->template->load('template', 'jam/jam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jam'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jam/create_action'),
            'id_jam' => set_value('id_jam'),
            'jam' => set_value('jam'),
        );
        $this->template->load('template', 'jam/jam_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'jam' => $this->input->post('jam', TRUE),
            );

            $this->Jam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('jam'));
        }
    }

    public function update($id)
    {
        $row = $this->Jam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jam/update_action'),
                'id_jam' => set_value('id_jam', $row->id_jam),
                'jam' => set_value('jam', $row->jam),
            );
            $this->template->load('template', 'jam/jam_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jam'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jam', TRUE));
        } else {
            $data = array(
                'jam' => $this->input->post('jam', TRUE),
            );

            $this->Jam_model->update($this->input->post('id_jam', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jam'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jam_model->get_by_id($id);

        if ($row) {
            $this->Jam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jam'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('jam', 'jam', 'trim|required');

        $this->form_validation->set_rules('id_jam', 'id_jam', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jam.xls";
        $judul = "jam";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Jam");

        foreach ($this->Jam_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->jam);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jam.doc");

        $data = array(
            'jam_data' => $this->Jam_model->get_all(),
            'start' => 0
        );

        $this->load->view('jam/jam_doc', $data);
    }
}

/* End of file Jam.php */
/* Location: ./application/controllers/Jam.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-21 09:45:06 */
/* http://harviacode.com */