<?php
class Invoice extends CI_Controller
{
    public function index()
    {
        $data['title']         = 'Keluhan Masyarakat';

        $this->load->view('template/header_login', $data);
        $this->load->view('starter_page/dm_invoice', $data);
        $this->load->view('template/footer_login', $data);
    }
    public function data_invoice()
    {
        if ($this->session->userdata('userdata_desa') == null) {
            redirect('Login');
        }

        $data['title']         = 'Keluhan Masyarakat';

        $data['aktif']         = 'invoice';
        $data['invoice']       = $this->M_Invoice->get_all()->result();

        $this->load->view('template/header', $data);
        $this->load->view('invoice/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function proses_invoice()
    {
        $this->M_Invoice->send_invoice();
        redirect('Login');
    }

    public function hapus_invoice($idp)
    {
        $this->db->where('k_invoice', $idp);
        $this->db->delete('invoice');

        redirect('invoice/data_invoice');
    }
}
