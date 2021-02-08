<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengaduan extends CI_Model
{

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$q = $this->db->query("SELECT * FROM penduduk, pengaduan
								WHERE penduduk.nik = pengaduan.nik
								");
		return $q;
	}

	public function get_nik($nik)
	{
		$q = $this->db->query("SELECT * FROM penduduk, pengaduan
								WHERE penduduk.nik = pengaduan.nik
								AND penduduk.nik = '$nik'
								");
		return $q;
	}

	public function get_id($id_pengaduan)
	{
		$q = $this->db->query("SELECT * FROM pengaduan, petugas, penduduk
								WHERE pengaduan.id_petugas = petugas.id_petugas
								AND pengaduan.nik = penduduk.nik
								AND pengaduan.id_pengaduan = '$id_pengaduan' ");
		return $q;
	}

	public function tambah($file)
	{
		date_default_timezone_set('Asia/Jakarta');

		$user 				= $this->session->userdata('userdata_desa');
		$nik 				= $user['nik'];
		$k_pengaduan		= random_string('numeric', 25);
		$tanggal_unggah 	= date('d-m-Y');
		$waktu_unggah       = date('h:i a');
		$pengaduan 			= $this->input->post('pengaduan');
		$pengaduan_update 	= $this->input->post('pengaduan');
		$status 			= 1;

		$data = array(
			'nik'    			=> $nik,
			'kode_pengaduan'    => $k_pengaduan,
			'tanggal_unggah'   	=> $tanggal_unggah,
			'waktu_unggah'		=> $waktu_unggah,
			'pengaduan'			=> $pengaduan,
			'pengaduan_update'	=> $pengaduan_update,
			'foto_keluhan'		=> $file,
			'status' 			=> $status
		);

		$this->db->insert('pengaduan', $data);
	}

	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('pengaduan');
		return TRUE;
	}

	public function sql_insert($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->insert($table, $data);
	}

	public function sql_update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function edit_proses($id_pengaduan, $file)
	{
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'pengaduan' 	=> $this->input->post('pengaduan'),
			'pengaduan_update' 	=> $this->input->post('pengaduan'),
			'tanggal_ubah' 	=> date('d-m-Y'),
			'waktu_ubah' 	=> date('h:i a'),
			'foto_keluhan' 	=> $file
		);

		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('pengaduan', $data);
	}
}
