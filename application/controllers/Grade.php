<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Grade_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'grade/grade_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Grade_model->json();
    }

    public function read($id)
    {
        $row = $this->Grade_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_grade' => $row->id_grade,
                'grade' => $row->grade,
            );
            $this->template->load('template', 'grade/grade_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('grade/create_action'),
            'id_grade' => set_value('id_grade'),
            'grade' => set_value('grade'),
        );
        $this->template->load('template', 'grade/grade_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'grade' => $this->input->post('grade', TRUE),
            );

            $this->Grade_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('grade'));
        }
    }

    public function update($id)
    {
        $row = $this->Grade_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grade/update_action'),
                'id_grade' => set_value('id_grade', $row->id_grade),
                'grade' => set_value('grade', $row->grade),
            );
            $this->template->load('template', 'grade/grade_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_grade', TRUE));
        } else {
            $data = array(
                'grade' => $this->input->post('grade', TRUE),
            );

            $this->Grade_model->update($this->input->post('id_grade', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grade'));
        }
    }

    public function delete($id)
    {
        $row = $this->Grade_model->get_by_id($id);

        if ($row) {
            $this->Grade_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grade'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('grade', 'grade', 'trim|required');

        $this->form_validation->set_rules('id_grade', 'id_grade', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "grade.xls";
        $judul = "grade";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Grade");

        foreach ($this->Grade_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->grade);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=grade.doc");

        $data = array(
            'grade_data' => $this->Grade_model->get_all(),
            'start' => 0
        );

        $this->load->view('grade/grade_doc', $data);
    }
}

/* End of file Grade.php */
/* Location: ./application/controllers/Grade.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 09:33:31 */
/* http://harviacode.com */