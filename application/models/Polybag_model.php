<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Polybag_model extends CI_Model
{

    public $table = 'polybag';
    public $id = 'id_mesin_polybag';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('polybag.*, customer.nama_customer, tbl_user.full_name, warna.warna, waktu.waktu, bentuk.bentuk, lembar_pack.lembar, ukuran.ukuran');

        $this->db->order_by($this->id, $this->order);
        $this->db->join('customer', 'customer.id_customer = polybag.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = polybag.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = polybag.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = polybag.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = polybag.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = polybag.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = polybag.id_ukuran', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('customer', 'customer.id_customer = polybag.id_customer', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = polybag.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = polybag.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = polybag.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = polybag.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = polybag.id_ukuran', 'left');

        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_mesin_polybag', $q);
        $this->db->or_like('no_wo', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('id_customer', $q);
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('polybag.id_mesin_polybag', $q);
        $this->db->or_like('polybag.no_wo', $q);
        $this->db->or_like('polybag.id_user', $q);
        $this->db->or_like('polybag.id_customer', $q);
        $this->db->or_like('polybag.tanggal', $q);
        $this->db->or_like('polybag.id_waktu', $q);
        $this->db->or_like('polybag.shift', $q);
        $this->db->or_like('polybag.id_warna', $q);
        $this->db->or_like('polybag.id_bentuk', $q);
        $this->db->or_like('polybag.id_ukuran', $q);
        $this->db->or_like('polybag.id_lembar', $q);
        $this->db->or_like('polybag.target', $q);
        $this->db->or_like('polybag.hasil', $q);
        $this->db->or_like('polybag.rejected', $q);
        $this->db->or_like('polybag.keterangan', $q);
        $this->db->join('customer', 'customer.id_customer = polybag.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = polybag.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = polybag.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = polybag.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = polybag.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = polybag.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = polybag.id_ukuran', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit PERUSER and search
    function get_limit_peruser($limit, $start = 0, $q = NULL)
    {
        $this->db->or_like('polybag.tanggal', $q);

        $this->db->where('polybag.id_user', $this->session->userdata('id_users'));
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('polybag.id_mesin_polybag', $q);
        // $this->db->or_like('polybag.no_wo', $q);
        // $this->db->or_like('polybag.id_user', $q);
        // $this->db->or_like('polybag.id_customer', $q);
        // $this->db->or_like('polybag.id_waktu', $q);
        // $this->db->or_like('polybag.shift', $q);
        // $this->db->or_like('polybag.id_warna', $q);
        // $this->db->or_like('polybag.id_bentuk', $q);
        // $this->db->or_like('polybag.id_ukuran', $q);
        // $this->db->or_like('polybag.id_lembar', $q);
        // $this->db->or_like('polybag.target', $q);
        // $this->db->or_like('polybag.hasil', $q);
        // $this->db->or_like('polybag.rejected', $q);
        // $this->db->or_like('polybag.keterangan', $q);
        $this->db->join('customer', 'customer.id_customer = polybag.id_customer', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_users = polybag.id_user', 'left');
        $this->db->join('waktu', 'waktu.id_waktu = polybag.id_waktu', 'left');
        $this->db->join('warna', 'warna.id_warna = polybag.id_warna', 'left');
        $this->db->join('bentuk', 'bentuk.id_bentuk = polybag.id_bentuk', 'left');
        $this->db->join('lembar_pack', 'lembar_pack.id_lembar = polybag.id_lembar', 'left');
        $this->db->join('ukuran', 'ukuran.id_ukuran = polybag.id_ukuran', 'left');
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

/* End of file Polybag_model.php */
/* Location: ./application/models/Polybag_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-15 11:07:13 */
/* http://harviacode.com */