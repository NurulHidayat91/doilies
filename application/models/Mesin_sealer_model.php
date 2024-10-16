<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mesin_sealer_model extends CI_Model
{

    public $table = 'mesin_sealer';
    public $id = 'id_mesin_sealer';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = mesin_sealer.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_sealer.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_sealer.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_sealer.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_sealer.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_sealer.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_sealer.id_ukuran', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = mesin_sealer.id_customer', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_sealer.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_sealer.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_sealer.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_sealer.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_sealer.id_ukuran', 'left');
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_mesin_sealer', $q);
        $this->db->or_like('no_wo', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('id_customer', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('id_waktu', $q);
        $this->db->or_like('no_mesin', $q);
        $this->db->or_like('shift', $q);
        $this->db->or_like('id_warna', $q);
        $this->db->or_like('id_bentuk', $q);
        $this->db->or_like('id_ukuran', $q);
        $this->db->or_like('id_lembar', $q);
        $this->db->or_like('target', $q);
        $this->db->or_like('hasil', $q);
        $this->db->or_like('rejected', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('mesin_sealer.id_mesin_sealer', $q);
        $this->db->or_like('mesin_sealer.no_wo', $q);
        $this->db->or_like('mesin_sealer.id_user', $q);
        $this->db->or_like('mesin_sealer.id_customer', $q);
        $this->db->or_like('mesin_sealer.tanggal', $q);
        $this->db->or_like('mesin_sealer.id_waktu', $q);
        $this->db->or_like('mesin_sealer.no_mesin', $q);
        $this->db->or_like('mesin_sealer.shift', $q);
        $this->db->or_like('mesin_sealer.id_warna', $q);
        $this->db->or_like('mesin_sealer.id_bentuk', $q);
        $this->db->or_like('mesin_sealer.id_ukuran', $q);
        $this->db->or_like('mesin_sealer.id_lembar', $q);
        $this->db->or_like('target', $q);
        $this->db->or_like('hasil', $q);
        $this->db->or_like('rejected', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->join('customer', 'customer.id_customer = mesin_sealer.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_sealer.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_sealer.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_sealer.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_sealer.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_sealer.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_sealer.id_ukuran', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit PERUSER and search
    function get_limit_peruser($limit, $start = 0, $q = NULL)
    {
        $this->db->select('mesin_sealer.*, customer.nama_customer, tbl_user.full_name, waktu.waktu, warna.warna, bentuk.bentuk, lembar_pack.lembar, ukuran.ukuran');
        $this->db->like('mesin_sealer.tanggal', $q);
        $this->db->where('mesin_sealer.id_user', $this->session->userdata('id_users'));
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('mesin_sealer.id_mesin_sealer', $q);
        // $this->db->or_like('mesin_sealer.no_wo', $q);
        // $this->db->or_like('mesin_sealer.id_user', $q);
        // $this->db->or_like('mesin_sealer.id_customer', $q);
        // $this->db->or_like('mesin_sealer.tanggal', $q);
        // $this->db->or_like('mesin_sealer.id_waktu', $q);
        // $this->db->or_like('mesin_sealer.no_mesin', $q);
        // $this->db->or_like('mesin_sealer.shift', $q);
        // $this->db->or_like('mesin_sealer.id_warna', $q);
        // $this->db->or_like('mesin_sealer.id_bentuk', $q);
        // $this->db->or_like('mesin_sealer.id_ukuran', $q);
        // $this->db->or_like('mesin_sealer.id_lembar', $q);
        // $this->db->or_like('target', $q);
        // $this->db->or_like('hasil', $q);
        // $this->db->or_like('rejected', $q);
        // $this->db->or_like('keterangan', $q);
        $this->db->join('customer', 'customer.id_customer = mesin_sealer.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_sealer.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_sealer.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_sealer.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_sealer.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_sealer.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_sealer.id_ukuran', 'left');
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

/* End of file Mesin_sealer_model.php */
/* Location: ./application/models/Mesin_sealer_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-16 05:19:28 */
/* http://harviacode.com */