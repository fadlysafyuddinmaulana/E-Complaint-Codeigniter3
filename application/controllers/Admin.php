<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('userdata_desa');

        if ($this->session->userdata('userdata_desa') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']         = 'admin';
        $data['admin']        = $this->M_account->get_all()->result();
        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_proses()
    {
        $nama_petugas       = $this->input->post('nama_petugas');
    }



    public function detail($id_petugas)
    {
        $where = array('id_petugas' => $id_petugas);

        $data['title']      = 'Keluhan Masyarakat';
        $data['aktif']      = 'admin';
        $data['admin']   = $this->M_account->get_data($where, 'petugas')->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('admin/detail_admin', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus($id_petugas)
    {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('admin');

        redirect('admin');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
