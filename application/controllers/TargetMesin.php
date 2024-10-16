<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TargetMesin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('TargetMesin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/targetmesin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/targetmesin/index/';
            $config['first_url'] = base_url() . 'index.php/targetmesin/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->TargetMesin_model->total_rows($q);
        $targetmesin = $this->TargetMesin_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'targetmesin_data' => $targetmesin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'targetmesin/tbl_target_mesin_list', $data);
    }

    public function read($id)
    {
        $row = $this->TargetMesin_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_targetMesin' => $row->id_targetMesin,
                'id_bentuk' => $row->id_bentuk,
                'id_lembar' => $row->id_lembar,
                'id_ukuran' => $row->id_ukuran,
                'id_speed_mesin' => $row->id_speed_mesin,
                'id_gsm' => $row->id_gsm,
                'lebar_roll' => $row->lebar_roll,
                'panjang_pot' => $row->panjang_pot,
                'jml_gambar' => $row->jml_gambar,
                'kebutuhan_bahan' => $row->kebutuhan_bahan,
                'kg_perpack' => $row->kg_perpack,
                'jml_orang' => $row->jml_orang,
                'targetMesin' => $row->targetMesin,
            );
            $this->template->load('template', 'targetmesin/tbl_target_mesin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('targetmesin'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('targetmesin/create_action'),
            'id_targetMesin' => set_value('id_targetMesin'),
            'id_bentuk' => set_value('id_bentuk'),
            'id_warna' => set_value('id_warna'),
            'id_grade' => set_value('id_grade'),
            'id_lembar' => set_value('id_lembar'),
            'id_ukuran' => set_value('id_ukuran'),
            'id_speed_mesin' => set_value('id_speed_mesin'),
            'id_gsm' => set_value('id_gsm'),
            'lebar_roll' => set_value('lebar_roll'),
            'id_pattern' => set_value('id_pattern'),
            'panjang_pot' => set_value('panjang_pot'),
            'jml_gambar' => set_value('jml_gambar'),
            'kebutuhan_bahan' => set_value('kebutuhan_bahan'),
            'kg_perpack' => set_value('kg_perpack'),
            'jml_orang' => set_value('jml_orang'),
            'targetMesin' => set_value('targetMesin'),
        );
        $this->template->load('template', 'targetmesin/tbl_target_mesin_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_bentuk' => $this->input->post('id_bentuk', TRUE),
                'id_grade' => $this->input->post('id_grade', TRUE),
                'id_lembar' => $this->input->post('id_lembar', TRUE),
                'id_warna' => $this->input->post('id_warna', TRUE),
                'id_ukuran' => $this->input->post('id_ukuran', TRUE),
                'id_speed_mesin' => $this->input->post('id_speed_mesin', TRUE),
                'id_gsm' => $this->input->post('id_gsm', TRUE),
                'id_pattern' => $this->input->post('id_pattern', TRUE),
                'lebar_roll' => $this->input->post('lebar_roll', TRUE),
                'panjang_pot' => $this->input->post('panjang_pot', TRUE),
                'jml_gambar' => $this->input->post('jml_gambar', TRUE),
                'kebutuhan_bahan' => $this->input->post('kebutuhan_bahan', TRUE),
                'kg_perpack' => $this->input->post('kg_perpack', TRUE),
                'jml_orang' => $this->input->post('jml_orang', TRUE),
                'targetMesin' => $this->input->post('targetMesin', TRUE),
            );

            $this->TargetMesin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('targetmesin'));
        }
    }

    public function update($id)
    {
        $row = $this->TargetMesin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('targetmesin/update_action'),
                'id_targetMesin' => set_value('id_targetMesin', $row->id_targetMesin),
                'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
                'id_grade' => set_value('id_grade', $row->id_grade),
                'id_lembar' => set_value('id_lembar', $row->id_lembar),
                'id_warna' => set_value('id_warna', $row->id_warna),
                'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
                'id_speed_mesin' => set_value('id_speed_mesin', $row->id_speed_mesin),
                'id_gsm' => set_value('id_gsm', $row->id_gsm),
                'id_pattern' => set_value('id_pattern', $row->id_pattern),
                'lebar_roll' => set_value('lebar_roll', $row->lebar_roll),
                'panjang_pot' => set_value('panjang_pot', $row->panjang_pot),
                'jml_gambar' => set_value('jml_gambar', $row->jml_gambar),
                'kebutuhan_bahan' => set_value('kebutuhan_bahan', $row->kebutuhan_bahan),
                'kg_perpack' => set_value('kg_perpack', $row->kg_perpack),
                'jml_orang' => set_value('jml_orang', $row->jml_orang),
                'targetMesin' => set_value('targetMesin', $row->targetMesin),
            );
            $this->template->load('template', 'targetmesin/tbl_target_mesin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('targetmesin'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_targetMesin', TRUE));
        } else {
            $data = array(
                'id_bentuk' => $this->input->post('id_bentuk', TRUE),
                'id_grade' => $this->input->post('id_grade', TRUE),
                'id_lembar' => $this->input->post('id_lembar', TRUE),
                'id_warna' => $this->input->post('id_warna', TRUE),
                'id_ukuran' => $this->input->post('id_ukuran', TRUE),
                'id_speed_mesin' => $this->input->post('id_speed_mesin', TRUE),
                'id_gsm' => $this->input->post('id_gsm', TRUE),
                'id_pattern' => $this->input->post('id_pattern', TRUE),
                'lebar_roll' => $this->input->post('lebar_roll', TRUE),
                'panjang_pot' => $this->input->post('panjang_pot', TRUE),
                'jml_gambar' => $this->input->post('jml_gambar', TRUE),
                'kebutuhan_bahan' => $this->input->post('kebutuhan_bahan', TRUE),
                'kg_perpack' => $this->input->post('kg_perpack', TRUE),
                'jml_orang' => $this->input->post('jml_orang', TRUE),
                'targetMesin' => $this->input->post('targetMesin', TRUE),
                'updated' => date('Y-m-d:H-i-s'),
            );

            $this->TargetMesin_model->update($this->input->post('id_targetMesin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('targetmesin'));
        }
    }

    public function delete($id)
    {
        $row = $this->TargetMesin_model->get_by_id($id);

        if ($row) {
            $this->TargetMesin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('targetmesin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('targetmesin'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'trim|required');
        $this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
        $this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
        $this->form_validation->set_rules('id_speed_mesin', 'id speed mesin', 'trim|required');
        $this->form_validation->set_rules('id_gsm', 'id gsm', 'trim|required');
        $this->form_validation->set_rules('lebar_roll', 'lebar roll', 'trim|required');
        $this->form_validation->set_rules('panjang_pot', 'panjang pot', 'trim|required');
        $this->form_validation->set_rules('jml_gambar', 'jml gambar', 'trim|required');
        $this->form_validation->set_rules('kebutuhan_bahan', 'kebutuhan bahan', 'trim|required');
        $this->form_validation->set_rules('kg_perpack', 'kg perpack', 'trim|required');
        $this->form_validation->set_rules('jml_orang', 'jml orang', 'trim|required');
        $this->form_validation->set_rules('targetMesin', 'targetmesin', 'trim|required');

        $this->form_validation->set_rules('id_targetMesin', 'id_targetMesin', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_target_mesin.xls";
        $judul = "tbl_target_mesin";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id  Bentuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Lembar");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Ukuran");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Speed Mesin");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Gsm");
        xlsWriteLabel($tablehead, $kolomhead++, "Lebar Roll");
        xlsWriteLabel($tablehead, $kolomhead++, "Panjang Pot");
        xlsWriteLabel($tablehead, $kolomhead++, "Jml Gambar");
        xlsWriteLabel($tablehead, $kolomhead++, "Kebutuhan Bahan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kg Perpack");
        xlsWriteLabel($tablehead, $kolomhead++, "Jml Orang");
        xlsWriteLabel($tablehead, $kolomhead++, "TargetMesin");

        foreach ($this->TargetMesin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_bentuk);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_lembar);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_ukuran);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_speed_mesin);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_gsm);
            xlsWriteLabel($tablebody, $kolombody++, $data->lebar_roll);
            xlsWriteLabel($tablebody, $kolombody++, $data->panjang_pot);
            xlsWriteLabel($tablebody, $kolombody++, $data->jml_gambar);
            xlsWriteLabel($tablebody, $kolombody++, $data->kebutuhan_bahan);
            xlsWriteLabel($tablebody, $kolombody++, $data->kg_perpack);
            xlsWriteNumber($tablebody, $kolombody++, $data->jml_orang);
            xlsWriteLabel($tablebody, $kolombody++, $data->targetMesin);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file TargetMesin.php */
/* Location: ./application/controllers/TargetMesin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-08-28 09:36:28 */
/* http://harviacode.com */