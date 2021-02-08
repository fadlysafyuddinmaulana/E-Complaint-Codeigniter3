<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_penduduk extends CI_Model
{

	public function get_all()
	{
		$q = $this->db->query("SELECT * FROM penduduk");
		return $q;
	}

	public function get_nik($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function proses_tambah($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_proses($data, $where)
	{
		$this->db->update('penduduk', $data, $where);
		return TRUE;
	}

	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('penduduk');
		return TRUE;
	}
}
