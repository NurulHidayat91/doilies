<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Potongan_model extends CI_Model
{

    public $table = 'potongan';
    public $id = 'id_potongan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('potongan.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk, lembar_pack.lembar, ukuran.ukuran');

        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = potongan.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = potongan.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = potongan.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = potongan.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = potongan.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = potongan.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = potongan.id_ukuran', 'left');
        return $this->db->get($this->table)->result();
    }

    // get autofill
    // function get_autofill($no_wo)
    // {
    //     $this->db->select('potongan.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk, lembar_pack.lembar, ukuran.ukuran');

    //     $this->db->order_by($this->id, $this->order);
    //     $this->db->join('customer', 'customer.id_customer = potongan.id_customer', 'left');
    //     $this->db->join('tbl_user', 'tbl_user.id_users = potongan.id_user', 'left');
    //     $this->db->join('waktu', 'waktu.id_waktu = potongan.id_waktu', 'left');
    //     $this->db->join('warna', 'warna.id_warna = potongan.id_warna', 'left');
    //     $this->db->join('bentuk', 'bentuk.id_bentuk = potongan.id_bentuk', 'left');
    //     $this->db->join('lembar_pack', 'lembar_pack.id_lembar = potongan.id_lembar', 'left');
    //     $this->db->join('ukuran', 'ukuran.id_ukuran = potongan.id_ukuran', 'left');
    //     $this->db->where('no_wo', $no_wo);

    //     return $this->db->get($this->table)->row_array();
    // }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = potongan.id_customer', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = potongan.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = potongan.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = potongan.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = potongan.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = potongan.id_ukuran', 'left');

        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_potongan', $q);
        $this->db->or_like('no_wo', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('id_waktu', $q);
        $this->db->or_like('shift', $q);
        $this->db->or_like('id_warna', $q);
        $this->db->or_like('id_bentuk', $q);
        $this->db->or_like('id_ukuran', $q);
        $this->db->or_like('id_lembar', $q);
        $this->db->or_like('target', $q);
        $this->db->or_like('hasil', $q);
        $this->db->or_like('rejected', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('id_customer', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {

        $this->db->order_by($this->id, $this->order);
        $this->db->like('potongan.id_potongan', $q);
        $this->db->or_like('potongan.no_wo', $q);
        $this->db->or_like('tbl_user.full_name', $q);
        $this->db->or_like('potongan.tanggal', $q);
        $this->db->or_like('potongan.id_waktu', $q);
        $this->db->or_like('potongan.shift', $q);
        $this->db->or_like('potongan.id_warna', $q);
        $this->db->or_like('potongan.id_bentuk', $q);
        $this->db->or_like('potongan.id_ukuran', $q);
        $this->db->or_like('potongan.id_lembar', $q);
        $this->db->or_like('potongan.target', $q);
        $this->db->or_like('potongan.hasil', $q);
        $this->db->or_like('potongan.rejected', $q);
        $this->db->or_like('potongan.keterangan', $q);
        $this->db->or_like('potongan.id_customer', $q);
        $this->db->or_like('customer.nama_customer', $q);
        $this->db->or_like('lembar_pack.lembar', $q);
        $this->db->join('customer', 'customer.id_customer = potongan.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = potongan.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = potongan.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = potongan.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = potongan.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = potongan.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = potongan.id_ukuran', 'left');

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search per user
    function get_limit_peruser($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('potongan.tanggal', $q);
        // $this->db->like('potongan.id_potongan', $q);
        // $this->db->or_like('potongan.no_wo', $q);
        // $this->db->or_like('tbl_user.full_name', $q);
        // $this->db->or_like('customer.nama_customer', $q);

        // $this->db->or_like('potongan.tanggal', $q);
        // $this->db->or_like('potongan.id_waktu', $q);
        // $this->db->or_like('potongan.shift', $q);
        // $this->db->or_like('potongan.id_warna', $q);
        // $this->db->or_like('potongan.id_bentuk', $q);
        // $this->db->or_like('potongan.id_ukuran', $q);
        // $this->db->or_like('potongan.id_lembar', $q);
        // $this->db->or_like('potongan.target', $q);
        // $this->db->or_like('potongan.hasil', $q);
        // $this->db->or_like('potongan.rejected', $q);
        // $this->db->or_like('potongan.keterangan', $q);
        $this->db->join('customer', 'customer.id_customer = potongan.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = potongan.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = potongan.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = potongan.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = potongan.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = potongan.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = potongan.id_ukuran', 'left');
        $this->db->where('potongan.id_user', $this->session->userdata('id_users'));

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

/* End of file Potongan_model.php */
/* Location: ./application/models/Potongan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-14 04:28:34 */
/* http://harviacode.com */