<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Proses_admin_model extends CI_Model
{

	public $table = 'proses_admin';
	public $id = 'id_proses';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->order_by($this->id, $this->order);
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
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		$this->db->join('tbl_user', 'tbl_user.id_users = proses_admin.id_user', 'left');
		$this->db->join('customer', 'customer.id_customer = proses_admin.id_customer', 'left');

		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('id_proses', $q);
		$this->db->or_like('no_wo', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('id_waktu', $q);
		$this->db->or_like('id_user', $q);
		$this->db->or_like('shift', $q);
		$this->db->or_like('id_mesin', $q);
		$this->db->or_like('id_customer', $q);
		$this->db->or_like('id_jenis_pekerjaan', $q);
		$this->db->or_like('id_warna', $q);
		$this->db->or_like('id_bentuk', $q);
		$this->db->or_like('id_ukuran', $q);
		$this->db->or_like('id_lembar', $q);
		$this->db->or_like('id_speed_mesin', $q);
		$this->db->or_like('target', $q);
		$this->db->or_like('hasil_potongan', $q);
		$this->db->or_like('reject_potongan', $q);
		$this->db->or_like('hasil_geprek', $q);
		$this->db->or_like('reject_geprek', $q);
		$this->db->or_like('hasil_sortir_polybag', $q);
		$this->db->or_like('reject_sortir_polybag', $q);
		$this->db->or_like('hasil_sealer', $q);
		$this->db->or_like('reject_sealer', $q);
		$this->db->or_like('hasil_oven', $q);
		$this->db->or_like('reject_oven', $q);
		$this->db->or_like('hasil_sticker', $q);
		$this->db->or_like('reject_sticker', $q);
		$this->db->or_like('hasil_packing_box', $q);
		$this->db->or_like('reject_packing_box', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('proses_admin.id_proses', $q);
		$this->db->or_like('proses_admin.no_wo', $q);
		$this->db->or_like('proses_admin.tanggal', $q);
		$this->db->or_like('proses_admin.id_waktu', $q);
		$this->db->or_like('proses_admin.id_user', $q);
		$this->db->or_like('proses_admin.shift', $q);
		$this->db->or_like('proses_admin.id_mesin', $q);
		$this->db->or_like('proses_admin.id_customer', $q);
		$this->db->or_like('proses_admin.id_jenis_pekerjaan', $q);
		$this->db->or_like('proses_admin.id_warna', $q);
		$this->db->or_like('proses_admin.id_bentuk', $q);
		$this->db->or_like('proses_admin.id_ukuran', $q);
		$this->db->or_like('proses_admin.id_lembar', $q);
		$this->db->or_like('proses_admin.id_speed_mesin', $q);
		$this->db->or_like('proses_admin.target', $q);
		$this->db->or_like('proses_admin.hasil_potongan', $q);
		$this->db->or_like('proses_admin.reject_potongan', $q);
		$this->db->or_like('proses_admin.hasil_geprek', $q);
		$this->db->or_like('proses_admin.reject_geprek', $q);
		$this->db->or_like('proses_admin.hasil_sortir_polybag', $q);
		$this->db->or_like('proses_admin.reject_sortir_polybag', $q);
		$this->db->or_like('proses_admin.hasil_sealer', $q);
		$this->db->or_like('proses_admin.reject_sealer', $q);
		$this->db->or_like('proses_admin.hasil_oven', $q);
		$this->db->or_like('proses_admin.reject_oven', $q);
		$this->db->or_like('proses_admin.hasil_sticker', $q);
		$this->db->or_like('proses_admin.reject_sticker', $q);
		$this->db->or_like('proses_admin.hasil_packing_box', $q);
		$this->db->or_like('proses_admin.reject_packing_box', $q);
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

/* End of file Proses_admin_model.php */
/* Location: ./application/models/Proses_admin_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-24 05:07:44 */
/* http://harviacode.com */