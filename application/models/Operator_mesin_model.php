<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Operator_mesin_model extends CI_Model
{

	public $table = 'operator_mesin';
	public $id = 'id_operator_mesin';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{

		$this->db->order_by($this->id, $this->order);
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
		$this->db->join('jam', 'jam.id_jam = operator_mesin.id_jam', 'left');
		$this->db->join('non_passed', 'non_passed.id_non_passed = operator_mesin.nonpassed_kode', 'left');

		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		$this->db->join('customer', 'customer.id_customer = operator_mesin.id_customer', 'left');
		$this->db->join('gsm', 'gsm.id_gsm = operator_mesin.id_gsm', 'left');

		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('id_operator_mesin', $q);
		$this->db->or_like('id_user', $q);
		$this->db->or_like('operator2', $q);
		$this->db->or_like('operator3', $q);
		$this->db->or_like('operator4', $q);
		$this->db->or_like('shift', $q);
		$this->db->or_like('id_mesin', $q);
		$this->db->or_like('id_customer', $q);
		$this->db->or_like('no_wo', $q);
		$this->db->or_like('id_pattern', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('id_bentuk', $q);
		$this->db->or_like('id_ukuran', $q);
		$this->db->or_like('id_grade', $q);
		$this->db->or_like('id_gsm', $q);
		$this->db->or_like('lebar', $q);
		$this->db->or_like('id_lembar', $q);
		$this->db->or_like('satuan_pack', $q);
		$this->db->or_like('qty_roll', $q);
		$this->db->or_like('berat', $q);
		$this->db->or_like('id_speed', $q);
		$this->db->or_like('no_stamp', $q);
		$this->db->or_like('target_jam', $q);
		$this->db->or_like('jam_proses', $q);
		$this->db->or_like('hasil_pack', $q);
		$this->db->or_like('hasil_kg', $q);
		$this->db->or_like('broke_setting', $q);
		$this->db->or_like('broke_trim', $q);
		$this->db->or_like('menit_proses', $q);
		$this->db->or_like('broke_serpihan', $q);
		$this->db->or_like('broke_motif', $q);
		$this->db->or_like('sisa_roll', $q);
		$this->db->or_like('ket', $q);
		$this->db->or_like('id_downtime', $q);
		$this->db->or_like('waktu_downtime', $q);
		$this->db->or_like('id_jam', $q);
		$this->db->or_like('jam_akhir', $q);
		$this->db->or_like('persentase', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		// $this->db->like('operator_mesin.id_operator_mesin', $q);
		// $this->db->or_like('tbl_user.full_name', $q);
		// $this->db->or_like('operator_mesin.operator2', $q);
		// $this->db->or_like('operator_mesin.operator3', $q);
		// $this->db->or_like('operator_mesin.operator4', $q);
		// $this->db->or_like('operator_mesin.shift', $q);
		// $this->db->or_like('operator_mesin.id_mesin', $q);
		$this->db->or_like('customer.nama_customer', $q);
		// $this->db->or_like('operator_mesin.no_wo', $q);
		// $this->db->or_like('operator_mesin.id_pattern', $q);
		// $this->db->or_like('operator_mesin.tanggal', $q);
		// $this->db->or_like('operator_mesin.id_bentuk', $q);
		// $this->db->or_like('operator_mesin.id_warna', $q);
		// $this->db->or_like('operator_mesin.id_ukuran', $q);
		// $this->db->or_like('operator_mesin.id_grade', $q);
		// $this->db->or_like('operator_mesin.id_gsm', $q);
		// $this->db->or_like('operator_mesin.lebar', $q);
		// $this->db->or_like('operator_mesin.id_lembar', $q);
		// $this->db->or_like('operator_mesin.satuan_pack', $q);
		// $this->db->or_like('operator_mesin.qty_roll', $q);
		// $this->db->or_like('operator_mesin.berat', $q);
		// $this->db->or_like('operator_mesin.id_speed', $q);
		// $this->db->or_like('operator_mesin.no_stamp', $q);
		// $this->db->or_like('operator_mesin.target_jam', $q);
		// $this->db->or_like('operator_mesin.jam_proses', $q);
		// $this->db->or_like('operator_mesin.hasil_pack', $q);
		// $this->db->or_like('operator_mesin.hasil_kg', $q);
		// $this->db->or_like('operator_mesin.broke_setting', $q);
		// $this->db->or_like('operator_mesin.broke_trim', $q);
		// $this->db->or_like('operator_mesin.menit_proses', $q);
		// $this->db->or_like('operator_mesin.broke_serpihan', $q);
		// $this->db->or_like('operator_mesin.broke_motif', $q);
		// $this->db->or_like('operator_mesin.sisa_roll', $q);
		// $this->db->or_like('operator_mesin.ket', $q);
		// $this->db->or_like('operator_mesin.id_downtime', $q);
		// $this->db->or_like('operator_mesin.waktu_downtime', $q);
		// $this->db->or_like('operator_mesin.id_jam', $q);
		// $this->db->or_like('operator_mesin.jam_akhir', $q);
		// $this->db->or_like('operator_mesin.persentase', $q);
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
		// $this->db->join('downtime d2', 'd2.id_downtime = operator_mesin.downtime2', 'left');
		// $this->db->join('downtime d3', 'd3.id_downtime = operator_mesin.downtime3', 'left');
		// $this->db->join('downtime d4', 'd4.id_downtime = operator_mesin.downtime4', 'left');
		$this->db->join('jam', 'jam.id_jam = operator_mesin.id_jam', 'left');
		$this->db->join('non_passed', 'non_passed.id_non_passed = operator_mesin.nonpassed_kode', 'left');
		$where = "operator_mesin.no_form != 'form tidak standard'";

		$this->db->where($where);

		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}


	// get data with limit and search
	function get_limit_peruser($limit, $start = 0, $q = NULL)
	{
		$this->db->where('operator_mesin.id_user', $this->session->userdata('id_users'));

		$this->db->order_by($this->id, $this->order);
		// $this->db->like('operator_mesin.id_operator_mesin', $q);
		// $this->db->or_like('operator_mesin.id_user', $q);
		// $this->db->or_like('operator_mesin.operator2', $q);
		// $this->db->or_like('operator_mesin.operator3', $q);
		// $this->db->or_like('operator_mesin.operator4', $q);
		// $this->db->or_like('operator_mesin.shift', $q);
		// $this->db->or_like('operator_mesin.id_mesin', $q);
		// $this->db->or_like('operator_mesin.id_customer', $q);
		// $this->db->or_like('operator_mesin.no_wo', $q);
		// $this->db->or_like('operator_mesin.id_pattern', $q);
		// $this->db->or_like('operator_mesin.tanggal', $q);
		// $this->db->or_like('operator_mesin.id_bentuk', $q);
		// $this->db->or_like('operator_mesin.id_warna', $q);
		// $this->db->or_like('operator_mesin.id_ukuran', $q);
		// $this->db->or_like('operator_mesin.id_grade', $q);
		// $this->db->or_like('operator_mesin.id_gsm', $q);
		// $this->db->or_like('operator_mesin.lebar', $q);
		// $this->db->or_like('operator_mesin.id_lembar', $q);
		// $this->db->or_like('operator_mesin.satuan_pack', $q);
		// $this->db->or_like('operator_mesin.qty_roll', $q);
		// $this->db->or_like('operator_mesin.berat', $q);
		// $this->db->or_like('operator_mesin.id_speed', $q);
		// $this->db->or_like('operator_mesin.no_stamp', $q);
		// $this->db->or_like('operator_mesin.target_jam', $q);
		// $this->db->or_like('operator_mesin.jam_proses', $q);
		// $this->db->or_like('operator_mesin.hasil_pack', $q);
		// $this->db->or_like('operator_mesin.hasil_kg', $q);
		// $this->db->or_like('operator_mesin.broke_setting', $q);
		// $this->db->or_like('operator_mesin.broke_trim', $q);
		// $this->db->or_like('operator_mesin.menit_proses', $q);
		// $this->db->or_like('operator_mesin.broke_serpihan', $q);
		// $this->db->or_like('operator_mesin.broke_motif', $q);
		// $this->db->or_like('operator_mesin.sisa_roll', $q);
		// $this->db->or_like('operator_mesin.ket', $q);
		// $this->db->or_like('operator_mesin.id_downtime', $q);
		// $this->db->or_like('operator_mesin.waktu_downtime', $q);
		// $this->db->or_like('operator_mesin.id_jam', $q);
		// $this->db->or_like('operator_mesin.jam_akhir', $q);
		// $this->db->or_like('operator_mesin.persentase', $q);
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
		$this->db->join('jam', 'jam.id_jam = operator_mesin.id_jam', 'left');
		$this->db->join('non_passed', 'non_passed.id_non_passed = operator_mesin.nonpassed_kode', 'left');

		$this->db->where('operator_mesin.id_user', $this->session->userdata('id_users'));
		$where = "operator_mesin.no_form != 'form tidak standard'";

		$this->db->where($where);

		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}


	######## OPERATORMESIN TIDAK STANDARD #####

	// get data with limit and search
	function get_limit_data_T($limit, $start = 0, $q = NULL)
	{



		$this->db->order_by($this->id, $this->order);
		// $this->db->like('operator_mesin.id_operator_mesin', $q);
		// $this->db->like('tbl_user.full_name', $q);
		// $this->db->or_like('operator_mesin.operator2', $q);
		// $this->db->or_like('operator_mesin.operator3', $q);
		// $this->db->or_like('operator_mesin.operator4', $q);
		// $this->db->or_like('operator_mesin.shift', $q);
		// $this->db->or_like('operator_mesin.id_mesin', $q);
		// $this->db->or_like('customer.nama_customer', $q);
		// $this->db->or_like('operator_mesin.no_wo', $q);
		// $this->db->or_like('operator_mesin.id_pattern', $q);
		$this->db->or_like('operator_mesin.tanggal', $q);
		// $this->db->or_like('operator_mesin.id_bentuk', $q);
		// $this->db->or_like('operator_mesin.id_warna', $q);
		// $this->db->or_like('operator_mesin.id_ukuran', $q);
		// $this->db->or_like('operator_mesin.id_grade', $q);
		// $this->db->or_like('operator_mesin.id_gsm', $q);
		// $this->db->or_like('operator_mesin.lebar', $q);
		// $this->db->or_like('operator_mesin.id_lembar', $q);
		// $this->db->or_like('operator_mesin.satuan_pack', $q);
		// $this->db->or_like('operator_mesin.qty_roll', $q);
		// $this->db->or_like('operator_mesin.berat', $q);
		// $this->db->or_like('operator_mesin.id_speed', $q);
		// $this->db->or_like('operator_mesin.no_stamp', $q);
		// $this->db->or_like('operator_mesin.target_jam', $q);
		// $this->db->or_like('operator_mesin.jam_proses', $q);
		// $this->db->or_like('operator_mesin.hasil_pack', $q);
		// $this->db->or_like('operator_mesin.hasil_kg', $q);
		// $this->db->or_like('operator_mesin.broke_setting', $q);
		// $this->db->or_like('operator_mesin.broke_trim', $q);
		// $this->db->or_like('operator_mesin.menit_proses', $q);
		// $this->db->or_like('operator_mesin.broke_serpihan', $q);
		// $this->db->or_like('operator_mesin.broke_motif', $q);
		// $this->db->or_like('operator_mesin.sisa_roll', $q);
		// $this->db->or_like('operator_mesin.ket', $q);
		// $this->db->or_like('operator_mesin.id_downtime', $q);
		// $this->db->or_like('operator_mesin.waktu_downtime', $q);
		// $this->db->or_like('operator_mesin.id_jam', $q);
		// $this->db->or_like('operator_mesin.jam_akhir', $q);
		// $this->db->or_like('operator_mesin.persentase', $q);
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
		// $this->db->join('downtime d2', 'd2.id_downtime = operator_mesin.downtime2', 'left');
		// $this->db->join('downtime d3', 'd3.id_downtime = operator_mesin.downtime3', 'left');
		// $this->db->join('downtime d4', 'd4.id_downtime = operator_mesin.downtime4', 'left');
		$this->db->where('operator_mesin.no_form', 'form tidak standard');

		$this->db->join('jam', 'jam.id_jam = operator_mesin.id_jam', 'left');
		$this->db->join('non_passed', 'non_passed.id_non_passed = operator_mesin.nonpassed_kode', 'left');

		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}


	// get data with limit and search
	function get_limit_peruser_T($limit, $start = 0, $q = NULL)
	{
		$this->db->where('operator_mesin.id_user', $this->session->userdata('id_users'));

		$this->db->order_by($this->id, $this->order);

		// $this->db->like('operator_mesin.id_operator_mesin', $q);
		// $this->db->or_like('tbl_user.full_name', $q);
		// $this->db->or_like('operator_mesin.operator2', $q);
		// $this->db->or_like('operator_mesin.operator3', $q);
		// $this->db->or_like('operator_mesin.operator4', $q);
		// $this->db->or_like('operator_mesin.shift', $q);
		// $this->db->or_like('operator_mesin.id_mesin', $q);
		// $this->db->or_like('customer.nama_customer', $q);
		// $this->db->or_like('operator_mesin.no_wo', $q);
		// $this->db->or_like('operator_mesin.id_pattern', $q);
		// $this->db->or_like('operator_mesin.tanggal', $q);
		// $this->db->or_like('operator_mesin.id_bentuk', $q);
		// $this->db->or_like('operator_mesin.id_warna', $q);
		// $this->db->or_like('operator_mesin.id_ukuran', $q);
		// $this->db->or_like('operator_mesin.id_grade', $q);
		// $this->db->or_like('operator_mesin.id_gsm', $q);
		// $this->db->or_like('operator_mesin.lebar', $q);
		// $this->db->or_like('operator_mesin.id_lembar', $q);
		// $this->db->or_like('operator_mesin.satuan_pack', $q);
		// $this->db->or_like('operator_mesin.qty_roll', $q);
		// $this->db->or_like('operator_mesin.berat', $q);
		// $this->db->or_like('operator_mesin.id_speed', $q);
		// $this->db->or_like('operator_mesin.no_stamp', $q);
		// $this->db->or_like('operator_mesin.target_jam', $q);
		// $this->db->or_like('operator_mesin.jam_proses', $q);
		// $this->db->or_like('operator_mesin.hasil_pack', $q);
		// $this->db->or_like('operator_mesin.hasil_kg', $q);
		// $this->db->or_like('operator_mesin.broke_setting', $q);
		// $this->db->or_like('operator_mesin.broke_trim', $q);
		// $this->db->or_like('operator_mesin.menit_proses', $q);
		// $this->db->or_like('operator_mesin.broke_serpihan', $q);
		// $this->db->or_like('operator_mesin.broke_motif', $q);
		// $this->db->or_like('operator_mesin.sisa_roll', $q);
		// $this->db->or_like('operator_mesin.ket', $q);
		// $this->db->or_like('operator_mesin.id_downtime', $q);
		// $this->db->or_like('operator_mesin.waktu_downtime', $q);
		// $this->db->or_like('operator_mesin.id_jam', $q);
		// $this->db->or_like('operator_mesin.jam_akhir', $q);
		// $this->db->or_like('operator_mesin.persentase', $q);
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
		// $this->db->join('downtime d2', 'd2.id_downtime = operator_mesin.downtime2', 'left');
		// $this->db->join('downtime d3', 'd3.id_downtime = operator_mesin.downtime3', 'left');
		// $this->db->join('downtime d4', 'd4.id_downtime = operator_mesin.downtime4', 'left');
		$this->db->join('jam', 'jam.id_jam = operator_mesin.id_jam', 'left');
		$this->db->join('non_passed', 'non_passed.id_non_passed = operator_mesin.nonpassed_kode', 'left');
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

/* End of file Operator_mesin_model.php */
/* Location: ./application/models/Operator_mesin_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-21 11:38:52 */
/* http://harviacode.com */