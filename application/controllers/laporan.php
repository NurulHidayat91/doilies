<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('laporan_model');
        $this->load->model('customer_model');
    }

    //LAPORAN POTONGAN
    public function potongan()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }


        $config['base_url'] = site_url('laporan/potongan');
        $config['total_rows'] = $this->laporan_model->get_all_potongan()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_potongan($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_potongan', $data);
    }

    public function export_excel_potongan()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_potongan()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Potongan");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Potongan" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Potongan");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function laporangeprek()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }


        $config['base_url'] = site_url('laporan/laporangeprek');
        $config['total_rows'] = $this->laporan_model->get_all_mesingeprek()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_mesingeprek($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_mesingeprek', $data);
    }

    public function export_excel_geprek()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_mesingeprek()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Mesin Geprek");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator1');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Operator2');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Mesin');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('R1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->operator2);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->kode_mesin);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Mesin Geprek" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Mesin Geprek");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function laporansealer()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }


        $config['base_url'] = site_url('laporan/laporansealer');
        $config['total_rows'] = $this->laporan_model->get_all_sealer()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_sealer($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_sealer', $data);
    }

    public function export_excel_sealer()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_sealer()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Mesin Sealer");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'No Mesin');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->no_mesin);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Mesin Sealer" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Mesin Sealer");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function laporan_oven()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('laporan/laporan_oven');
        $config['total_rows'] = $this->laporan_model->get_all_oven()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_oven($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_mc_oven', $data);
    }

    public function export_excel_oven()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_oven()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Mesin Oven");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'No Mesin');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->no_mesin);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Mesin Oven" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Mesin Oven");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function laporan_polybag()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('laporan/laporan_polybag');
        $config['total_rows'] = $this->laporan_model->get_all_polybag()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_polybag($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_polybag', $data);
    }

    public function export_excel_polybag()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_polybag()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Mesin Polybag");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Mesin Polybag" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Mesin Polybag");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function laporan_packing_box()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('laporan/laporan_packaging_boxss');
        $config['total_rows'] = $this->laporan_model->get_all_packing_box()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_packing_box($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_packing_box', $data);
    }

    public function export_excel_packing_box()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_packing_box()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Mesin Packing Box");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Mesin Packaging Box" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Mesin Packaging Box");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function laporan_sticker()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('laporan/laporan_packaging_boxss');
        $config['total_rows'] = $this->laporan_model->get_all_laporans_ticker()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_laporans_ticker($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_sticker', $data);
    }

    public function export_excel_laporan_sticker()
    {

        // $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $this->laporan_model->get_all_laporans_ticker()->result();
        // $data['post'] = $post;

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nurul Hidayat");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nurul Hidayat");
        $objPHPExcel->getProperties()->setTitle("Laporan Sticker");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Waktu');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Shift');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Operator');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'No Wo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Customer');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Warna');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Bentuk');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Lembar');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Target');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Hasil');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Broke');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Keterangan');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Persentase');

        $baris = 2;
        $x = 1;

        foreach ($data['row'] as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $value->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $value->waktu);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $value->shift);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $value->full_name);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $value->no_wo);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $value->nama_customer);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $value->warna);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $value->bentuk);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $value->ukuran);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $value->lembar);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $value->target);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $baris, $value->hasil);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $baris, $value->rejected);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $baris, $value->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $baris, $value->persentase);

            $x++;
            $baris++;
        }

        $filename = "Laporan Sticker" . date("d-m-Y-H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan Sticker");

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function laporan_transfer_fg()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('laporan/laporan_transfer_fg');
        $config['total_rows'] = $this->laporan_model->get_all_laporans_transferFg()->num_rows();
        $config['per_page'] = 50;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        // $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->laporan_model->get_all_laporans_transferFg($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'laporan/lap_transfer_fg', $data);
    }

    public function export_excel_transferFG()
    {
        $data['row'] = $this->laporan_model->get_all_laporans_transferFg()->result();

        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Transfer FG.xls");
        }
        $this->load->view('laporan/lap_export_transferFG', $data);
    }


    //CETAK LAPOARAN REKAP OPERATOR

    function cetak()
    {
        $this->template->load('template', 'laporan/cetak');
    }

    //PROSES CETAK LAPORAN 
    function proses_cetak()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $fullname = $this->input->post('full_name');
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['full_name'] = $fullname;
        $data['row'] = $this->laporan_model->get_all_rekap_operator($dari, $sampai, $fullname)->result();
        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Rekap Kerja operator.xls");
        }
        $this->load->view('laporan/lap_export_rekapOperator', $data);
    }
}


/* End of file Controllername.php */
