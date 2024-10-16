<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reapack_model extends CI_Model
{

    public $table = 'tbl_repack';
    public $id = 'id_repack';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = tbl_repack.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = tbl_repack.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = tbl_repack.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = tbl_repack.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = tbl_repack.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = tbl_repack.id_ukuran', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = tbl_repack.id_customer', 'left');

        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_repack', $q);
        $this->db->or_like('tanggal_terima', $q);
        $this->db->or_like('subjek_email', $q);
        $this->db->or_like('no_wo', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('id_customer', $q);
        $this->db->or_like('kode_item', $q);
        $this->db->or_like('id_bentuk', $q);
        $this->db->or_like('id_ukuran', $q);
        $this->db->or_like('id_lembar', $q);
        $this->db->or_like('id_grade', $q);
        $this->db->or_like('id_gsm', $q);
        $this->db->or_like('id_warna', $q);
        $this->db->or_like('pack', $q);
        $this->db->or_like('warna_inner', $q);
        $this->db->or_like('id_pattern', $q);
        $this->db->or_like('qty_box', $q);
        $this->db->or_like('barcode_inner', $q);
        $this->db->or_like('barcode_outer', $q);
        $this->db->or_like('hal', $q);
        $this->db->or_like('status_transfer', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('tbl_repack.id_repack', $q);
        $this->db->or_like('tbl_repack.tanggal_terima', $q);
        $this->db->or_like('tbl_repack.subjek_email', $q);
        $this->db->or_like('tbl_repack.no_wo', $q);
        $this->db->or_like('tbl_repack.id_user', $q);
        $this->db->or_like('tbl_repack.id_customer', $q);
        $this->db->or_like('tbl_repack.kode_item', $q);
        $this->db->or_like('tbl_repack.id_bentuk', $q);
        $this->db->or_like('tbl_repack.id_ukuran', $q);
        $this->db->or_like('tbl_repack.id_lembar', $q);
        $this->db->or_like('tbl_repack.id_grade', $q);
        $this->db->or_like('tbl_repack.id_gsm', $q);
        $this->db->or_like('tbl_repack.id_warna', $q);
        $this->db->or_like('tbl_repack.pack', $q);
        $this->db->or_like('tbl_repack.warna_inner', $q);
        $this->db->or_like('tbl_repack.id_pattern', $q);
        $this->db->or_like('tbl_repack.qty_box', $q);
        $this->db->or_like('tbl_repack.barcode_inner', $q);
        $this->db->or_like('tbl_repack.barcode_outer', $q);
        $this->db->or_like('tbl_repack.hal', $q);
        $this->db->or_like('tbl_repack.status_transfer', $q);

        $this->db->join('customer', 'customer.id_customer = tbl_repack.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = tbl_repack.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = tbl_repack.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = tbl_repack.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = tbl_repack.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = tbl_repack.id_ukuran', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = tbl_repack.id_pattern', 'left');
        $this->db->join('grade', 'grade.id_grade = tbl_repack.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = tbl_repack.id_gsm', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //LAPORAN REPACK
    public function get_all_reapack($dari, $sampai, $no_wo)
    {
        $this->db->select('tbl_repack.*, customer.nama_customer, warna.warna, bentuk.bentuk, lembar_pack.lembar, ukuran.ukuran, pattern.nama_pattern, grade.grade, gsm.gsm');
        $this->db->from('tbl_repack');
        $this->db->join('customer', 'customer.id_customer = tbl_repack.id_customer', 'left');
        // $this->db->join('tbl_user', 'tbl_user.id_users = tbl_repack.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = tbl_repack.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = tbl_repack.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = tbl_repack.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = tbl_repack.id_ukuran', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = tbl_repack.id_pattern', 'left');
        $this->db->join('grade', 'grade.id_grade = tbl_repack.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = tbl_repack.id_gsm', 'left');
        $this->db->where('tbl_repack.created >=', $dari);
        $this->db->where('tbl_repack.created <=', $sampai);
        $this->db->like('no_wo', $no_wo);

        $this->db->order_by('tbl_repack.created', 'desc');
        return $this->db->get();
        // die($this->db->last_query());
    }
}

/* End of file Reapack_model.php */
/* Location: ./application/models/Reapack_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-12 04:53:10 */
/* http://harviacode.com */