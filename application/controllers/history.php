<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller
{
    public function index()
    {
        $userdata = $this->session->userdata('userdata_desa');

        if ($userdata['akses'] == 'user') {
            redirect('Dashboard/dashboard_user');
        }

        $data['title']          = 'keluhan Masyarakat';
        $data['aktif']          = 'history';
        $data['history']        = $this->M_history->get_history();

        $this->load->view('template/header', $data);
        $this->load->view('history/index', $data);
        $this->load->view('template/footer');
    }

    public function empty_table()
    {
        $this->M_history->clear_history();
        redirect('history');
    }
}
