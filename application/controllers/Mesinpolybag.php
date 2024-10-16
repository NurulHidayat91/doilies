<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mesinpolybag extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Polybag_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/mesinpolybag/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/mesinpolybag/index/';
            $config['first_url'] = base_url() . 'index.php/mesinpolybag/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Polybag_model->total_rows($q);
        $mesinpolybag = $this->Polybag_model->get_limit_data($config['per_page'], $start, $q);
        $mesinpolybag_peruser = $this->Polybag_model->get_limit_peruser($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mesinpolybag_data' => $mesinpolybag,
            'mesinpolybag_data_peruser' => $mesinpolybag_peruser,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'mesinpolybag/polybag_list', $data);
    }

    public function read($id)
    {
        $row = $this->Polybag_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_mesin_polybag' => $row->id_mesin_polybag,
                'no_wo' => $row->no_wo,
                'id_user' => $row->id_user,
                'id_customer' => $row->id_customer,
                'tanggal' => $row->tanggal,
                'id_waktu' => $row->id_waktu,
                'shift' => $row->shift,
                'id_warna' => $row->id_warna,
                'id_bentuk' => $row->id_bentuk,
                'id_ukuran' => $row->id_ukuran,
                'id_lembar' => $row->id_lembar,
                'target' => $row->target,
                'hasil' => $row->hasil,
                'rejected' => $row->rejected,
                'keterangan' => $row->keterangan,
            );
            $this->template->load('template', 'mesinpolybag/polybag_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesinpolybag'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mesinpolybag/create_action'),
            'id_mesin_polybag' => set_value('id_mesin_polybag'),
            'no_wo' => set_value('no_wo'),
            'id_user' => set_value('id_user'),
            'id_customer' => set_value('id_customer'),
            'tanggal' => set_value('tanggal'),
            'id_waktu' => set_value('id_waktu'),
            'shift' => set_value('shift'),
            'id_warna' => set_value('id_warna'),
            'id_bentuk' => set_value('id_bentuk'),
            'id_ukuran' => set_value('id_ukuran'),
            'id_lembar' => set_value('id_lembar'),
            'target' => set_value('target'),
            'hasil' => set_value('hasil'),
            'rejected' => set_value('rejected'),
            'keterangan' => set_value('keterangan'),
            'persentase' => set_value('persentase'),
        );
        $this->template->load('template', 'mesinpolybag/polybag_form', $data);
    }


    // TAMBAH DATA MAMUAL

    public function create_manual()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mesinpolybag/create_action_manual'),
            'id_mesin_polybag' => set_value('id_mesin_polybag'),
            'no_wo' => set_value('no_wo'),
            'id_user' => set_value('id_user'),
            'id_customer' => set_value('id_customer'),
            'tanggal' => set_value('tanggal'),
            'id_waktu' => set_value('id_waktu'),
            'shift' => set_value('shift'),
            'id_warna' => set_value('id_warna'),
            'id_bentuk' => set_value('id_bentuk'),
            'id_ukuran' => set_value('id_ukuran'),
            'id_lembar' => set_value('id_lembar'),
            'target' => set_value('target'),
            'hasil' => set_value('hasil'),
            'rejected' => set_value('rejected'),
            'keterangan' => set_value('keterangan'),
            'persentase' => set_value('persentase'),
        );
        $this->template->load('template', 'mesinpolybag/polybag_form_manual', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $namaCustomer = $this->input->post('id_customer', TRUE);
        $id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);


        $ukuran = $this->db->get_where('ukuran', array(
            'ukuran' => $this->input->post('id_ukuran', TRUE),
        ))->row_array();

        $bentuk = $this->db->get_where('bentuk', array(
            'bentuk' => $this->input->post('id_bentuk', TRUE),
        ))->row_array();

        $warna = $this->db->get_where('warna', array(
            'warna' => $this->input->post('id_warna', TRUE),
        ))->row_array();

        $lembar_pack = $this->db->get_where('lembar_pack', array(
            'lembar' => $this->input->post('id_lembar', TRUE),
        ))->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_wo' => $this->input->post('no_wo', TRUE),
                'id_user' => $this->session->userdata('id_users'),
                'id_customer' => $id_customer,
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_waktu' => $this->input->post('id_waktu', TRUE),
                'shift' => $this->input->post('shift', TRUE),
                'id_warna'    => $warna['id_warna'],
                // 'id_warna' => $this->input->post('id_warna', TRUE),
                'id_bentuk'   => $bentuk['id_bentuk'],
                // 'id_bentuk' => $this->input->post('id_bentuk', TRUE),
                'id_ukuran'   => $ukuran['id_ukuran'],
                // 'id_ukuran' => $this->input->post('id_ukuran', TRUE),
                'id_lembar'   => $lembar_pack['id_lembar'],
                // 'id_lembar' => $this->input->post('id_lembar', TRUE),
                'target' => $this->input->post('target', TRUE),
                'hasil' => $this->input->post('hasil', TRUE),
                'rejected' => $this->input->post('rejected', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'persentase' => $this->input->post('persentase', TRUE),
                'created'     => date('Y-m-d h:i:s'),

            );


            $this->Polybag_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mesinpolybag'));
        }
    }


    //CREATE ACTION MANUAL

    public function create_action_manual()
    {
        $this->_rules();
        $namaCustomer = $this->input->post('id_customer', TRUE);
        $id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);


        // $ukuran = $this->db->get_where('ukuran', array(
        //     'ukuran' => $this->input->post('id_ukuran', TRUE),
        // ))->row_array();

        // $bentuk = $this->db->get_where('bentuk', array(
        //     'bentuk' => $this->input->post('id_bentuk', TRUE),
        // ))->row_array();

        // $warna = $this->db->get_where('warna', array(
        //     'warna' => $this->input->post('id_warna', TRUE),
        // ))->row_array();

        // $lembar_pack = $this->db->get_where('lembar_pack', array(
        //     'lembar' => $this->input->post('id_lembar', TRUE),
        // ))->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_wo' => $this->input->post('no_wo', TRUE),
                'id_user' => $this->session->userdata('id_users'),
                'id_customer' => $id_customer,
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_waktu' => $this->input->post('id_waktu', TRUE),
                'shift' => $this->input->post('shift', TRUE),
                // 'id_warna'    => $warna['id_warna'],
                'id_warna' => $this->input->post('id_warna', TRUE),
                // 'id_bentuk'   => $bentuk['id_bentuk'],
                'id_bentuk' => $this->input->post('id_bentuk', TRUE),
                // 'id_ukuran'   => $ukuran['id_ukuran'],
                'id_ukuran' => $this->input->post('id_ukuran', TRUE),
                // 'id_lembar'   => $lembar_pack['id_lembar'],
                'id_lembar' => $this->input->post('id_lembar', TRUE),
                'target' => $this->input->post('target', TRUE),
                'hasil' => $this->input->post('hasil', TRUE),
                'rejected' => $this->input->post('rejected', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'persentase' => $this->input->post('persentase', TRUE),
                'created'     => date('Y-m-d h:i:s'),

            );


            $this->Polybag_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mesinpolybag'));
        }
    }


    public function update($id)
    {
        $row = $this->Polybag_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mesinpolybag/update_action'),
                'id_mesin_polybag' => set_value('id_mesin_polybag', $row->id_mesin_polybag),
                'no_wo' => set_value('no_wo', $row->no_wo),
                'id_user' => set_value('id_user', $row->id_user),
                'id_customer' => set_value('id_customer', $row->nama_customer),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'id_waktu' => set_value('id_waktu', $row->id_waktu),
                'shift' => set_value('shift', $row->shift),
                'id_warna' => set_value('id_warna', $row->id_warna),
                'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
                'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
                'id_lembar' => set_value('id_lembar', $row->id_lembar),
                'target' => set_value('target', $row->target),
                'hasil' => set_value('hasil', $row->hasil),
                'rejected' => set_value('rejected', $row->rejected),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'persentase' => set_value('persentase', $row->persentase),
            );
            $this->template->load('template', 'mesinpolybag/polybag_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesinpolybag'));
        }
    }

    public function update_action()
    {

        $this->_rules();

        $namaCustomer = $this->input->post('id_customer', TRUE);
        $id_customer = getFieldValue('customer', 'id_customer', 'nama_customer', $namaCustomer);

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mesin_polybag', TRUE));
        } else {
            $data = array(
                'no_wo' => $this->input->post('no_wo', TRUE),
                'id_user' => $this->session->userdata('id_users'),
                'id_customer' => $id_customer,
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_waktu' => $this->input->post('id_waktu', TRUE),
                'shift' => $this->input->post('shift', TRUE),
                'id_warna' => $this->input->post('id_warna', TRUE),
                'id_bentuk' => $this->input->post('id_bentuk', TRUE),
                'id_ukuran' => $this->input->post('id_ukuran', TRUE),
                'id_lembar' => $this->input->post('id_lembar', TRUE),
                'target' => $this->input->post('target', TRUE),
                'hasil' => $this->input->post('hasil', TRUE),
                'rejected' => $this->input->post('rejected', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'persentase' => $this->input->post('persentase', TRUE),
                'updated'     => date('Y-m-d h:i:s'),

            );

            $this->Polybag_model->update($this->input->post('id_mesin_polybag', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mesinpolybag'));
        }
    }


    public function replay($id)
    {
        $row = $this->Polybag_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Repeat',
                'action' => site_url('mesinpolybag/create_action'),
                'id_mesin_polybag' => set_value('id_mesin_polybag', $row->id_mesin_polybag),
                'no_wo' => set_value('no_wo', $row->no_wo),
                'id_user' => set_value('id_user', $row->id_user),
                'id_customer' => set_value('id_customer', $row->nama_customer),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'id_waktu' => set_value('id_waktu', $row->waktu),
                'shift' => set_value('shift', $row->shift),
                'id_warna' => set_value('id_warna', $row->warna),
                'id_bentuk' => set_value('id_bentuk', $row->bentuk),
                'id_ukuran' => set_value('id_ukuran', $row->ukuran),
                'id_lembar' => set_value('id_lembar', $row->lembar),
                'target' => set_value('target', $row->target),
                'hasil' => set_value('hasil', $row->hasil),
                'rejected' => set_value('rejected', $row->rejected),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'persentase' => set_value('persentase', $row->persentase),
            );
            $this->template->load('template', 'mesinpolybag/polybag_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesinpolybag'));
        }
    }

    public function replay_manual($id)
    {
        $row = $this->Polybag_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Repeat',
                'action' => site_url('mesinpolybag/create_action_manual'),
                'id_mesin_polybag' => set_value('id_mesin_polybag', $row->id_mesin_polybag),
                'no_wo' => set_value('no_wo', $row->no_wo),
                'id_user' => set_value('id_user', $row->id_user),
                'id_customer' => set_value('id_customer', $row->nama_customer),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'id_waktu' => set_value('id_waktu', $row->id_waktu),
                'shift' => set_value('shift', $row->shift),
                'id_warna' => set_value('id_warna', $row->id_warna),
                'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
                'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
                'id_lembar' => set_value('id_lembar', $row->id_lembar),
                'target' => set_value('target', $row->target),
                'hasil' => set_value('hasil', $row->hasil),
                'rejected' => set_value('rejected', $row->rejected),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'persentase' => set_value('persentase', $row->persentase),
            );
            $this->template->load('template', 'mesinpolybag/polybag_form_manual', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesinpolybag'));
        }
    }

    public function delete($id)
    {
        $row = $this->Polybag_model->get_by_id($id);

        if ($row) {
            $this->Polybag_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mesinpolybag'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mesinpolybag'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_wo', 'no wo', 'trim|required');
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('id_waktu', 'id waktu', 'trim|required');
        $this->form_validation->set_rules('shift', 'shift', 'trim|required');
        $this->form_validation->set_rules('id_warna', 'id warna', 'trim|required');
        $this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
        $this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
        $this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
        $this->form_validation->set_rules('target', 'target', 'trim|required');
        $this->form_validation->set_rules('hasil', 'hasil', 'trim|required');
        $this->form_validation->set_rules('rejected', 'rejected', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id_mesin_polybag', 'id_mesin_polybag', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "polybag.xls";
        $judul = "polybag";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Wo");
        xlsWriteLabel($tablehead, $kolomhead++, "Operator");
        xlsWriteLabel($tablehead, $kolomhead++, "Customer");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
        xlsWriteLabel($tablehead, $kolomhead++, "Shift");
        xlsWriteLabel($tablehead, $kolomhead++, "Warna");
        xlsWriteLabel($tablehead, $kolomhead++, "Bentuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");
        xlsWriteLabel($tablehead, $kolomhead++, "Lembar");
        xlsWriteLabel($tablehead, $kolomhead++, "Target");
        xlsWriteLabel($tablehead, $kolomhead++, "Hasil");
        xlsWriteLabel($tablehead, $kolomhead++, "Broke");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
        xlsWriteLabel($tablehead, $kolomhead++, "Persentase");

        foreach ($this->Polybag_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_wo);
            xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteNumber($tablebody, $kolombody++, $data->waktu);
            xlsWriteLabel($tablebody, $kolombody++, $data->shift);
            xlsWriteLabel($tablebody, $kolombody++, $data->warna);
            xlsWriteLabel($tablebody, $kolombody++, $data->bentuk);
            xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);
            xlsWriteLabel($tablebody, $kolombody++, $data->lembar);
            xlsWriteLabel($tablebody, $kolombody++, $data->target);
            xlsWriteLabel($tablebody, $kolombody++, $data->hasil);
            xlsWriteLabel($tablebody, $kolombody++, $data->rejected);
            xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
            xlsWriteLabel($tablebody, $kolombody++, $data->persentase);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function autofill()
    {
        $no_wo = $_GET['no_wo'];
        $operator = $this->db->query(
            "select *
            from
            (
                select operator_mesin.no_wo, customer.nama_customer, warna.warna, bentuk.bentuk, ukuran.ukuran, lembar_pack.lembar
                from operator_mesin
                join customer ON operator_mesin.id_customer = customer.id_customer
                join warna ON operator_mesin.id_warna = warna.id_warna
                join bentuk ON operator_mesin.id_bentuk = bentuk.id_bentuk
                join ukuran ON operator_mesin.id_ukuran = ukuran.id_ukuran
                join lembar_pack ON operator_mesin.id_lembar = lembar_pack.id_lembar
    
                union all
                select tbl_repack.no_wo, customer.nama_customer, warna.warna, bentuk.bentuk, ukuran.ukuran, lembar_pack.lembar
                from tbl_repack
                join customer ON tbl_repack.id_customer = customer.id_customer
                join warna ON tbl_repack.id_warna = warna.id_warna
                join bentuk ON tbl_repack.id_bentuk = bentuk.id_bentuk
                join ukuran ON tbl_repack.id_ukuran = ukuran.id_ukuran
                join lembar_pack ON tbl_repack.id_lembar = lembar_pack.id_lembar
            ) H
            
            WHERE H.no_wo = '$no_wo'"
        )->row_array();
        $data = array(
            // 'shift'        =>  $operator['shift'],
            'id_customer'  =>  $operator['nama_customer'],
            'id_warna'     =>  $operator['warna'],
            'id_bentuk'    =>  $operator['bentuk'],
            'id_lembar'    =>  $operator['lembar'],
            'id_ukuran'    =>  $operator['ukuran'],
            // 'hasil'       =>  $operator['hasil'],
        );
        echo json_encode($data);
    }
}

/* End of file Mesinpolybag.php */
/* Location: ./application/controllers/Mesinpolybag.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-15 11:07:13 */
/* http://harviacode.com */