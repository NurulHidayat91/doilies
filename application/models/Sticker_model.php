<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sticker_model extends CI_Model
{

    public $table = 'sticker';
    public $id = 'id_sticker';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = sticker.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = sticker.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = sticker.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = sticker.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = sticker.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = sticker.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = sticker.id_ukuran', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = sticker.id_customer', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = sticker.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = sticker.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = sticker.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = sticker.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = sticker.id_ukuran', 'left');
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_sticker', $q);
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
        $this->db->like('sticker.id_sticker', $q);
        $this->db->or_like('sticker.no_wo', $q);
        $this->db->or_like('sticker.id_user', $q);
        $this->db->or_like('sticker.tanggal', $q);
        $this->db->or_like('sticker.id_waktu', $q);
        $this->db->or_like('sticker.shift', $q);
        $this->db->or_like('sticker.id_warna', $q);
        $this->db->or_like('sticker.id_bentuk', $q);
        $this->db->or_like('sticker.id_ukuran', $q);
        $this->db->or_like('sticker.id_lembar', $q);
        $this->db->or_like('sticker.target', $q);
        $this->db->or_like('sticker.hasil', $q);
        $this->db->or_like('sticker.rejected', $q);
        $this->db->or_like('sticker.keterangan', $q);
        $this->db->or_like('sticker.id_customer', $q);
        $this->db->join('customer', 'customer.id_customer = sticker.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = sticker.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = sticker.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = sticker.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = sticker.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = sticker.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = sticker.id_ukuran', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit PERUSER and search
    function get_limit_peruser($limit, $start = 0, $q = NULL)
    {
        $this->db->or_like('sticker.tanggal', $q);
        $this->db->where('sticker.id_user', $this->session->userdata('id_users'));
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('sticker.id_sticker', $q);
        // $this->db->or_like('sticker.no_wo', $q);
        // $this->db->or_like('sticker.id_user', $q);
        // $this->db->or_like('sticker.id_waktu', $q);
        // $this->db->or_like('sticker.shift', $q);
        // $this->db->or_like('sticker.id_warna', $q);
        // $this->db->or_like('sticker.id_bentuk', $q);
        // $this->db->or_like('sticker.id_ukuran', $q);
        // $this->db->or_like('sticker.id_lembar', $q);
        // $this->db->or_like('sticker.target', $q);
        // $this->db->or_like('sticker.hasil', $q);
        // $this->db->or_like('sticker.rejected', $q);
        // $this->db->or_like('sticker.keterangan', $q);
        // $this->db->or_like('sticker.id_customer', $q);
        $this->db->join('customer', 'customer.id_customer = sticker.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = sticker.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = sticker.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = sticker.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = sticker.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = sticker.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = sticker.id_ukuran', 'left');
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

/* End of file Sticker_model.php */
/* Location: ./application/models/Sticker_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 05:04:18 */
/* http://harviacode.com */