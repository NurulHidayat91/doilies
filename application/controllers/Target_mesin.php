<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Target_mesin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Target_mesin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/target_mesin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/target_mesin/index/';
            $config['first_url'] = base_url() . 'index.php/target_mesin/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Target_mesin_model->total_rows($q);
        $target_mesin = $this->Target_mesin_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'target_mesin_data' => $target_mesin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','target_mesin/target_mesin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Target_mesin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_target_mesin' => $row->id_target_mesin,
		'id_bentuk' => $row->id_bentuk,
		'id_ukuran' => $row->id_ukuran,
		'id_lembar' => $row->id_lembar,
		'id_speed_mesin' => $row->id_speed_mesin,
		'target_mesin' => $row->target_mesin,
	    );
            $this->template->load('template','target_mesin/target_mesin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('target_mesin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('target_mesin/create_action'),
	    'id_target_mesin' => set_value('id_target_mesin'),
	    'id_bentuk' => set_value('id_bentuk'),
	    'id_ukuran' => set_value('id_ukuran'),
	    'id_lembar' => set_value('id_lembar'),
	    'id_speed_mesin' => set_value('id_speed_mesin'),
	    'target_mesin' => set_value('target_mesin'),
	);
        $this->template->load('template','target_mesin/target_mesin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_bentuk' => $this->input->post('id_bentuk',TRUE),
		'id_ukuran' => $this->input->post('id_ukuran',TRUE),
		'id_lembar' => $this->input->post('id_lembar',TRUE),
		'id_speed_mesin' => $this->input->post('id_speed_mesin',TRUE),
		'target_mesin' => $this->input->post('target_mesin',TRUE),
	    );

            $this->Target_mesin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('target_mesin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Target_mesin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('target_mesin/update_action'),
		'id_target_mesin' => set_value('id_target_mesin', $row->id_target_mesin),
		'id_bentuk' => set_value('id_bentuk', $row->id_bentuk),
		'id_ukuran' => set_value('id_ukuran', $row->id_ukuran),
		'id_lembar' => set_value('id_lembar', $row->id_lembar),
		'id_speed_mesin' => set_value('id_speed_mesin', $row->id_speed_mesin),
		'target_mesin' => set_value('target_mesin', $row->target_mesin),
	    );
            $this->template->load('template','target_mesin/target_mesin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('target_mesin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_target_mesin', TRUE));
        } else {
            $data = array(
		'id_bentuk' => $this->input->post('id_bentuk',TRUE),
		'id_ukuran' => $this->input->post('id_ukuran',TRUE),
		'id_lembar' => $this->input->post('id_lembar',TRUE),
		'id_speed_mesin' => $this->input->post('id_speed_mesin',TRUE),
		'target_mesin' => $this->input->post('target_mesin',TRUE),
	    );

            $this->Target_mesin_model->update($this->input->post('id_target_mesin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('target_mesin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Target_mesin_model->get_by_id($id);

        if ($row) {
            $this->Target_mesin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('target_mesin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('target_mesin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_bentuk', 'id bentuk', 'trim|required');
	$this->form_validation->set_rules('id_ukuran', 'id ukuran', 'trim|required');
	$this->form_validation->set_rules('id_lembar', 'id lembar', 'trim|required');
	$this->form_validation->set_rules('id_speed_mesin', 'id speed mesin', 'trim|required');
	$this->form_validation->set_rules('target_mesin', 'target mesin', 'trim|required');

	$this->form_validation->set_rules('id_target_mesin', 'id_target_mesin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "target_mesin.xls";
        $judul = "target_mesin";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Bentuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Ukuran");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Lembar");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Speed Mesin");
	xlsWriteLabel($tablehead, $kolomhead++, "Target Mesin");

	foreach ($this->Target_mesin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_bentuk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_ukuran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_lembar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_speed_mesin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->target_mesin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=target_mesin.doc");

        $data = array(
            'target_mesin_data' => $this->Target_mesin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('target_mesin/target_mesin_doc',$data);
    }

}

/* End of file Target_mesin.php */
/* Location: ./application/controllers/Target_mesin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-09-18 06:06:16 */
/* http://harviacode.com */