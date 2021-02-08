<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_account extends CI_Model
{

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('admin');
	}

	public function get_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function proses_tambah($data, $table)
	{
		$this->db->insert($table, $data);
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

	public function edit_petugas($data, $where)
	{
		$this->db->update('petugas', $data, $where);
		return TRUE;
	}

	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('petugas');
		return TRUE;
	}
}
