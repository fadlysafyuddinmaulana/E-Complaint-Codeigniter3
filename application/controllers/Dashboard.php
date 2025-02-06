<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('userdata_desa') == null) {
			redirect('Login');
		}
	}

	public function index()
	{
		$user = $this->session->userdata('userdata_desa');

		if ($user['akses'] == 'petugas') {
			redirect('Dashboard/dashboard_admin');
		} else if ($user['akses'] == 'user') {
			redirect('Dashboard/dashboard_user');
		}
	}

	public function dashboard_admin()
	{
		$user = $this->session->userdata('userdata_desa');

		if ($user['akses'] == 'user') {
			redirect('Dashboard/dashboard_user');
		}
		$data['title'] 		= 'Sistem Informasi Keluhan Masyarakat';
		$data['aktif'] 		= 'dashboard_admin';
		$data['profile'] 	= $this->M_account->get_all()->row_array();
		$data['semua'] 		= $this->M_home->get_aduan_all()->num_rows();
		$data['pesan'] 		= $this->M_home->get_pesan()->num_rows();
		$data['sudah'] 		= $this->M_home->get_aduan_id(0)->num_rows();
		$data['belum'] 		= $this->M_home->get_aduan_id(1)->num_rows();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/dashboard_admin', $data);
		$this->load->view('template/footer', $data);
	}

	public function dashboard_petugas()
	{
		$data['title'] 		= 'Sistem Informasi Keluhan Masyarakat';
		$data['aktif'] 		= 'dashboard_admin';
		$data['profile'] 	= $this->M_account->get_all()->row_array();
		$data['semua'] 		= $this->M_home->get_aduan_all()->num_rows();
		$data['pesan'] 		= $this->M_home->get_pesan()->num_rows();
		$data['sudah'] 		= $this->M_home->get_aduan_id(0)->num_rows();
		$data['belum'] 		= $this->M_home->get_aduan_id(1)->num_rows();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/dashboard_admin', $data);
		$this->load->view('template/footer', $data);
	}

	public function dashboard_user()
	{
		$user = $this->session->userdata('userdata_desa');

		$data['title'] 	= 'Sistem Informasi Keluhan Masyarakat';
		$data['aktif'] 	= 'dashboard_user';
		$data['semua'] 	= $this->M_home->get_aduan_nik($user['nik'])->num_rows();
		$data['sudah'] 	= $this->M_home->get_aduan_id_nik($user['nik'], 0)->num_rows();
		$data['belum'] 	= $this->M_home->get_aduan_id_nik($user['nik'], 1)->num_rows();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/dashboard_user', $data);
		$this->load->view('template/footer', $data);
	}
}
