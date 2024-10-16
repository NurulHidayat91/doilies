<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    function get_all_potongan($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('potongan.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk, lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('potongan');
        // $this->db->join('customer', 'potongan.customer_id = customer.customer_id', 'left');
        $this->db->join('customer', 'customer.id_customer = potongan.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = potongan.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = potongan.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = potongan.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = potongan.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = potongan.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = potongan.id_ukuran', 'left');

        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("potongan.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }

        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }

    function get_all_mesingeprek($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        // $this->db->select('mesin_geprek.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk, mesin.kode_mesin, lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('mesin_geprek');

        $this->db->join('customer', 'customer.id_customer = mesin_geprek.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_geprek.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_geprek.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_geprek.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_geprek.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_geprek.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_geprek.id_ukuran', 'left');
        $this->db->join('mesin', 'mesin.id_mesin = mesin_geprek.id_mesin', 'left');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("mesin_geprek.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }

        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }
    function get_all_sealer($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('mesin_sealer.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk,lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('mesin_sealer');

        $this->db->join('customer', 'customer.id_customer = mesin_sealer.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_sealer.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_sealer.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_sealer.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_sealer.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_sealer.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_sealer.id_ukuran', 'left');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("mesin_sealer.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }

        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }
    function get_all_oven($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('mesin_oven.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk,lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('mesin_oven');

        $this->db->join('customer', 'customer.id_customer = mesin_oven.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_oven.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_oven.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_oven.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_oven.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_oven.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_oven.id_ukuran', 'left');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("mesin_oven.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }
        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }

    function get_all_polybag($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('polybag.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk,lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('polybag');

        $this->db->join('customer', 'customer.id_customer = polybag.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = polybag.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = polybag.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = polybag.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = polybag.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = polybag.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = polybag.id_ukuran', 'left');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("polybag.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }

        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }


    function get_all_packing_box($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('packingbox.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk,lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('packingbox');

        $this->db->join('customer', 'customer.id_customer = packingbox.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = packingbox.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = packingbox.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = packingbox.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = packingbox.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = packingbox.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = packingbox.id_ukuran', 'left');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("packingbox.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }

        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }


    function get_all_laporans_ticker($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('sticker.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk,lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('sticker');

        $this->db->join('customer', 'customer.id_customer = sticker.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = sticker.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = sticker.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = sticker.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = sticker.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = sticker.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = sticker.id_ukuran', 'left');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("sticker.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }
        if (!empty($post['full_name'])) {
            $this->db->like("full_name", $post['full_name']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }
    function get_all_laporans_transferFg($limit = null, $start = null)
    {

        $post = $this->session->userdata('search');

        $this->db->select('transfer_fg.*, customer.nama_customer, tbl_user.full_name, warna.warna, grade.grade, gsm.gsm, pattern.nama_pattern, bentuk.bentuk,lembar_pack.lembar, ukuran.ukuran');
        $this->db->from('transfer_fg');

        $this->db->join('customer', 'customer.id_customer = transfer_fg.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = transfer_fg.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = transfer_fg.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = transfer_fg.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = transfer_fg.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = transfer_fg.id_ukuran', 'left');
        $this->db->join('grade', 'grade.id_grade = transfer_fg.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = transfer_fg.id_gsm', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = transfer_fg.id_pattern', 'left');

        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("transfer_fg.tanggal BETWEEN '$post[date1]' AND '$post[date2]'");
        }

        if (!empty($post['no_wo'])) {
            $this->db->like("no_wo", $post['no_wo']);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal', 'desc');


        $query = $this->db->get();
        return $query;
    }


    //LAPORAN OREPERTOR MESIN
    public function get_all_operatormesin($dari, $sampai, $no_wo)
    {
        $this->db->select('operator_mesin.*, customer.nama_customer, tbl_user.full_name, warna.warna, bentuk.bentuk, mesin.kode_mesin, lembar_pack.lembar, ukuran.ukuran, pattern.nama_pattern, grade.grade, gsm.gsm, speed_mesin.speed_mesin, downtime.kode, downtime.keterangan, d2.keterangan as ket2, jam.jam, non_passed.kode_non_passed');
        $this->db->from('operator_mesin');
        $this->db->join('customer', 'customer.id_customer = operator_mesin.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = operator_mesin.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = operator_mesin.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = operator_mesin.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = operator_mesin.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = operator_mesin.id_ukuran', 'left');
        $this->db->join('mesin', 'mesin.id_mesin = operator_mesin.id_mesin', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = operator_mesin.id_pattern', 'left');
        $this->db->join('grade', 'grade.id_grade = operator_mesin.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = operator_mesin.id_gsm', 'left');
        $this->db->join('speed_mesin', 'speed_mesin.id_speed_mesin = operator_mesin.id_speed', 'left');
        $this->db->join('downtime', 'downtime.id_downtime = operator_mesin.id_downtime', 'left');
        $this->db->join('downtime d2', 'd2.id_downtime = operator_mesin.downtime2', 'left');
        $this->db->join('downtime d3', 'd3.id_downtime = operator_mesin.downtime3', 'left');
        $this->db->join('downtime d4', 'd4.id_downtime = operator_mesin.downtime4', 'left');
        $this->db->join('jam', 'jam.id_jam = operator_mesin.id_jam', 'left');
        $this->db->join('non_passed', 'non_passed.id_non_passed = operator_mesin.nonpassed_kode', 'left');

        $this->db->where('tanggal >=', $dari);
        $this->db->where('tanggal <=', $sampai);
        $this->db->like('no_wo', $no_wo);

        $this->db->order_by('tanggal', 'desc');
        return $this->db->get();
        // die($this->db->last_query());
    }


    //LAPORAN HARIAN PACKAGING
    public function get_all_prosesadmin($dari, $sampai, $no_wo)
    {
        $this->db->select('proses_admin.*, customer.nama_customer, tbl_user.full_name, warna.warna, bentuk.bentuk, mesin.kode_mesin, lembar_pack.lembar, ukuran.ukuran, waktu.waktu, jenis_pekerjaan.nama_pekerjaan, speed_mesin.speed_mesin,');
        $this->db->from('proses_admin');
        $this->db->join('customer', 'customer.id_customer = proses_admin.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = proses_admin.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = proses_admin.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = proses_admin.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = proses_admin.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = proses_admin.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = proses_admin.id_ukuran', 'left');
        $this->db->join('mesin', 'mesin.id_mesin = proses_admin.id_mesin', 'left');
        $this->db->join('jenis_pekerjaan', 'jenis_pekerjaan.id_jenis_pekerjaan = proses_admin.id_jenis_pekerjaan', 'left');
        $this->db->join('speed_mesin', 'speed_mesin.id_speed_mesin = proses_admin.id_speed_mesin', 'left');

        $this->db->where('tanggal >=', $dari);
        $this->db->where('tanggal <=', $sampai);
        $this->db->like('no_wo', $no_wo);

        $this->db->order_by('tanggal', 'desc');
        return $this->db->get();
        // die($this->db->last_query());
    }


    // LAPORAN REKAP OPERATOR
    public function get_all_rekap_operator($awal, $sampai, $fullname)
    {

        $query = $this->db->query(" SELECT H.no_wo, H.tanggal, H.shift, H.full_name, H.nama_customer, H.waktu, H.warna, H.bentuk, H.ukuran, H.lembar, H.target, H.hasil, H.keterangan, H.persentase
FROM
(
    
    SELECT no_wo, keterangan, persentase, shift, target, hasil,tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk, lembar_pack.lembar, customer.nama_customer, tbl_user.full_name FROM potongan
    JOIN tbl_user ON potongan.id_user= tbl_user.id_users
    JOIN waktu ON potongan.id_waktu= waktu.id_waktu
    JOIN warna ON potongan.id_warna= warna.id_warna
    JOIN bentuk ON potongan.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON potongan.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON potongan.id_lembar= lembar_pack.id_lembar
    JOIN customer ON potongan.id_customer= customer.id_customer
    
    UNION ALL
    SELECT no_wo, keterangan, persentase, shift, target, hasil,tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk, lembar_pack.lembar, customer.nama_customer, tbl_user.full_name FROM mesin_geprek
    JOIN tbl_user ON mesin_geprek.id_user= tbl_user.id_users
    JOIN waktu ON mesin_geprek.id_waktu= waktu.id_waktu
    JOIN warna ON mesin_geprek.id_warna= warna.id_warna
    JOIN bentuk ON mesin_geprek.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON mesin_geprek.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON mesin_geprek.id_lembar= lembar_pack.id_lembar
    JOIN customer ON mesin_geprek.id_customer= customer.id_customer
    
    UNION ALL
    SELECT no_wo, keterangan, persentase, shift, target, hasil,tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk,lembar_pack.lembar, customer.nama_customer, tbl_user.full_name FROM mesin_sealer
    JOIN tbl_user ON mesin_sealer.id_user= tbl_user.id_users
    JOIN waktu ON mesin_sealer.id_waktu= waktu.id_waktu
    JOIN warna ON mesin_sealer.id_warna= warna.id_warna
    JOIN bentuk ON mesin_sealer.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON mesin_sealer.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON mesin_sealer.id_lembar= lembar_pack.id_lembar
    JOIN customer ON mesin_sealer.id_customer = customer.id_customer
    
    UNION ALL
    SELECT no_wo, keterangan, persentase, shift, target, hasil, tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk, lembar_pack.lembar, customer.nama_customer, tbl_user.full_name FROM mesin_oven
    JOIN tbl_user ON mesin_oven.id_user= tbl_user.id_users
    JOIN waktu ON mesin_oven.id_waktu= waktu.id_waktu
    JOIN warna ON mesin_oven.id_warna= warna.id_warna
    JOIN bentuk ON mesin_oven.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON mesin_oven.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON mesin_oven.id_lembar= lembar_pack.id_lembar
    JOIN customer ON mesin_oven.id_customer= customer.id_customer
    
    UNION ALL
    SELECT no_wo, keterangan, persentase, shift, target, hasil, tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk, lembar_pack.lembar, customer.nama_customer, tbl_user.full_name  FROM polybag
    JOIN tbl_user ON polybag.id_user= tbl_user.id_users
    JOIN waktu ON polybag.id_waktu= waktu.id_waktu
    JOIN warna ON polybag.id_warna= warna.id_warna
    JOIN bentuk ON polybag.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON polybag.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON polybag.id_lembar= lembar_pack.id_lembar
    JOIN customer ON polybag.id_customer= customer.id_customer
    
    UNION ALL
    SELECT no_wo, keterangan, persentase, shift, target, hasil,tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk, lembar_pack.lembar, customer.nama_customer, tbl_user.full_name  FROM packingbox
    JOIN tbl_user ON packingbox.id_user= tbl_user.id_users
    JOIN waktu ON packingbox.id_waktu= waktu.id_waktu
    JOIN warna ON packingbox.id_warna= warna.id_warna
    JOIN bentuk ON packingbox.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON packingbox.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON packingbox.id_lembar= lembar_pack.id_lembar
    JOIN customer ON packingbox.id_customer= customer.id_customer

    UNION ALL
    SELECT no_wo, keterangan, persentase, shift, target, hasil, tanggal, warna.warna, waktu.waktu, ukuran.ukuran,bentuk.bentuk, lembar_pack.lembar, customer.nama_customer, tbl_user.full_name  FROM sticker
    JOIN tbl_user ON sticker.id_user= tbl_user.id_users
    JOIN waktu ON sticker.id_waktu= waktu.id_waktu
    JOIN warna ON sticker.id_warna= warna.id_warna
    JOIN bentuk ON sticker.id_bentuk= bentuk.id_bentuk
    JOIN ukuran ON sticker.id_ukuran= ukuran.id_ukuran
    JOIN lembar_pack ON sticker.id_lembar= lembar_pack.id_lembar
    JOIN customer ON sticker.id_customer= customer.id_customer
)H

    where H.tanggal >= '$awal' and H.tanggal <= '$sampai' AND H.full_name = '$fullname'
    order by H.waktu ASC



");

        return $query;
    }
}

/* End of file Laporan.php */
