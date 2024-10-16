<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transfer_fg_model extends CI_Model
{

    public $table = 'transfer_fg';
    public $id = 'id_transfer_fg';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = transfer_fg.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = transfer_fg.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = transfer_fg.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = transfer_fg.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = transfer_fg.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = transfer_fg.id_ukuran', 'left');
        $this->db->join('grade', 'grade.id_grade = transfer_fg.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = transfer_fg.id_gsm', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = transfer_fg.id_pattern', 'left');


        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = transfer_fg.id_customer', 'left');
        $this->db->join('warna', 'warna.id_warna = transfer_fg.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = transfer_fg.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = transfer_fg.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = transfer_fg.id_ukuran', 'left');
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_transfer_fg', $q);
        $this->db->or_like('no_wo', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('waktu', $q);
        $this->db->or_like('shift', $q);
        $this->db->or_like('id_warna', $q);
        $this->db->or_like('id_bentuk', $q);
        $this->db->or_like('id_ukuran', $q);
        $this->db->or_like('id_lembar', $q);
        $this->db->or_like('box_qty', $q);
        $this->db->or_like('box_kg', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('id_customer', $q);
        $this->db->or_like('id_grade', $q);
        $this->db->or_like('id_gsm', $q);
        $this->db->or_like('no_stock', $q);
        $this->db->or_like('kode_sistem', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('transfer_fg.id_transfer_fg', $q);
        $this->db->or_like('transfer_fg.no_wo', $q);
        $this->db->or_like('transfer_fg.id_user', $q);
        $this->db->or_like('transfer_fg.tanggal', $q);
        $this->db->or_like('transfer_fg.waktu', $q);
        $this->db->or_like('transfer_fg.shift', $q);
        $this->db->or_like('transfer_fg.id_warna', $q);
        $this->db->or_like('transfer_fg.id_bentuk', $q);
        $this->db->or_like('transfer_fg.id_ukuran', $q);
        $this->db->or_like('transfer_fg.id_lembar', $q);
        $this->db->or_like('transfer_fg.box_qty', $q);
        $this->db->or_like('transfer_fg.box_kg', $q);
        $this->db->or_like('transfer_fg.keterangan', $q);
        $this->db->or_like('transfer_fg.id_customer', $q);
        $this->db->or_like('transfer_fg.id_grade', $q);
        $this->db->or_like('transfer_fg.id_gsm', $q);
        $this->db->or_like('transfer_fg.no_stock', $q);
        $this->db->or_like('transfer_fg.kode_sistem', $q);
        $this->db->join('customer', 'customer.id_customer = transfer_fg.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = transfer_fg.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = transfer_fg.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = transfer_fg.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = transfer_fg.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = transfer_fg.id_ukuran', 'left');
        $this->db->join('grade', 'grade.id_grade = transfer_fg.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = transfer_fg.id_gsm', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = transfer_fg.id_pattern', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_peruser($limit, $start = 0, $q = NULL)
    {
        $this->db->where('transfer_fg.id_user', $this->session->userdata('id_users'));
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('transfer_fg.id_transfer_fg', $q);
        // $this->db->or_like('transfer_fg.no_wo', $q);
        // $this->db->or_like('transfer_fg.id_user', $q);
        // $this->db->or_like('transfer_fg.tanggal', $q);
        // $this->db->or_like('transfer_fg.waktu', $q);
        // $this->db->or_like('transfer_fg.shift', $q);
        // $this->db->or_like('transfer_fg.id_warna', $q);
        // $this->db->or_like('transfer_fg.id_bentuk', $q);
        // $this->db->or_like('transfer_fg.id_ukuran', $q);
        // $this->db->or_like('transfer_fg.id_lembar', $q);
        // $this->db->or_like('transfer_fg.box_qty', $q);
        // $this->db->or_like('transfer_fg.box_kg', $q);
        // $this->db->or_like('transfer_fg.keterangan', $q);
        // $this->db->or_like('transfer_fg.id_customer', $q);
        // $this->db->or_like('transfer_fg.id_grade', $q);
        // $this->db->or_like('transfer_fg.id_gsm', $q);
        // $this->db->or_like('transfer_fg.no_stock', $q);
        // $this->db->or_like('transfer_fg.kode_sistem', $q);
        $this->db->join('customer', 'customer.id_customer = transfer_fg.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = transfer_fg.id_user', 'left');
        $this->db->join('warna', 'warna.id_warna = transfer_fg.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = transfer_fg.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = transfer_fg.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = transfer_fg.id_ukuran', 'left');
        $this->db->join('grade', 'grade.id_grade = transfer_fg.id_grade', 'left');
        $this->db->join('gsm', 'gsm.id_gsm = transfer_fg.id_gsm', 'left');
        $this->db->join('pattern', 'pattern.id_pattern = transfer_fg.id_pattern', 'left');
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
}

/* End of file Transfer_fg_model.php */
/* Location: ./application/models/Transfer_fg_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-21 08:35:06 */
/* http://harviacode.com */