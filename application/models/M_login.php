<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function cek($u, $p)
	{
		$this->db->where('username', $u);
		$this->db->where('password', $p);

		return $this->db->get('petugas');
	}

	public function cek_admin($p)
	{
		$this->db->where('password', $p);

		return $this->db->get('admin');
	}

	public function cek_user($u, $p)
	{
		$this->db->where('username', $u);
		$this->db->where('password', $p);

		return $this->db->get('penduduk');
	}

	public function cek_register($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->get('penduduk');
	}

	public function register($nik)
	{
		$data = array(
			'nik_account' 		=> $this->input->post('val-nik'),
			'no_telp' 			=> $this->input->post('val-cellphone'),
			'username'			=> $this->input->post('val-username'),
			'password'			=> MD5($this->input->post('val-password'))
		);

		$this->db->where('nik', $nik);
		$this->db->update('penduduk', $data);
	}
}
