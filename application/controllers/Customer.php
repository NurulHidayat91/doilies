<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'customer/customer_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Customer_model->json();
    }

    public function read($id)
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_customer' => $row->id_customer,
                'nama_customer' => $row->nama_customer,
                'nohp' => $row->nohp,
                'alamat' => $row->alamat,
                'created' => $row->created,
            );
            $this->template->load('template', 'customer/customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
            'id_customer' => set_value('id_customer'),
            'nama_customer' => set_value('nama_customer'),
            'nohp' => set_value('nohp'),
            'alamat' => set_value('alamat'),
            'created' => set_value('created'),
        );
        $this->template->load('template', 'customer/customer_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_customer' => $this->input->post('nama_customer', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'created' => $this->input->post('created', TRUE),
            );
            // var_dump($data);
            // die;

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('customer'));
        }
    }

    public function update($id)
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
                'id_customer' => set_value('id_customer', $row->id_customer),
                'nama_customer' => set_value('nama_customer', $row->nama_customer),
                'nohp' => set_value('nohp', $row->nohp),
                'alamat' => set_value('alamat', $row->alamat),
                'created' => set_value('created', $row->created),
            );
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_customer', TRUE));
        } else {
            $data = array(
                'nama_customer' => $this->input->post('nama_customer', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'created' => $this->input->post('created', TRUE),
            );

            $this->Customer_model->update($this->input->post('id_customer', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }

    public function delete($id)
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_customer', 'nama customer', 'trim|required');
        $this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('created', 'created', 'trim|required');

        $this->form_validation->set_rules('id_customer', 'id_customer', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customer.xls";
        $judul = "customer";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Customer");
        xlsWriteLabel($tablehead, $kolomhead++, "Nohp");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Created");

        foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
            xlsWriteLabel($tablebody, $kolombody++, $data->nohp);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->created);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=customer.doc");

        $data = array(
            'customer_data' => $this->Customer_model->get_all(),
            'start' => 0
        );

        $this->load->view('customer/customer_doc', $data);
    }
}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 06:32:33 */
/* http://harviacode.com */