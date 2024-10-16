<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mesin_geprek_model extends CI_Model
{

    public $table = 'mesin_geprek';
    public $id = 'id_mesin_geprek';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('mesin_geprek.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk, mesin.kode_mesin, lembar_pack.lembar, ukuran.ukuran');
        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = mesin_geprek.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_geprek.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_geprek.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_geprek.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_geprek.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_geprek.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_geprek.id_ukuran', 'left');
        $this->db->join('mesin', 'mesin.id_mesin = mesin_geprek.id_mesin', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = mesin_geprek.id_customer', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_geprek.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_geprek.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_geprek.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_geprek.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_geprek.id_ukuran', 'left');
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_mesin_geprek', $q);
        $this->db->or_like('no_wo', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('operator2', $q);
        $this->db->or_like('id_customer', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('id_mesin', $q);
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('mesin_geprek.id_mesin_geprek', $q);
        $this->db->or_like('mesin_geprek.no_wo', $q);
        $this->db->or_like('tbl_user.full_name', $q);
        $this->db->or_like('mesin_geprek.operator2', $q);
        $this->db->or_like('mesin_geprek.id_customer', $q);
        $this->db->or_like('mesin_geprek.tanggal', $q);
        $this->db->or_like('mesin_geprek.id_mesin', $q);
        $this->db->or_like('mesin_geprek.id_waktu', $q);
        $this->db->or_like('mesin_geprek.shift', $q);
        $this->db->or_like('mesin_geprek.id_warna', $q);
        $this->db->or_like('mesin_geprek.id_bentuk', $q);
        $this->db->or_like('mesin_geprek.id_ukuran', $q);
        $this->db->or_like('mesin_geprek.id_lembar', $q);
        $this->db->or_like('mesin_geprek.target', $q);
        $this->db->or_like('mesin_geprek.hasil', $q);
        $this->db->or_like('mesin_geprek.rejected', $q);
        $this->db->or_like('mesin_geprek.keterangan', $q);
        $this->db->or_like('customer.nama_customer', $q);
        $this->db->or_like('waktu.waktu', $q);
        $this->db->or_like('warna.warna', $q);
        $this->db->or_like('bentuk.bentuk', $q);
        $this->db->or_like('mesin.kode_mesin', $q);
        $this->db->join('customer', 'customer.id_customer = mesin_geprek.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_geprek.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_geprek.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_geprek.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_geprek.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_geprek.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_geprek.id_ukuran', 'left');
        $this->db->join('mesin', 'mesin.id_mesin = mesin_geprek.id_mesin', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }


    // get data with limit PERUSER and search
    function get_limit_peruser($limit, $start = 0, $q = NULL)
    {
        $this->db->like('mesin_geprek.tanggal', $q);
        // $this->db->like('mesin_geprek.no_wo', $q);

        $this->db->where('mesin_geprek.id_user', $this->session->userdata('id_users'));
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('mesin_geprek.id_mesin_geprek', $q);
        // $this->db->or_like('mesin_geprek.no_wo', $q);
        // $this->db->or_like('tbl_user.full_name', $q);
        // $this->db->or_like('mesin_geprek.operator2', $q);
        // $this->db->or_like('mesin_geprek.id_customer', $q);
        // $this->db->or_like('mesin_geprek.tanggal', $q);
        // $this->db->or_like('mesin_geprek.id_mesin', $q);
        // $this->db->or_like('mesin_geprek.id_waktu', $q);
        // $this->db->or_like('mesin_geprek.shift', $q);
        // $this->db->or_like('mesin_geprek.id_warna', $q);
        // $this->db->or_like('mesin_geprek.id_bentuk', $q);
        // $this->db->or_like('mesin_geprek.id_ukuran', $q);
        // $this->db->or_like('mesin_geprek.id_lembar', $q);
        // $this->db->or_like('mesin_geprek.target', $q);
        // $this->db->or_like('mesin_geprek.hasil', $q);
        // $this->db->or_like('mesin_geprek.rejected', $q);
        // $this->db->or_like('mesin_geprek.keterangan', $q);
        // $this->db->or_like('customer.nama_customer', $q);
        // $this->db->or_like('waktu.waktu', $q);
        // $this->db->or_like('warna.warna', $q);
        // $this->db->or_like('bentuk.bentuk', $q);
        // $this->db->or_like('mesin.kode_mesin', $q);
        $this->db->join('customer', 'customer.id_customer = mesin_geprek.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = mesin_geprek.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = mesin_geprek.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = mesin_geprek.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = mesin_geprek.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = mesin_geprek.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = mesin_geprek.id_ukuran', 'left');
        $this->db->join('mesin', 'mesin.id_mesin = mesin_geprek.id_mesin', 'left');
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

/* End of file Mesin_geprek_model.php */
/* Location: ./application/models/Mesin_geprek_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-15 05:17:16 */
/* http://harviacode.com */